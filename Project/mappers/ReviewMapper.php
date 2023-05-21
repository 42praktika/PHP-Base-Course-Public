<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Model;
use app\models\Review;

class ReviewMapper extends \app\core\Mapper
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
            "INSERT INTO reviews (user_id, menu_id, rating, comment) 
            VALUES (:user_id, :menu_id, :rating, :comment)"
        );
        $this->update = $this->getPdo()->prepare(
            "UPDATE reviews 
            SET user_id = :user_id, 
                menu_id = :menu_id, 
                rating = :rating, 
                comment = :comment 
            WHERE id = :id"
        );
        $this->delete = $this->getPdo()->prepare("DELETE FROM reviews WHERE id = :id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM reviews WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM reviews");
    }

    protected function doInsert(Model $model): Model
    {
        $this->insert->execute([
            ":user_id" => $model->getUserId(),
            ":menu_id" => $model->getMenuId(),
            ":rating" => $model->getRating(),
            ":comment" => $model->getComment(),
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":id" => $model->getId(),
            ":user_id" => $model->getUserId(),
            ":menu_id" => $model->getMenuId(),
            ":rating" => $model->getRating(),
            ":comment" => $model->getComment(),
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
        return new Review(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["user_id"],
            $data["menu_id"],
            $data["rating"],
            $data["comment"]
        );
    }

    public function getInstance()
    {
        return $this;
    }
}