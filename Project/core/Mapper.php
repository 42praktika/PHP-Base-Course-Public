<?php

namespace app\core;

use PDO;

abstract class Mapper
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = Application::$database->pdo;
    }

    public function Insert(Model $model): Model{
        return $this->doInsert($model);
    }
    public function Update(Model $model) : void{
        $this->doUpdate($model);
    }
    public function Delete(Model $model) : void{
        $this->doDelete($model);
    }

    public function Select(int $id) : Model{
        return $this->createObject($this->doSelect($id));
    }
    public function SelectAll() : Collection{
        return new Collection($this->doSelectAll(), $this->getInstance());
    }
    /**
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    /**
     * @param PDO $pdo
     */
    public function setPdo(PDO $pdo): void
    {
        $this->pdo = $pdo;
    }

    protected abstract function doInsert(Model $model) : Model;
    protected abstract function doUpdate(Model $model) : void;
    protected abstract function doDelete(Model $model) : void;
    protected abstract function doSelect(int $id) : array;
    protected abstract function doSelectAll() : array;

    public abstract function getInstance();
    public abstract function createObject(array $data):Model;
}