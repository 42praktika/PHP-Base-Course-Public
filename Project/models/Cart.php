<?php

namespace app\models;

use app\core\Model;

class Cart extends Model
{
    private string $username;
    private int $productId;
    private int $amount;

    /**
     * @param int|null $id
     * @param string $username
     * @param int $productId
     * @param int $amount
     */


    public function __construct(
        ?int   $id,
        string $username,
        int    $productId,
        int    $amount

    )
    {
        parent::__construct($id);
        $this->username = $username;
        $this->productId = $productId;
        $this->amount = $amount;
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
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }

    /**
     * @param int $productId
     */
    public function setProductId(int $productId): void
    {
        $this->productId = $productId;
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

}
