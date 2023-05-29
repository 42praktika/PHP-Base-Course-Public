<?php

namespace app\mappers;

use app\core\Application;
use app\core\Model;
use app\exceptions\DBException;
use app\models\Product;
use InvalidArgumentException;
use RuntimeException;

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


    /**
     * @throws DBException
     */
    public function doInsert(Model $model): Model
    {
        try {
            $this->insert->execute([
                ":image" => $model->getImage(),
                ":text" => $model->getText()
            ]);
            $id = $this->getPdo()->lastInsertId();
            $model->setId($id);
            return $model;
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while inserting product: ' . $e->getMessage());
            throw new DBException('Failed to insert product.', $e);
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
                ":image" => $model->getImage(),
                ":text" => $model->getText(),
            ]);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while updating product: ' . $e->getMessage());
            throw new DBException('Failed to update product.', $e);
        }
    }

    /**
     * @throws DBException
     */
    protected function doDelete(Model $model): void
    {
        try {
            $this->delete->execute([":id" => $model->getId()]);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while deleting product: ' . $e->getMessage());
            throw new DBException('Failed to delete product.', $e);
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
            Application::$app->getLogger()->error('Error occurred while selecting product: ' . $e->getMessage());
            throw new DBException('Failed to select product.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doSelectAll(): array
    {
        try {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting all products: ' . $e->getMessage());
            throw new DBException('Failed to select all products.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doSelectProductsInWishlist(int $userID, int $listID): array
    {
        try {
            $this->selectProductsInWishlist->execute([
                ":user_id" => $userID,
                ":id" => $listID
            ]);
            return $this->selectProductsInWishlist->fetchAll();
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting products in wishlist: ' . $e->getMessage());
            throw new DBException('Failed to select products in wishlist.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doDeleteProductFromWishlist(int $productID, int $listID): void
    {
        try {
            $this->deleteProductFromWishlist->execute([
                ":product_id"=> $productID,
                ":list_id" => $listID
            ]);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while deleting product from wishlist: ' . $e->getMessage());
            throw new DBException('Failed to delete product from wishlist.', $e);
        }
    }

    public function getInstance()
    {
        return $this;
    }

    public function createObject(array $data): Model
    {
        try {
            if (!isset($data["image"]) || !isset($data["text"])) {
                throw new InvalidArgumentException('Invalid product data. Missing required fields.');
            }

            return new Product(
                array_key_exists("id", $data) ? $data["id"] : null,
                $data["image"],
                $data["text"]
            );
        } catch (\Exception $e) {
            Application::$app->getLogger()->error('Error occurred while creating Product object: ' . $e->getMessage());
            throw new RuntimeException('Failed to create Product object.',  $e);
        }
    }
}