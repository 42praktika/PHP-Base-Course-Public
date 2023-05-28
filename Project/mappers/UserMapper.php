<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Model;
use app\models\User;
use PhpParser\Node\Expr\Array_;

class UserMapper extends \app\core\Mapper
{
    private ?\PDOStatement $insert;
    private ?\PDOStatement $selectById;
    private ?\PDOStatement $selectByEmailPassword;
    private ?\PDOStatement $selectByEmail;

    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare("INSERT into users (email, password, name) VALUES (:email, :password, :name)");
        $this->selectById = $this->getPdo()->prepare("SELECT * FROM users WHERE id = :id");
        $this->selectByEmailPassword = $this->getPdo()->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $this->selectByEmail = $this->getPdo()->prepare("SELECT * FROM users WHERE email = :email");
    }

    public function doSelectByEmailPassword(string $email, string $password): ?Model
    {
        $this->selectByEmailPassword->execute([":email" => $email, ":password" => $password]);
        $data = $this->selectByEmailPassword->fetch(\PDO::FETCH_NAMED);
        if ($data == null) {
            return null;
        }
        return new User($data["id"], $data["email"], $data["password"], $data["name"]);
    }

    public function doSelectByEmail(string $email): ?Model
    {
        $this->selectByEmail->execute([":email" => $email]);
        $data = $this->selectByEmail->fetch(\PDO::FETCH_NAMED);
        if ($data == null) {
            return null;
        }
        return new User($data["id"], $data["email"], $data["password"], $data["name"]);
    }

    /**
     * @param User $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {
        $this->insert->execute([
            ":name" => $model->getName(),
            ":email" => $model->getEmail(),
            ":password" => $model->getPassword()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doSelect(int $id): array
    {
      $this->selectById->execute([":id" => $id]);
      return $this->selectById->fetch(\PDO::FETCH_NAMED);
    }

    function createObject(array $data): Model
    {
        return new User(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["email"],
            $data["password"],
            array_key_exists("name", $data) ? $data["name"] : null);
    }

    public function getInstance()
    {
        return $this;
    }

    protected function doUpdate(Model $model): void
    {
        // TODO: Implement doUpdate() method.
    }

    protected function doDelete(Model $model): void
    {
        // TODO: Implement doDelete() method.
    }

    protected function doSelectAll(): array
    {
        // TODO: Implement doSelectAll() method.
        return [];
    }
}