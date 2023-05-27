<?php

namespace app\models;

use app\core\Model;

class Category extends Model
{

    private string $name;

    private ?int $author_id;

    private bool $income;

    /**
     * @param int|null $id
     * @param string $name
     * @param int|null $author_id
     * @param bool $income
     */
    public function __construct(?int $id, string $name, ?int $author_id, bool $income)
    {
        parent::__construct($id);
        $this->name = $name;
        $this->author_id = $author_id;
        $this->income = $income;
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