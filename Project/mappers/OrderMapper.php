<?php

namespace app\mappers;

use app\core\Mapper;
use app\core\Model;
use app\models\Order;


class OrderMapper extends Mapper
{
    private ?\PDOStatement $insert;

    private ?\PDOStatement $update;

    private ?\PDOStatement $delete;

    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $selectByUsername;

    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $update
     * @param \PDOStatement|null $delete
     */
    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into orders  (amount,number,price,productid,userid)
                    VALUES ( :amount, :number, :price, :productid, :userid  )"
        );
        $this->update = $this->getPdo()->prepare(
            "UPDATE orders
                  SET amount = :amount, 
                      number = :number, 
                      price = :price, 
                      productid = :productid,
                      userid = :userid
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM orders WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM orders WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM orders");
        $this->selectByUsername = $this->getPdo()->prepare("SELECT * FROM orders where userid = :userid");

    }


    /**
     * @param Order $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":amount" => $model->getAmount(),
            ":number" => $model->getNumber(),
            ":price" => $model->getPrice(),
            ":productid" => $model->getProductid(),
            ":userid" => $model->getUserid()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":id" => $model->getId(),
            ":amount" => $model->getAmount(),
            ":number" => $model->getNumber(),
            ":price" => $model->getPrice(),
            ":productid" => $model->getProductid(),
            ":userid" => $model->getUserid()
        ]);
    }

    protected function doDelete(Model $model): void
    {
        $this->delete->execute([":id" => $model->getId()]);
    }

    public function doSelect(int $id): array
    {
        $this->select->execute([":id" => $id]);
        return $this->select->fetch();
    }

    public function doSelectByUsername(string $userid): array
    {
        $this->selectByUsername->execute([":userid" => $userid]);
        return $this->selectByUsername->fetchAll();
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    function createObject(array $data): Model
    {
        return new Order(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["amount"],
            $data["number"],
            $data["price"],
            $data["productid"],
            $data["userid"]);
    }

    public function getInstance()
    {
        return $this;
    }

}