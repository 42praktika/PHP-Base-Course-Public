<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Model;
use app\models\User;

class UserMapper extends \app\core\Mapper
{

    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into users  ( first_name, second_name, age, job, email, phone)
                    VALUES ( :first_name, :second_name, :age, :job, :email, :phone )"
        );
        $this->update = $this->getPdo()->prepare(
            "UPDATE users 
                  SET first_name = :first_name, 
                      second_name = :second_name, 
                      age = :age, 
                      job = :job,
                      email = :email,
                      phone = :phone 
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM users WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM users WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM users");
    }


    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":first_name" => $model->getFirstName(),
            ":second_name" => $model->getSecondName(),
            ":age" => $model->getAge(),
            ":job" => $model->getJob(),
            ":email" => $model->getEmail(),
            ":phone" => $model->getPhone()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":id" => $model->getId(),
            ":first_name" => $model->getFirstName(),
            ":second_name" => $model->getSecondName(),
            ":age" => $model->getAge(),
            ":job" => $model->getJob(),
            ":email" => $model->getEmail(),
            ":phone" => $model->getPhone()
        ]);
    }

    protected function doDelete(Model $model): void
    {
        $this->delete->execute([":id" => $model->getId()]);
    }

    protected function doSelect(int $id): array
    {
        $this->select->execute([":id" => $id]);
        return $this->select->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    function createObject(array $data): Model
    {
        return new User(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["first_name"],
            $data["second_name"],
            $data["age"],
            $data["job"],
            $data["email"],
            $data["phone"]);
    }

    public function getInstance()
    {
        return $this;
    }
}