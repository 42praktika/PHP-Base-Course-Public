<?php

namespace app\models;

use app\core\Model;

class Order extends Model
{

    private int $amount;
    private string $number;

    private int $price;
    private int $productid;

    private string $userid;

    /**
     * @param int|null $id
     * @param int $amount
     * @param string $number
     * @param int $price
     * @param int $productid
     * @param string $userid
     */
    public function __construct(
        ?int   $id,
        int    $amount,
        string $number,
        int    $price,
        int    $productid,
        string $userid

    )
    {
        parent::__construct($id);
        $this->amount = $amount;
        $this->number = $number;
        $this->price = $price;
        $this->productid = $productid;
        $this->userid = $userid;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int|null $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
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
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getProductid(): int
    {
        return $this->productid;
    }

    /**
     * @param int $productid
     */
    public function setProductid(int $productid): void
    {
        $this->productid = $productid;
    }

    /**
     * @return int
     */
    public function getUserid(): string
    {
        return $this->userid;
    }

    /**
     * @param string $userid
     */
    public function setUserid(string $userid): void
    {
        $this->userid = $userid;
    }


}
