<?php

namespace app\mappers;

use app\core\Application;
use app\core\Collection;
use app\core\Model;
use app\models\User;
use PDOStatement;

class UserMapper extends \app\core\Mapper
{

    private ?PDOStatement $insert;
    private ?PDOStatement $update;
    private ?PDOStatement $delete;
    private ?PDOStatement $select;
    private ?PDOStatement $selectAll;


    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare("INSERT into users (nickname, email, password) VALUES (:nickname, :email, :password)");
        $this->update = $this->getPdo()->prepare("UPDATE users SET nickname = :nickname, email = :email, password = :password WHERE id==:id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM users WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM users WHERE id=:id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM users");
    }

    /**
     * @param User $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute(params: [":nickname" => $model->getNickname(),
            "email" => $model->getEmail(),
            "password" => password_hash($model->getPassword(), PASSWORD_BCRYPT)]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->insert->execute(params: [
            ":id" => $model->getId(),
            ":nickname" => $model->getNickname(),
            "email" => $model->getEmail(),
            "password" => password_hash($model->getPassword(), PASSWORD_BCRYPT)]);
    }

    protected function doDelete(Model $model): void
    {
        $this->insert->execute(params: [
            ":id" => $model->getId()]);
    }

    protected function doSelect(int $id): array
    {
        $this->select->execute([":id"=>$id]);
        return $this->select->fetch(\PDO::FETCH_NAMED);
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
        return new User(array_key_exists("id", $data) ? $data["id"] : null,
            $data["nickname"],
            $data["email"],
            $data["password"]);
    }
    static function findUserByEmail(string $email):?User
    {
        $query = Application::$database->pdo->prepare("SELECT * FROM users WHERE email=:email");
        $query->execute([":email"=>$email]);
//        echo User::class;
        //$query->setFetchMode(\PDO::FETCH_CLASS, User::class);
//        $query_result = $query->fetch(\PDO::FETCH_NAMED|\PDO::FETCH_CLASS);
        $query_result = $query->fetch(\PDO::FETCH_NAMED);
        if(!$query_result)
        {
            return null;
        }

        $user = new User($query_result["id"], $query_result["nickname"], $query_result["email"], $query_result["password"]);

        return $user;
    }
    static function findUserByID(int $id):?User
    {
        $query = Application::$database->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $query->execute([":id"=>$id]);
//        echo User::class;
        //$query->setFetchMode(\PDO::FETCH_CLASS, User::class);
//        $query_result = $query->fetch(\PDO::FETCH_NAMED|\PDO::FETCH_CLASS);
        $query_result = $query->fetch(\PDO::FETCH_NAMED);
        if(!$query_result)
        {
            return null;
        }

        $user = new User($query_result["id"], $query_result["nickname"], $query_result["email"], $query_result["password"]);

        return $user;
    }
}