<?php

namespace app\models;

use app\core\Model;

class User extends Model
{
    private string $username;
    private string $phone;

    /**
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $phone
     */
    public function __construct(?int $id, string $username, string $password, string $email, string $phone)
    {
        parent::__construct($id);
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $nickname
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
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

    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
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
        return ["nickname", "password", "email", "phone"];
    }

}