<?php

namespace app\mappers;

use app\core\Application;
use app\core\Model;
use app\exceptions\DBException;
use app\models\Wishlist;
use InvalidArgumentException;
use RuntimeException;

class WishlistMapper extends \app\core\Mapper
{
    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;
    private ?\PDOStatement $selectProductFromWishlist;

    private ?\PDOStatement $insertProductIntoWishlist;
    private ?\PDOStatement $selectUserWishlists;

    private ?\PDOStatement $updateTitle;

    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into wishlists  ( user_id, title)
                    VALUES ( :userId, :title)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE wishlists 
                  SET user_id= :userId, 
                      title = :title
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM wishlists WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM wishlists WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM wishlists");
        $this->selectProductFromWishlist =  $this->getPdo()->prepare("select * from wishlists_entry where list_id = :listId and product_id = :productId");
        $this->insertProductIntoWishlist = $this->getPdo()->prepare("insert into wishlists_entry(list_id, product_id)  values (:listId, :productId)");
        $this->selectUserWishlists = $this->getPdo()->prepare("select * from  wishlists where user_id = :userId");
        $this->updateTitle = $this->getPdo()->prepare("update wishlists set title = :title where id = :listId and user_id = :userId");
    }

    /**
     * @throws DBException
     */
    protected function doInsert(Model $model): Model
    {
        try {
            $this->insert->execute([
                ":userId" => $model->getUserId(),
                ":title" => $model->getTitle()
            ]);
            $id = $this->getPdo()->lastInsertId();
            $model->setId($id);
            return $model;
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while inserting item: ' . $e->getMessage());
            throw new DBException('Failed to insert item.', $e);
        }
    }

    /**
     * @throws DBException
     */
    protected function doUpdate(Model $model): void
    {
        try {
            $this->update->execute([
                ":id" => $model->getId(),
                ":userID" => $model->getUserId(),
                ":title" => $model->getTitle()
            ]);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while updating item: ' . $e->getMessage());
            throw new DBException('Failed to update item.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doUpdateTitle(String $title, int $listId, int $userId): void
    {
        try {
            $this->updateTitle->execute([
                ":title" => $title,
                ":userId" => $userId,
                ":listId" => $listId
            ]);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while updating item title: ' . $e->getMessage());
            throw new DBException('Failed to update item title.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doDelete(int|Model $model): void
    {
        try {
            $this->delete->execute([":id" => $model]);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while deleting item: ' . $e->getMessage());
            throw new DBException('Failed to delete item.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doSelect(int $id): array
    {
        try {
            $this->select->execute([":id" => $id]);
            return $this->select->fetch(\PDO::FETCH_NAMED);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting item: ' . $e->getMessage());
            throw new DBException('Failed to select item.', $e);
        }
    }

    /**
     * @throws DBException
     */
    protected function doSelectAll(): array
    {
        try {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting all items: ' . $e->getMessage());
            throw new DBException('Failed to select all items.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doSelectUserWishlists(int $userId): array
    {
        try {
            $this->selectUserWishlists->execute([":userId" => $userId]);
            return $this->selectUserWishlists->fetchAll();
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting user wishlists: ' . $e->getMessage());
            throw new DBException('Failed to select user wishlists.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doSelectProductFromWishlist(int $wishlistId, int $productId): bool
    {
        try {
            $this->selectProductFromWishlist->execute([
                ":productId" => $productId,
                ":listId" => $wishlistId
            ]);
            $check = $this->selectProductFromWishlist->fetch(\PDO::FETCH_NAMED);
            return ($check !== null);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting product from wishlist: ' . $e->getMessage());
            throw new DBException('Failed to select product from wishlist.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doInsertProductIntoWishlist(int $wishlistId, int $productId): void
    {
        try {
            $this->insertProductIntoWishlist->execute([
                ":productId" => $productId,
                ":listId" => $wishlistId
            ]);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while inserting product into wishlist: ' . $e->getMessage());
            throw new DBException('Failed to insert product into wishlist.', $e);
        }
    }
    public function getInstance()
    {
        return $this;
    }
    public function createObject(array $data): Model
    {
        var_dump($data);
        try {
            if (!isset($data["userId"]) || !isset($data["title"])) {
                throw new InvalidArgumentException('Invalid wishlist data. Missing required fields.');
            }

            return new Wishlist(
                array_key_exists("id", $data) ? $data["id"] : null,
                $data["userId"],
                $data["title"]
            );
        } catch (\Exception $e) {
            Application::$app->getLogger()->error('Error occurred while creating Wishlist object: ' . $e->getMessage());
            throw new RuntimeException('Failed to create Wishlist object.', $e);
        }
    }
}