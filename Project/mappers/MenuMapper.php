<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Model;
use app\models\Menu;

class MenuMapper extends \app\core\Mapper
{
    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT INTO menu (name, description, price, category) 
            VALUES (:name, :description, :price, :category)"
        );
        $this->update = $this->getPdo()->prepare(
            "UPDATE menu 
            SET name = :name, 
                description = :description, 
                price = :price, 
                category = :category 
            WHERE id = :id"
        );
        $this->delete = $this->getPdo()->prepare("DELETE FROM menu WHERE id = :id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM menu WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM menu");
    }

    protected function doInsert(Model $model): Model
    {
        $this->insert->execute([
            ":name" => $model->getName(),
            ":description" => $model->getDescription(),
            ":price" => $model->getPrice(),
            ":category" => $model->getCategory(),
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
            ":description" => $model->getDescription(),
            ":price" => $model->getPrice(),
            ":category" => $model->getCategory(),
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

    protected function createObject(array $data): Model
    {
        return new Menu(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["name"],
            $data["description"],
            $data["price"],
            $data["category"]
        );
    }

    public function getInstance()
    {
        return $this;
    }
}