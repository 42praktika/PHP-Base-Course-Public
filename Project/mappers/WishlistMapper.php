<?php

namespace app\mappers;

use app\core\Model;
use app\models\Wishlist;

class WishlistMapper extends \app\core\Mapper
{
    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $selectTitleById;
    private ?\PDOStatement $selectProductFromWishlist;

    private ?\PDOStatement $insertProductIntoWishlist;
    private ?\PDOStatement $selectUserWishlists;

    private ?\PDOStatement $updateTitle;

    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into wishlists  ( userId, title)
                    VALUES ( :userId, :title)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE wishlists 
                  SET userId = :userId, 
                      title = :title
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM wishlists WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM wishlists WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM wishlists");
        $this->selectTitleById = $this->getPdo()->prepare("select title from wishlists where id = :id");
        $this->selectProductFromWishlist =  $this->getPdo()->prepare("select * from wishlists_entry where list_id = :listId and product_id = :productId");
        $this->insertProductIntoWishlist = $this->getPdo()->prepare("insert into wishlists_entry(list_id, product_id)  values (:listId, :productId)");
        $this->selectUserWishlists = $this->getPdo()->prepare("select * from  wishlists where user_id = :userId");
        $this->updateTitle = $this->getPdo()->prepare("update wishlists set title = :title where id = :listId and user_id = :userId");
    }


    protected function doInsert(Model $model): Model
    {
        $this->insert->execute([
            ":userId" => $model->getUserId(),
            ":title" => $model->getTitle(),
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":id" => $model->getId(),
            ":userID" => $model->getUserId(),
            ":title" => $model->getTitle(),
        ]);
    }
    protected function doUpdateTitle(String $title, int $listId, int $userId): void
    {
        $this->updateTitle->execute([
            ":title" => $title,
            ":userId" => $userId,
            ":listId" => $listId,
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

    protected function doSelectUserWishlists(int $userId): array
    {
        $this->selectUserWishlists->execute([":userId" => $userId]);
        return $this->selectUserWishlists->fetchAll();
    }


    //должно возвращать титл
    protected function doSelectTitleById(int $id): array
    {
        $this->selectTitleById->execute([":id" => $id]);
        return $this->selectTitleById->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectProductFromWishlist(int $wishlistId, int $productId): bool
    {
        $this->selectProductFromWishlist->execute([":productId" => $productId, ":listId" => $wishlistId]);
        $check =  $this->selectProductFromWishlist->fetch(\PDO::FETCH_NAMED);
        return ($check == null);
        //если не нал то есть
    }

    protected function doInsertProductIntoWishlist(int $wishlistId, int $productId): void
    {
        $this->insertProductIntoWishlist->execute([":productId" => $productId, ":listId" => $wishlistId]);
    }
    public function getInstance()
    {
        return $this;
    }

    public function createObject(array $data): Model
    {
        return new Wishlist(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["userId"],
            $data["title"]);
    }
}