<?php

namespace app\models;

use app\core\Model;

class CashSaving extends Model
{
    private string $name;

    private int $author_id;

    private int $sum;

    /**
     * @param string $name
     * @param int $author_id
     * @param int $sum
     */
    public function __construct(?int $id, string $name, int $author_id, int $sum)
    {
        parent::__construct($id);
        $this->name = $name;
        $this->author_id = $author_id;
        $this->sum = $sum;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->author_id;
    }

    /**
     * @param int $author_id
     */
    public function setAuthorId(int $author_id): void
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
}