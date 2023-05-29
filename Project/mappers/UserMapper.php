<?php

namespace app\mappers;

use app\core\Application;
use app\core\Model;
use app\models\User;
use app\exceptions\DBException;
use InvalidArgumentException;
use RuntimeException;

class UserMapper extends \app\core\Mapper
{

    private ?\PDOStatement $insert;
    private ?\PDOStatement $update;
    private ?\PDOStatement $delete;
    private ?\PDOStatement $select;
    private ?\PDOStatement $selectAll;

    private ?\PDOStatement $selectByEmail;

    private ?\PDOStatement $selectUserByEmail;

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
        $this->selectUserByEmail= $this->getPdo()->prepare("select * from users where email=:email");
    }

    /**
     * @param User $model
     * @return Model
     * @throws DBException
     */
    protected function doInsert(Model $model): Model
    {
        try {
            $this->insert->execute([
                ":username" => $model->getUsername(),
                ":email" => $model->getEmail(),
                ":password" => $model->getPassword()
            ]);
            $id = $this->getPdo()->lastInsertId();
            $model->setId($id);
            return $model;
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while inserting user: ' . $e->getMessage());
            throw new DBException('Failed to insert user.', $e);
        }
    }

    /**
     * @param User $model
     * @throws DBException
     */

    protected function doUpdate(Model $model): void
    {
        try {
            $hashedPassword = password_hash($model->getPassword(), PASSWORD_DEFAULT);
            $this->update->execute([
                ":id" => $model->getId(),
                ":username" => $model->getUsername(),
                ":email" => $model->getEmail(),
                ":password" => $hashedPassword
            ]);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while updating user: ' . $e->getMessage());
            throw new DBException('Failed to update user.', $e);
        }
    }

    /**
     * @param User $model
     * @throws DBException
     */

    protected function doDelete(Model $model): void
    {
        try {
            $this->delete->execute([":id" => $model->getId()]);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while deleting user: ' . $e->getMessage());
            throw new DBException('Failed to delete user.', $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doSelect(int $id): array
    {
        try {
            $this->select->execute([":id" => $id]);
            return $this->select->fetch(\PDO::FETCH_NAMED);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting user: ' . $e->getMessage());
            throw new DBException('Failed to select user.',  $e);
        }
    }

    /**
     * @throws DBException
     */
    protected function doSelectAll(): array
    {
        try {
            $this->selectAll->execute();
            return $this->selectAll->fetchAll();
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting all users: ' . $e->getMessage());
            throw new DBException('Failed to select all users.',  $e);
        }
    }

    /**
     * @throws DBException
     */
    public function doSelectByEmail(string $email): bool
    {
        try {
            $this->selectByEmail->execute([":email" => $email]);
            $check = $this->selectByEmail->fetch(\PDO::FETCH_NAMED);
            return ($check !== null);
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting user by email: ' . $e->getMessage());
            throw new DBException('Failed to select user by email.',  $e);
        }
    }


    /**
     * @throws DBException
     */
    public function doSelectUserByEmail(string $email): ?User
    {
        try {
            $this->selectUserByEmail->execute([':email' => $email]);
            $result = $this->selectUserByEmail->fetch(\PDO::FETCH_ASSOC);
            if ($result) {
                return new User(
                    $result['id'],
                    $result['username'],
                    $result['email'],
                    $result['password']
                );
            } else {
                return null;
            }
        } catch (\PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while selecting user by email: ' . $e->getMessage());
            throw new DBException('Failed to select user by email.',  $e);
        }
    }


    function createObject(array $data): Model
    {
        try {
            if (!isset($data["username"]) || !isset($data["email"]) || !isset($data["password"])) {
                throw new InvalidArgumentException('Invalid user data. Missing required fields.');
            }

            $hashedPassword = password_hash($data["password"], PASSWORD_DEFAULT);
            return new User(
                array_key_exists("id", $data) ? $data["id"] : null,
                $data["username"],
                $data["email"],
                $hashedPassword
            );
        } catch (\Exception $e) {
            Application::$app->getLogger()->error('Error occurred while creating User object: ' . $e->getMessage());
            throw new RuntimeException('Failed to create User object.',  $e);
        }
    }

    public function getInstance()
    {
        return $this;
    }
}