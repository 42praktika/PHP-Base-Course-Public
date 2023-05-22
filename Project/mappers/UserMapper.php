<?php

namespace app\mappers;

use app\core\Collection;
use app\core\Model;
use app\models\User;

class UserMapper extends \app\core\Mapper
{

    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $selectByEmail;

    private ?\PDOStatement $selectByEmailAndPassword;

    public function __construct()
    {
        parent::__construct();
        $this->insert = $this->getPdo()->prepare(
            "INSERT into users  ( username, email, password )
                    VALUES ( :username, :email, :password )"
        );
        $this->update = $this->getPdo()->prepare(
            "UPDATE users 
                  SET username = :username, 
                      email = :email, 
                      password = :password
                      WHERE id = :id");
        $this->delete = $this->getPdo()->prepare("DELETE FROM users WHERE id=:id");
        $this->select = $this->getPdo()->prepare("SELECT * FROM users WHERE id = :id");
        $this->selectAll = $this->getPdo()->prepare("SELECT * FROM users");
        $this->selectByEmail = $this->getPdo()->prepare("select * from users where email = :email");
        $this->selectByEmailAndPassword = $this->getPdo()->prepare("select * from users where email=:email and password=:password");
    }

    /**
     * @param User $model
     * @return Model
     */
    protected function doInsert(Model $model): Model
    {

        $this->insert->execute([
            ":username" => $model->getUsername(),
            ":email" => $model->getEmail(),
            ":password" => $model->getPassword()
        ]);
        $id = $this->getPdo()->lastInsertId();
        $model->setId($id);
        return $model;
    }
    /**
     * @param User $model
     */

    protected function doUpdate(Model $model): void
    {
        $this->update->execute([
            ":id" => $model->getId(),
            ":username" => $model->getUsername(),
            ":email" => $model->getEmail(),
            ":password" => $model->getPassword()
        ]);
    }

    /**
     * @param User $model
     */

    protected function doDelete(Model $model): void
    {
        $this->delete->execute([":id" => $model->getId()]);
    }
    public function doSelect(int $id): array
    {
      $this->select->execute([":id" => $id]);
      return $this->select->fetch(\PDO::FETCH_NAMED);
    }

    protected function doSelectAll(): array
    {
        $this->selectAll->execute();
        return $this->selectAll->fetchAll();
    }

    public function doSelectByEmail(string $email): bool
    {
        $this->selectByEmail->execute([":email" => $email]);
        $check =  $this->selectByEmail->fetch(\PDO::FETCH_NAMED);
        return ($check !== null);
    }


    public function doSelectByEmailAndPassword(string $email, string $password): ?User
{
    $this->selectByEmailAndPassword->execute([':email' => $email, ':password' => $password]);
    $result = $this->selectByEmailAndPassword->fetch(\PDO::FETCH_ASSOC);
//    var_dump(password_verify($password, $result['password']));
    if ($result && password_verify($password, $result['password'])) {
        return new User(
            $result['username'],
            $result['email'],
            $result['password']
        );
    }
    return null;
}


    function createObject(array $data): Model
    {
        $hashedPassword = password_hash($data["password"], PASSWORD_DEFAULT);
        return new User(
//            array_key_exists("id", $data) ? $data["id"] : null,
            $data["username"],
            $data["email"],
            $hashedPassword);
    }

    public function getInstance()
    {
        return $this;
    }
}