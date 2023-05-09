<?php

namespace app\mappers;

use app\core\Mapper;
use app\core\Model;
use app\models\CarType;

class CarTypeMapper extends Mapper
{

    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;
    private ?\PDOStatement $selectCount;


    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $update
     * @param \PDOStatement|null $delete
     */
    public function __construct()

    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into cars_type  (type_name)
                    VALUES ( :type_name)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE cars_type 
                  SET type_name = :type_name
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM cars_type WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM cars_type WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM cars_type");
        $this->selectCount = $this->getPdo()->prepare("SELECT count(*) FROM cars_type");
    }

    /**
     * @param CarType $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":type_name" => $model->getTypeName(),
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":type_name" => $model->getTypeName(),
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

    protected function doSelectCount(): array
    {
        $this->selectCount->execute();
        return $this->selectCount->fetchAll();
    }

    function createObject(array $data): Model
    {
        return new CarType(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["type_name"],
        );
    }

    public function getInstance()
    {
        return $this;
    }
}