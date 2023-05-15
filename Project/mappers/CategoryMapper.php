<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Model;
use app\models\Category;
use app\models\MoneyOperation;
use app\models\User;

class CategoryMapper extends \app\core\Mapper
{
    private ?\PDOStatement $insert;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $selectById;
    private ?\PDOStatement $selectAllByTypeAuthorId;
    private ?\PDOStatement $selectAll;

    /**
     * @param \PDOStatement|null $insert
     * @param \PDOStatement|null $delete
     */
    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into categories (name, author_id, income) VALUES (:name, :author_id, :income)");
        $this->delete = $this->getPdo()->prepare("DELETE FROM categories WHERE id=:id");
        $this->selectById = $this->getPdo()->prepare("SELECT * FROM categories WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM categories");
        $this->selectAllByTypeAuthorId = $this->getPdo()->prepare("SELECT * FROM categories WHERE income = :income AND (author_id = :author_id OR author_id IS NULL )");
    }

    /**
     * @param Category $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {
        $this->insert->execute([
            ":name" => $model->getName(),
            ":author_id" => $model->getAuthorId(),
            ":income" => $model->isIncome()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    /**
     * @param Category $model
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

    protected function doSelectAllByTypeAuthorId(?int $author_id, bool $income): array
    {
        $this->selectAllByTypeAuthorId->execute([":author_id" => $author_id, ":income" => $income]);
        return $this->selectAllByTypeAuthorId->fetchAll(\PDO::FETCH_NAMED);
    }

    function createObject(array $data): Model
    {
        return new Category(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["name"],
            $data["author_id"],
            $data["income"]);
    }

    public function getInstance()
    {
        return $this;
    }

    protected function doUpdate(Model $model): void
    {
        // TODO: Implement doUpdate() method.
    }
}