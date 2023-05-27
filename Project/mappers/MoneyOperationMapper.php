<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Model;
use app\models\MoneyOperation;
use app\models\User;
use Cassandra\Date;

class MoneyOperationMapper extends \app\core\Mapper
{
    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $selectById;
    private ?\PDOStatement $selectAll;
    private ?\PDOStatement $selectAllByPeriodAuthorId;
    private ?\PDOStatement $getSumByPeriod;

    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $update
     * @param \PDOStatement|null $delete
     */
    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into money_operations (author_id, sum, date, category_id, description, income) VALUES (:author_id, :sum, :date, :category_id, :description, :income)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE money_operations SET sum = :sum, date = :date, category_id = :category_id, description = :description WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM money_operations WHERE id=:id");
        $this->selectById = $this->getPdo()->prepare("SELECT * FROM money_operations WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM money_operations");
        $this->selectAllByPeriodAuthorId = $this->getPdo()->prepare("SELECT * FROM money_operations WHERE author_id = :author_id AND income = :income AND date BETWEEN :start AND :end");
        $this->getSumByPeriod = $this->getPdo()->prepare("SELECT SUM(sum) FROM money_operations WHERE income = :income AND author_id = :author_id AND date BETWEEN :start AND :end");
    }

    /**
     * @param MoneyOperation $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {
        $this->insert->execute([
            ":author_id" => $model->getAuthorId(),
            ":sum" => $model->getSum(),
            ":date" => $model->getDate(),
            ":category_id" => $model->getCategoryId(),
            ":description" => $model->getDescription(),
            ":income" => $model->isIncome() ? 1 : 0
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    /**
     * @param MoneyOperation $model
     */
    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":sum" => $model->getSum(),
            ":date" => $model->getDate(),
            ":category_id" => $model->getCategoryId(),
            ":description" => $model->getDescription()
        ]);
    }
    /**
     * @param MoneyOperation $model
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

    public function doSelectAllByPeriodAuthorId(int $author_id, bool $income, string $start, string $end): array
    {
        $this->selectAllByPeriodAuthorId->execute([":author_id" => $author_id, ":income" => $income, ":start" => date($start), ":end" => date($end)]);
        return $this->selectAllByPeriodAuthorId->fetchAll(\PDO::FETCH_NAMED);
    }

    public function getSumByPeriod(int $author_id, bool $income, string $start, string $end): array
    {
        $x = $income ? 1 : 0;
        $this->getSumByPeriod->execute([":author_id" => $author_id, ":income" => $x, ":start" => date($start), ":end" => date($end)]);
        return $this->getSumByPeriod->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    function createObject(array $data): Model
    {
        return new MoneyOperation(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["author_id"],
            $data["sum"],
            $data["date"],
            $data["category_id"],
            $data["description"],
            $data["income"]
        );
    }

    public function getInstance()
    {
        return $this;
    }
}