<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Mapper;
use app\core\Model;
use app\models\User;

class UserMapper extends Mapper
{

    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $login;

    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $update
     * @param \PDOStatement|null $delete
     */
    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into users  ( name, username, email, password, isAdmin)
                    VALUES ( :name, :username, :email, :password, :isAdmin )"
        );
        $this->update = $this->getPdo()->prepare(
            "UPDATE users 
                  SET name = :name, 
                      email = :email, 
                      password = :password,
                      isAdmin = :isAdmin
                      WHERE username = :username");
        $this->delete = $this->getPdo()->prepare("DELETE FROM users WHERE username=:username");
        $this->select = $this->getPdo()->prepare("SELECT * FROM users WHERE username = :username");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM users");
        $this->login = $this->getPdo()->prepare("SELECT * FROM users where username=:username and password=:password");
    }

    /**
     * @param User $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":name" => $model->getName(),
            ":username" => $model->getUsername(),
            ":email" => $model->getEmail(),
            ":password" => $model->getPassword(),
            ":isAdmin" => $model->getIsAdmin()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":username" => $model->getUsername(),
            ":name" => $model->getName(),
            ":email" => $model->getEmail(),
            ":password" => $model->getPassword(),
            ":isAdmin" => $model->getIsAdmin()
        ]);
    }

    protected function doDelete(Model $model): void
    {
        $this->delete->execute([":username" => $model->getUsername()]);
    }

    protected function doSelectUserByUsername(Model $model): array
    {
        $this->select->execute([":username" => $model->getUsername()]);
        return $this->select->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    protected function login(Model $model): array
    {
        $this->login->execute([":username" => $model->getUsername(),
            ":password"=>$model->getPassword()]);
        return $this->login->fetch(\PDO::FETCH_NAMED);
    }
    function createObject(array $data): Model
    {
        return new User(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["name"],
            $data["username"],
            $data["email"],
            $data["password"]
        );
    }

    public function getInstance()
    {
        return $this;
    }


    protected function doSelect(int $id): array
    {
        $this->select->execute([":id" => $id]);
        return $this->select->fetch(\PDO::FETCH_NAMED);
    }
}