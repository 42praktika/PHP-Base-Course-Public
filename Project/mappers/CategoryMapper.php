<?php

namespace app\mappers;

use app\core\Mapper;
use app\models\Category;
use app\core\Model;


class CategoryMapper extends Mapper
{

    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $selectName;

    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $update
     * @param \PDOStatement|null $delete
     */
    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into category  ( name)
                    VALUES ( :name)"
        );
        $this->update = $this->getPdo()->prepare(
            "UPDATE category 
                  SET name = :name 
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM category WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM category WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM category");
        $this->selectName = $this->getPdo()->prepare("SELECT name FROM category WHERE id = :id");
    }

    /**
     * @param Category $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":name" => $model->getName()
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

    public function doSelectName(int $id): array
    {
        $this->selectName->execute([":id" => $id]);
        return $this->selectName->fetch(\PDO::FETCH_ASSOC);
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    function createObject(array $data): Model
    {
        return new Category(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["name"]
        );
    }

    public function getInstance()
    {
        return $this;
    }

}
