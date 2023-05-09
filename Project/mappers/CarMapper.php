<?php

namespace app\mappers;

use app\core\Mapper;
use app\core\Model;
use app\models\Car;

class CarMapper extends Mapper
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
            "INSERT into cars  (state_number , mark, model, typeid, cost)
                    VALUES ( :state_number, :mark, :model, :typeid, :cost)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE cars 
                  SET state_number = :state_number, 
                      mark = :mark,
                      model = :model,
                      typeid = :typeid,
                      cost = :cost
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM cars WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM cars WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM cars");
        $this->selectCount = $this->getPdo()->prepare("SELECT count(*) FROM cars");
    }

    /**
     * @param Car $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":state_number" => $model->getStateNumber(),
            ":mark" => $model->getMark(),
            ":model" => $model->getModel(),
            ":typeid" => $model->getTypeId(),
            ":cost" => $model->getCost()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":state_number" => $model->getStateNumber(),
            ":mark" => $model->getMark(),
            ":model" => $model->getModel(),
            ":typeid" => $model->getTypeId(),
            ":cost" => $model->getCost()
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
        return new Car(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["state_number"],
            $data["mark"],
            $data["model"],
            $data["typeid"],
            $data["cost"]
        );
    }

    public function getInstance()
    {
        return $this;
    }
}