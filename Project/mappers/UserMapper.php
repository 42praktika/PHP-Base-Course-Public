<?php

namespace app\mappers;

use app\core\{Application, Collection, Model};
use app\models\User;
use PDO;
use PDOStatement;

class UserMapper extends \app\core\Mapper
{

    private ?PDOStatement $insert;
    private ?PDOStatement $update;
    private ?PDOStatement $delete;
    private ?PDOStatement $select;
    private ?PDOStatement $selectAll;


    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare("INSERT into users (username, password, email, phone) VALUES (:username, :password, :email, :phone)");
        $this->update = $this->getPdo()->prepare("UPDATE users SET username = :username, password = :password, email = :email, phone = :phone WHERE id==:id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM users WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM users WHERE id=:id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM users");
    }

    /**
     * @param User $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {
        $this->insert->execute(params: [":username" => $model->getUsername(),
            "password" => password_hash($model->getPassword(), PASSWORD_BCRYPT),
            "email" => $model->getEmail(),
            "phone" => $model->getPhone()]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        var_dump($model);
        $this->update->execute(params: [
            ":id" => $model->getId(),
            ":username" => $model->getUsername(),
            "password" => password_hash($model->getPassword(), PASSWORD_BCRYPT),
            "email" => $model->getEmail(),
            "phone" => $model->getPhone()]);

    }

    protected function doDelete(Model $model): void
    {
        $this->insert->execute(params: [
            ":id" => $model->getId()]);
    }

    protected function doSelect(int $id): array
    {
        $this->select->execute([":id"=>$id]);
        return $this->select->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    public function getInstance()
    {
        return $this;
    }

    function createObject(array $data): Model
    {
        return new User(array_key_exists("id", $data) ? $data["id"] : null,
            $data["username"],
            $data["password"],
            $data["email"],
            $data["phone"]);
    }
    static function findUserByPhone(string $phone):?User
    {
        $query = Application::$database->pdo->prepare("SELECT * FROM users WHERE phone=:phone");
        $query->execute([":phone"=>$phone]);
        $query_result = $query->fetch(\PDO::FETCH_NAMED);
        if(!$query_result)
        {
            return null;
        }

        $user = new User($query_result["id"], $query_result["username"], $query_result["password"], $query_result["email"], $query_result["phone"]);

        return $user;
    }
    static function findUserByID(int $id):?User
    {
        $query = Application::$database->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $query->execute([":id"=>$id]);
        $query_result = $query->fetch(\PDO::FETCH_NAMED);
        if(!$query_result)
        {
            return null;
        }

        $user = new User($query_result["id"], $query_result["username"], $query_result["password"], $query_result["email"], $query_result["phone"]);

        return $user;
    }
}