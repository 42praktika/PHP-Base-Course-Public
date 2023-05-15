<?php

namespace app\mappers;

use app\core\Mapper;
use app\models\Cart;
use app\core\Model;

class CartMapper extends Mapper
{
    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $updateAmount;

    private ?\PDOStatement $selectUserCart;

    private ?\PDOStatement $deleteProduct;

    private ?\PDOStatement $selectAllCart;
    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $update
     * @param \PDOStatement|null $delete
     */
    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into cart  (username,productId,amount)
                    VALUES ( :username, :productId , :amount )"
        );
        $this->update = $this->getPdo()->prepare(
            "UPDATE cart
                  SET categoryId = :categoryId,
                      amount = :amount
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM cart WHERE id = :id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM cart WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("select * from cart");
        $this->selectUserCart = $this->getPdo()->prepare("select * from cart where username = :username");
        $this->deleteProduct = $this->getPdo()->prepare("delete from cart where username= :username and productId= :productId");
        $this->selectAllCart = $this->getPdo()->prepare("select p.id,p.name,p.image,p.price,s.amount,p.title,p.description,p.categoryId from cart as s left join product p on s.productID = p.id where s.username= :username ");
        $this->updateAmount = $this->getPdo()->prepare("update cart set amount= :amount where username= :username and productId= :productId ");
    }
    /**
     * @param Product $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":username" => $model->getUsername(),
            ":productId" => $model->getProductId(),
            ":amount" => $model->getAmount()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":id" => $model->getId(),
            ":username" => $model->getUsername(),
            ":productId" => $model->getProductId(),
            ":amount" => $model->getAmount()
        ]);
    }

    protected function doDelete(Model $model): void
    {
        $this->delete->execute([
            ":id" => $model->getId(),

            ]);
    }

    protected function doSelect(int $id): array
    {
        $this->select->execute([":id" => $id]);
        return $this->select->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectUserCart(Model $model): array
    {
        $this->selectUserCart->execute([":username"=>$model->getUsername()]);
        return $this->selectUserCart->fetch(\PDO::FETCH_NAMED);
    }

    protected function doDeleteProduct(Model $model): void
    {
        $this->deleteProduct->execute([":username" => $model->getUsername(),
            "productId"=>$model->getProductId()]);

    }

    protected function doUpdateAmount(Model $model): void
    {
        $this->updateAmount->execute([":amount" => $model->getAmount(),
        ":username"=>$model->getUsername(),
          "productId"=>$model->getProductId()]);

    }

    protected function doSelectAllCart(Model $model): array
    {
        $this->selectAllCart->execute([":username" => $model->getUsername()]);
        return $this->selectAllCart->fetch(\PDO::FETCH_NAMED);
    }
    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }


    function createObject(array $data): Model
    {
        return new Cart(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["username"],
            $data["productId"],
            $data["amount"],
            );
    }

    public function getInstance()
    {
        return $this;
    }
}