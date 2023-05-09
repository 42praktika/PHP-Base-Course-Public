<?php

namespace app\models;

use app\core\Model;

class User extends Model
{
    private string $first_name;
    private string $second_name;
    private string $third_name;

    private string $email;
    private string $phone;
    private string $series;
    private string $number;
    private string $number_driver;
    private string $psw;

    public function __construct(
        ?int $id,
        string $first_name,
        string $second_name,
        string $third_name,
        string $email,
        string $phone,
        string $series,
        string $number,
        string $number_driver,
        string $psw
    ) {
        parent::__construct($id);
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->third_name = $third_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->series = $series;
        $this->number = $number;
        $this->number_driver = $number_driver;
        $this->psw = $psw;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->first_name;
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    /**
     * @return string
     */
    public function getSecondName(): string
    {
        return $this->second_name;
    }

    /**
     * @param string $second_name
     */
    public function setSecondName(string $second_name): void
    {
        $this->second_name = $second_name;
    }

    /**
     * @return string
     */
    public function getThirdName(): string
    {
        return $this->third_name;
    }

    /**
     * @param string $third_name
     */
    public function setThirdName(string $third_name): void
    {
        $this->third_name = $third_name;
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
    public function getSeries(): string
    {
        return $this->series;
    }

    /**
     * @param string $series
     */
    public function setSeries(string $series): void
    {
        $this->series = $series;
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumberDriver(): string
    {
        return $this->number_driver;
    }

    /**
     * @param string $number_driver
     */
    public function setNumberDriver(string $number_driver): void
    {
        $this->number_driver = $number_driver;
    }

    /**
     * @return string
     */
    public function getPsw(): string
    {
        return $this->psw;
    }

    /**
     * @param string $psw
     */
    public function setPsw(string $psw): void
    {
        $this->psw = $psw;
    }

}