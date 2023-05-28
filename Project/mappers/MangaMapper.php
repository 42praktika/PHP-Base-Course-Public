<?php

namespace app\mappers;

use app\core\Application;
use app\core\Collection;
use app\core\Model;
use app\models\Manga;
use PDOStatement;

class MangaMapper extends \app\core\Mapper
{

    private ?PDOStatement $insert;
    private ?PDOStatement $update;
    private ?PDOStatement $delete;
    private ?PDOStatement $select;
    private ?PDOStatement $selectAll;


    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare("INSERT into manga 
    (title, description, cover_image_path, author_name, genre, rating_id, age_rating, chapter_list_id, release_date) 
VALUES (:title, :description, :cover_image_path, :author_name,:genre, :rating_id, :age_rating, :chapter_list_id, :release_date)");
        $this->update = $this->getPdo()->prepare("UPDATE manga SET title = :title WHERE id==:id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM manga WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM manga WHERE id=:id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM manga");
    }

    /**
     * @param Manga $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {
        $this->insert->execute(params: [":title" => $model->getTitle()]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }
    /**
     * @param Manga $model
     */
    protected function doUpdate(Model $model): void
    {
        $this->insert->execute(params: [
            ":id" => $model->getId(),
            ":title" => $model->getTitle()]);
    }

    protected function doDelete(Model $model): void
    {
        $this->delete->execute(params: [
            ":id" => $model->getId()]);
    }

    protected function doSelect(int $id): array
    {
        $this->select->execute([":id"=>$id]);

        $query_result = $this->select->fetch(\PDO::FETCH_NAMED);
        return $query_result;
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    public function getInstance()
    {
        return $this;
    }

    static function FindMangaByID(int $id):?Manga
    {
        $query = Application::$database->pdo->prepare("SELECT * FROM manga WHERE id=:id");
        $query->execute([":id"=>$id]);
//        echo User::class;
        //$query->setFetchMode(\PDO::FETCH_CLASS, User::class);
//        $query_result = $query->fetch(\PDO::FETCH_NAMED|\PDO::FETCH_CLASS);
        $query_result = $query->fetch(\PDO::FETCH_NAMED);
        if(!$query_result)
        {
            return null;
        }

        $manga = new Manga($query_result["id"],
            $query_result["title"],
            $query_result["description"],
            $query_result["cover_image_path"],
            $query_result["author_name"],
            $query_result["genre"],
            $query_result["rating_id"],
            $query_result["age_rating"],
            $query_result["chapter_list_id"],
            $query_result["release_date"]);

        return $manga;
    }
    function createObject(array $data): Model
    {
        return new Manga(array_key_exists("id", $data) ? $data["id"] : null,
            $data["title"],
            $data["description"],
            $data["cover_image_path"],
            $data["author_name"],
            $data["genre"],
            $data["rating_id"],
            $data["age_rating"],
            $data["chapter_list_id"],
            $data["release_date"]
            );
    }

}