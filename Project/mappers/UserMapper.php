<?php

namespace app\mappers;

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
    private ?\PDOStatement $selectCount;





    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $update
     * @param \PDOStatement|null $delete
     */
    public function __construct()

    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into users  ( first_name, second_name, third_name, email, phone, series, number, number_driver, psw)
                    VALUES ( :first_name, :second_name, :third_name, :email, :phone, :series, :number, :number_driver, :psw)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE users 
                  SET first_name = :first_name, 
                      second_name = :second_name,
                      third_name = :third_name,
                      email = :email,
                      phone = :phone,
                      series = :series,
                      number = :number,
                      number_driver = :number_driver,
                      psw = :psw
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM users WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM users WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM users");
        $this->selectCount = $this->getPdo()->prepare("SELECT count(*) FROM users");

    }

    /**
     * @param User $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":first_name" => $model->getFirstName(),
            ":second_name" => $model->getSecondName(),
            ":third_name" => $model->getThirdName(),
            ":email" => $model->getEmail(),
            ":phone" => $model->getPhone(),
            ":series" => $model->getSeries(),
            ":number" => $model->getNumber(),
            ":number_driver" => $model->getNumberDriver(),
            ":psw" => $model->getPsw(),

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
            ":third_name" => $model->getThirdName(),
            ":email" => $model->getEmail(),
            ":phone" => $model->getPhone(),
            ":series" => $model->getSeries(),
            ":number" => $model->getNumber(),
            ":number_driver" => $model->getNumberDriver(),
            ":psw" => $model->getPsw(),
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

    protected function doSelectCount(): array
    {
        $this->selectCount->execute();
        return $this->selectCount->fetchAll();
    }

    function createObject(array $data): Model
    {
        return new User(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["first_name"],
            $data["second_name"],
            $data["third_name"],
            $data["email"],
            $data["phone"],
            $data["series"],
            $data["number"],
            $data["number_driver"],
            $data["psw"],
        );
    }

    public function getInstance()
    {
        return $this;
    }
}