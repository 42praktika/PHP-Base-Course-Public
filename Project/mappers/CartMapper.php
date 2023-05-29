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

    private ?\PDOStatement $selectProduct;

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
        $this->selectProduct = $this->getPdo()->prepare("select * from cart where username = :username and productId = :productId");
        $this->selectUserCart = $this->getPdo()->prepare("select * from cart where username = :username");
        $this->deleteProduct = $this->getPdo()->prepare("delete from cart where username= :username and productId= :productId");
        $this->selectAllCart = $this->getPdo()->prepare("select p.id,p.name,p.image,p.price,s.amount,p.title,p.description,p.categoryId from cart as s left join product p on s.productID = p.id where s.username= :username ");
        $this->updateAmount = $this->getPdo()->prepare("update cart set amount= :amount where username= :username and productId= :productId ");
        $this->selectAmount = $this->getPdo()->prepare("select amount from cart where username= :username and productId= :productId ");
    }

    /**
     * @param Cart $model
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

    public function doUpdateAmount(string $username, int $productId, int $amount): void
    {
        $this->updateAmount->execute([":amount" => $amount,
            ":username" => $username,
            "productId" => $productId]);

    }

    protected function doDelete(Model $model): void
    {
        $this->delete->execute([
            ":id" => $model->getId(),

        ]);
    }

    public function doDeleteProduct(string $username, int $productId): void
    {
        $this->deleteProduct->execute([":username" => $username,
            "productId" => $productId]);

    }

    protected function doSelect(int $id): array
    {
        $this->select->execute([":id" => $id]);
        return $this->select->fetch(\PDO::FETCH_NAMED);
    }

    public function doSelectUserCart(string $username): array
    {
        $this->selectUserCart->execute([":username" => $username]);
        return $this->selectUserCart->fetch(\PDO::FETCH_ASSOC);
    }

    public function doSelectAmount(string $username, int $productId): array
    {
        $this->selectAmount->execute([":username" => $username,
            "productId" => $productId]);
        return $this->selectAmount->fetch(\PDO::FETCH_ASSOC);
    }

    public function doSelectProduct(string $username, int $productId): array
    {
        $this->selectProduct->execute([":username" => $username,
            ":productId" => $productId]);
        return $this->selectProduct->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function doSelectAllCart(string $username): array
    {
        $this->selectAllCart->execute([":username" => $username]);
        return $this->selectAllCart->fetchAll(\PDO::FETCH_ASSOC);
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
