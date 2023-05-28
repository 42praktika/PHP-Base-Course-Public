<?php

namespace app\mappers;

use app\core\Application;
use app\core\Collection;
use app\core\Model;
use app\models\Tag;
use PDOStatement;

class TagMapper extends \app\core\Mapper
{

    private ?PDOStatement $insert;
    private ?PDOStatement $update;
    private ?PDOStatement $delete;
    private ?PDOStatement $select;
    private ?PDOStatement $selectAll;


    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare("INSERT into tags (title) VALUES (:title)");
        $this->update = $this->getPdo()->prepare("UPDATE tags SET title = :title WHERE id==:id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM tags WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM tags WHERE id=:id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM tags");
    }

    /**
     * @param Tag $model
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
     * @param Tag $model
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
        return $this->select->fetch(\PDO::FETCH_NAMED);
    }
    public function SelectByTitle(string $title){
        $prepare = $this->getPdo()->prepare("SELECT * FROM tags WHERE title=:title");
        $prepare->execute([":title"=>$title]);
        return $prepare->fetch(\PDO::FETCH_NAMED);
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

    function createObject(array $data): Model
    {
        return new Tag(array_key_exists("id", $data) ? $data["id"] : null,
            $data["title"]);
    }

}