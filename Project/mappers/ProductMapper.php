<?php

namespace app\mappers;

use app\models\Product;
use app\core\Mapper;
use app\core\Model;

class ProductMapper extends Mapper
{

    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $selectByCategory;

    private ?\PDOStatement $selectByTitle;

    private ?\PDOStatement $selectLast;


    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $update
     * @param \PDOStatement|null $delete
     */
    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into product  (name,image,price,title,description,categoryid)
                    VALUES ( :name, :image, :price, :title, :description, :categoryid  )"
        );
        $this->update = $this->getPdo()->prepare(
            "UPDATE product
                  SET name = :name, 
                      image = :image, 
                      price = :price, 
                      title = :title,
                      description = :description,
                      categoryid = :categoryid 
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM product WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM product WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM product");
        $this->selectByCategory = $this->getPdo()->prepare("select * from product where categoryid = :categoryid");
        $this->selectByTitle = $this->getPdo()->prepare("select * from product where name like :title ");
        $this->selectLast = $this->getPdo()->prepare("select * from product order by id desc limit 1");

    }

    /**
     * @param Product $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":name" => $model->getName(),
            ":image" => $model->getImage(),
            ":price" => $model->getPrice(),
            ":title" => $model->getTitle(),
            ":description" => $model->getDescription(),
            ":categoryid" => $model->getCategoryid()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":id" => $model->getId(),
            ":name" => $model->getName(),
            ":image" => $model->getImage(),
            ":price" => $model->getPrice(),
            ":title" => $model->getTitle(),
            ":description" => $model->getDescription(),
            ":categoryId" => $model->getCategoryid()
        ]);
    }

    public function doUpdateProduct(int $id, string $name, string $image, int $price, string $title, string $description, int $categoryid): void
    {
        $this->update->execute([
            ":id" => $id,
            ":name" => $name,
            ":image" => $image,
            ":price" => $price,
            ":title" => $title,
            ":description" => $description,
            ":categoryid" => $categoryid
        ]);
    }

    protected function doDelete(Model $model): void
    {
        $this->delete->execute([":id" => $model->getId()]);
    }

    public function doDeleteProduct(int $id): void
    {
        $this->delete->execute([":id" => $id]);
    }

    public function doSelect(int $id): array
    {
        $this->select->execute([":id" => $id]);
        return $this->select->fetch();
    }

    public function doSelectById(int $id): array
    {
        $this->select->execute([":id" => $id]);
        return $this->select->fetch();
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    public function doSelectByCategory(int $id): array
    {
        $this->selectByCategory->execute([":categoryid" => $id]);
        return $this->selectByCategory->fetchAll();
    }

    public function doSelectByTitle(string $text): array
    {
        $this->selectByTitle->execute([":title" => $text]);
        return $this->selectByTitle->fetchAll();
    }

    public function doSelectLast(): array
    {
        $this->selectLast->execute();
        return $this->selectLast->fetch(\PDO::FETCH_NAMED);
    }

    function createObject(array $data): Model
    {
        return new Product(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["name"],
            $data["image"],
            $data["price"],
            $data["title"],
            $data["description"],
            $data["categoryid"]);
    }

    public function getInstance()
    {
        return $this;
    }

}
