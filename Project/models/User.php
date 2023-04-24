<?php

namespace app\models;

use app\core\DbModel;

class User extends \app\core\Model
{

    private string $nickname;

    /**
     * @param string $nickname
     * @param string $email
     * @param string $password
     */
    public function __construct(?int $id, string $nickname, string $email, string $password)
    {
        parent::__construct($id);
        $this->nickname = $nickname;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getNickname(): string
    {
        return $this->nickname;
    }

    /**
     * @param string $nickname
     */
    public function setNickname(string $nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    private string $email;
    private string $password;


    public function getAttributes(): array
    {
        return ["nickname", "email", "password"];
    }
}