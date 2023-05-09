<?php

namespace app\models;

use app\core\Model;

class Car extends Model
{
    private string $state_number;
    private string $mark;
    private string $model;
    private int $typeId;
    private int $cost;

    public function __construct(
        ?int $id,
        string $state_number,
        string $mark,
        string $model,
        int $typeId,
        int $cost
    ) {
        parent::__construct($id);
        $this->state_number = $state_number;
        $this->mark = $mark;
        $this->model = $model;
        $this->typeId = $typeId;
        $this->cost = $cost;
    }

    /**
     * @return string
     */
    public function getStateNumber(): string
    {
        return $this->state_number;
    }

    /**
     * @param string $state_number
     */
    public function setStateNumber(string $state_number): void
    {
        $this->state_number = $state_number;
    }

    /**
     * @return string
     */
    public function getMark(): string
    {
        return $this->mark;
    }

    /**
     * @param string $mark
     */
    public function setMark(string $mark): void
    {
        $this->mark = $mark;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     */
    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
    }

    /**
     * @return int
     */
    public function getCost(): int
    {
        return $this->cost;
    }

    /**
     * @param int $cost
     */
    public function setCost(int $cost): void
    {
        $this->cost = $cost;
    }
}
