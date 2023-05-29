<?php

namespace app\core;

class Collection
{
    public array $rows;
    private int $count;
    private array $objects = [];
    private Mapper $mapper;

    public function __construct(array $rows, Mapper $mapper)
    {
        $this->rows = $rows;
        $this->count = count($rows);
        $this->mapper = $mapper;
    }

    public function getNextRow()
    {
        for ($i = 0; $i < $this->count; $i++) {
            yield $this->getRow($i);
        }
    }

    private function getRow(int $i)
    {
        if ($i >= $this->count) {
            return null;
        }
        if (!array_key_exists($i, $this->objects)) {
            $this->objects[$i] = $this->mapper->createObject($this->rows[$i]);
        }
        return $this->objects[$i];

    }
}
