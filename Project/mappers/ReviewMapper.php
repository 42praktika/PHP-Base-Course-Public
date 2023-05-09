<?php

namespace app\mappers;

use app\core\Mapper;
use app\core\Model;
use app\models\Review;

class ReviewMapper extends Mapper
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
            "INSERT into reviews  (name_of_reviewer, stars, review)
                    VALUES ( :name_of_reviewer, :stars, :review)");
        $this->update = $this->getPdo()->prepare(
            "UPDATE reviews 
                  SET name_of_reviewer = :name_of_reviewer, 
                      stars = :stars,
                      review = :review
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM reviews WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM reviews WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM reviews");
        $this->selectCount = $this->getPdo()->prepare("SELECT count(*) FROM reviews");
    }

    /**
     * @param Review $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":name_of_reviewer" => $model->getNameOfReviewer(),
            ":stars" => $model->getStars(),
            ":review" => $model->getReview()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":name_of_reviewer" => $model->getNameOfReviewer(),
            ":stars" => $model->getStars(),
            ":review" => $model->getReview()
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
        return new Review(
            array_key_exists("id", $data) ? $data["id"] : null,
            $data["name_of_reviewer"],
            $data["stars"],
            $data["review"],

        );
    }

    public function getInstance()
    {
        return $this;
    }
}