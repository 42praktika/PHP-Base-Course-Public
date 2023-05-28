<?php

namespace app\mappers;

use app\core\{Application, Collection, Model};
use app\models\Order;
use PDO;
use PDOStatement;

class OrderMapper extends \app\core\Mapper
{
    private ?PDOStatement $insert;
    private ?PDOStatement $update;
    private ?PDOStatement $delete;
    private ?PDOStatement $select;
    private ?PDOStatement $selectAll;


    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare("INSERT into orders (username, phone, address) VALUES (:username, :phone, :address)");
        $this->update = $this->getPdo()->prepare("UPDATE orders SET username = :username, phone = :phone, address = :address WHERE id=:id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM orders WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM orders WHERE id=:id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM orders");
    }

    /**
     * @param Order $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {
        $this->insert->execute(params: [":username" => $model->getUsername(),
            "phone" => $model->getPhone(),
            "address" => $model->getAddress(),]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
//        var_dump($model);
        $this->update->execute( [
            ":id" => $model->getId(),
            ":username" => $model->getUsername(),
            ":phone" => $model->getPhone(),
            ":address" => $model->getAddress()]);

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
        return new Order(array_key_exists("id", $data) ? $data["id"] : null,
            $data["username"],
            $data["phone"],
            $data["address"]);
    }
}