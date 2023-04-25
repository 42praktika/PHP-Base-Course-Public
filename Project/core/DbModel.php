<?php

namespace app\core;

abstract class DbModel extends Model
{
    public abstract function getTableName(): string;

    public abstract function getAttributes(): array;

    private array $fields;

    public function save()
    {
        $attributes = $this->getAttributes();
        $table = $this->getTableName();
        $params = array_map(fn($attribute) => ":$attribute", $attributes);
        $statement = $this->prepare("INSERT INTO $table("
            . implode(",", $attributes)
            . ") VALUES("
            . implode(",", $params)
            . ");");
        $statement->execute($this->fields);
    }

    public function assign(array $data) : DbModel {
        $attributes = $this->getAttributes();
        foreach ($data as $key=>$value) {
            if (!in_array($key, $attributes)) {continue;}
            $this->fields[":$key"] = $value;
        }
        return $this;
    }

    private function prepare(string $query): \PDOStatement
    {
        return Application::$database->pdo->prepare($query);
    }

}