<?php

namespace app\models;

class User extends \app\core\Model
{

    private string $login;
    private string $email;
    private string $password;

    /**
     * @param string $login
     * @param string $password
     * @param string $email
     */
    public function __construct(?int $id, string $login, string $password, string $email)
    {
        parent::__construct($id);
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin(string $login): void
    {
        $this->login = $login;
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
    public function getAttributes(): array
    {
        return ["login", "password", "email"];
    }
}