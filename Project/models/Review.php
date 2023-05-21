<?php

namespace app\models;

use app\core\Model;

class Review extends Model
{


    private int $user_id;

    private int $menu_id;

    private int $rating;

    private string $comment;



    public function __construct(
        ?int $id,
        string $first_name,
        string $second_name,
        int $age,
        string $job,
        string $email,
        string $phone,
    ) {
        parent::__construct($id);
        $this->first_name = $first_name;
        $this->second_name = $second_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->job = $job;
        $this->age = $age;
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
    public function getJob(): string
    {
        return $this->job;
    }

    /**
     * @param string $job
     */
    public function setJob(string $job): void
    {
        $this->job = $job;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}