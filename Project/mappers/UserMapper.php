<?php

namespace app\mappers;
use app\core\Model;
use app\models\User;
use PDOStatement;
use app\core\Application;
use app\core\Collection;

class UserMapper extends \app\core\Mapper
{

    private ?PDOStatement $insert;
    private ?PDOStatement $update;
    private ?PDOStatement $delete;
    private ?PDOStatement $select;
    private ?PDOStatement $selectAll;
    private ?PDOStatement $selectByEmailPassword;


    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare("INSERT into login_user (login, password, email ) VALUES (:login, :password, :email)");
        $this->update = $this->getPdo()->prepare("UPDATE login_user SET login = :login, password = :password, email = :email WHERE id==:id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM login_user WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM login_user WHERE id=:id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM login_user");
    }

    /**
     * @param User $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute(params: [":login" => $model->getLogin(),
            "password" => $model->getPassword(),
            "email" => $model->getEmail()]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }

    protected function doUpdate(Model $model): void
    {
        $this->insert->execute(params: [
            ":id" => $model->getId(),
            ":login" => $model->getLogin(),
            "password" => $model->getPassword(),
            "email" => $model->getEmail(),
            ]);
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
            $data["login"],
            $data["password"],
            $data["email"]);
    }

    static function findUserByLogin(string $login):?User
    {
        $query = Application::$database->pdo->prepare("SELECT * FROM login_user WHERE login=:login");
        $query->execute([":login"=>$login]);
        $query_result = $query->fetch(\PDO::FETCH_NAMED);
        if(!$query_result)
        {
            return null;
        }

        $user = new User($query_result["id"], $query_result["login"], $query_result["password"], $query_result["email"]);

        return $user;
    }

    static function findUserByID(int $id):?User
    {
        $query = Application::$database->pdo->prepare("SELECT * FROM login_user WHERE id=:id");
        $query->execute([":id"=>$id]);
//        echo User::class;
        //$query->setFetchMode(\PDO::FETCH_CLASS, User::class);
//        $query_result = $query->fetch(\PDO::FETCH_NAMED|\PDO::FETCH_CLASS);
        $query_result = $query->fetch(\PDO::FETCH_NAMED);
        if(!$query_result)
        {
            return null;
        }

        $user = new User($query_result["id"], $query_result["login"], $query_result["password"], $query_result["email"]);

        return $user;
    }
    public function doSelectByEmailPassword(string $email, string $password): Model
    {
        $this->selectByEmailPassword->execute([":email" => $email, ":password" => $password]);
        $data = $this->selectByEmailPassword->fetch(\PDO::FETCH_NAMED);
        return new User($data["id"], $data["email"], $data["password"], $data["name"]);
    }
}
