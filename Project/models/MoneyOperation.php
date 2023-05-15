<?php

namespace app\models;

use app\core\Model;

class MoneyOperation extends Model
{

    private string $author_id;

    private int $sum;

    private string $date;

    private int $category_id;

    private string $description;

    private bool $income;

    /**
     * @param string $author_id
     * @param int $sum
     * @param string $date
     * @param int $category_id
     * @param string $description
     * @param bool $income
     */
    public function __construct(?int $id, string $author_id, int $sum, string $date, int $category_id, string $description, bool $income)
    {
        parent::__construct($id);
        $this->author_id = $author_id;
        $this->sum = $sum;
        $this->date = $date;
        $this->category_id = $category_id;
        $this->description = $description;
        $this->income = $income;
    }


    /**
     * @return string
     */
    public function getAuthorId(): string
    {
        return $this->author_id;
    }

    /**
     * @param string $author_id
     */
    public function setAuthorId(string $author_id): void
    {
        $this->author_id = $author_id;
    }

    /**
     * @return int
     */
    public function getSum(): int
    {
        return $this->sum;
    }

    /**
     * @param int $sum
     */
    public function setSum(int $sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id): void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return bool
     */
    public function isIncome(): bool
    {
        return $this->income;
    }

    /**
     * @param bool $income
     */
    public function setIncome(bool $income): void
    {
        $this->income = $income;
    }

}