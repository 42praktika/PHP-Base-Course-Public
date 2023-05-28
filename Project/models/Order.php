<?php

namespace app\models;

use app\core\Model;

class Order extends Model
{
    private string $username;
    private string $phone;
    private string $address;

    /**
     * @param string $username
     * @param string $phone
     * @param string $address
     */
    public function __construct(?int $id, string $username, string $phone, string $address)
    {
        parent::__construct($id);
        $this->username = $username;
        $this->phone = $phone;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
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

    public function getAttributes(): array
    {
        return ["username", "phone", "address"];
    }
}