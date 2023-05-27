<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Model;
use app\models\CashSaving;
use app\models\Category;
use app\models\MoneyOperation;
use app\models\User;

class CashSavingMapper extends \app\core\Mapper
{
    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $selectById;
    private ?\PDOStatement $selectAll;
    private ?\PDOStatement $selectAllByAuthorId;

    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $delete
     */
    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into cash_savings (name, author_id, sum) VALUES (:name, :author_id, :sum)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE cash_savings SET name = :name, sum = :sum WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM cash_savings WHERE id=:id");
        $this->selectById = $this->getPdo()->prepare("SELECT * FROM cash_savings WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM cash_savings");
        $this->selectAllByAuthorId = $this->getPdo()->prepare("SELECT * FROM cash_savings WHERE author_id = :author_id");
    }

    /**
     * @param CashSaving $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {
        $this->insert->execute([
            ":name" => $model->getName(),
            ":author_id" => $model->getAuthorId(),
            ":sum" => $model->getSum()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    /**
     * @param CashSaving $model
     */
    protected function doDelete(Model $model): void
    {
        $this->delete->execute([":id" => $model->getId()]);
    }

    /**
     * @param int $id
     * @return array
     */
    protected function doSelect(int $id): array
    {
      $this->selectById->execute([":id" => $id]);
      return $this->selectById->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    public function doSelectAllByAuthorId(int $author_id): array
    {
        $this->selectAllByAuthorId->execute([":author_id" => $author_id]);
        $savings = [];
        $res = $this->selectAllByAuthorId->fetchAll();
        for ($i = 0; $i < count($res); $i++) {
            $savings[$i] = $this->createObject($res[$i]);
        }
        return $savings;
    }

    function createObject(array $data): Model
    {
        return new CashSaving(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["name"],
            $data["author_id"],
            $data["sum"]);
    }

    public function getInstance()
    {
        return $this;
    }

    /**
     * @param CashSaving $model
     */
    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":name" => $model->getName(),
            ":sum" => $model->getSum()
        ]);
    }
}