<?php

namespace app\mappers;

use app\core\Model;
use app\models\Product;

class ProductMapper extends \app\core\Mapper
{
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $select;
    private ?\PDOStatement $insert;

    private ?\PDOStatement $update;

    private ?\PDOStatement $delete;

    private ?\PDOStatement $selectProductsInWishlist;

    private ?\PDOStatement $deleteProductFromWishlist;

    public function __construct()
    {
        parent::__construct();
        $this->selectAll = $this->getPdo()->prepare("select * from products");
        $this->select = $this->getPdo()->prepare("select * from products where id = :id");;
        $this->insert = $this->getPdo()->prepare(
            "INSERT into products ( img, text)
                    VALUES ( :image, :text)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE products 
                  SET img = :image, 
                      text = :text  
                      WHERE id = :id");
        $this->delete  = $this->getPdo()->prepare("DELETE FROM products WHERE id=:id");
        $this->selectProductsInWishlist = $this->getPdo()->prepare("select product_id from wishlists_entry where list_id = (select id from wishlists where user_id = :user_id and id= :id);");
        $this->deleteProductFromWishlist = $this->getPdo()->prepare("delete from wishlists_entry where product_id = :product_id and list_id = :list_id");
    }


    protected function doInsert(Model $model): Model
    {
        $this->insert->execute([
            ":image" => $model->getImage(),
            ":text" => $model->getText()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":id" => $model->getId(),
            ":image" => $model->getImage(),
            ":text" => $model->getText(),
        ]);
    }

    protected function doDelete(Model $model): void
    {
        $this->delete->execute([":id" => $model->getId()]);
    }

    public function doSelect(int $id): array
    {
        $this->select->execute([":id" => $id]);
        return $this->select->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    public function doSelectProductsInWishlist(int $userID, int $listID): array
    {
        $this->selectProductsInWishlist->execute([
            ":user_id" => $userID,
            ":id" => $listID
        ]);
        return $this->selectProductsInWishlist->fetchAll();
    }

    public function doDeleteProductFromWishlist(int $productID, int $listID): void
    {
        $this->deleteProductFromWishlist->execute([
            ":product_id"=> $productID,
            ":list_id" => $listID
        ]);
    }

    public function getInstance()
    {
        return $this;
    }

    public function createObject(array $data): Model
    {
        return new Product(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["image"],
            $data["text"]);
    }
}