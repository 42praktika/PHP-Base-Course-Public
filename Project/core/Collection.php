<?php

namespace app\core;

use function PHPUnit\Framework\returnArgument;

class Collection
{
    private array $rows;
    private int $count;
    private array $objects = [];
    private Mapper $mapper;

    /**
     * @param array $rows
     * @param Mapper $mapper
     */
    public function __construct(array $rows, Mapper $mapper)
    {
        $this->rows = $rows;
        $this->mapper = $mapper;

        $this->count = count($rows);
    }

    public function getNextRow(): \Generator
    {
        for($i = 0; $i < $this->count; $i++){
            yield $this->getRow($i);
        }
    }
    private function getRow(int $i){


        if($i >= $this->count){

            return null;
        }
        if(!array_key_exists($i, $this->objects)){
            $this->objects[$i] = $this->mapper->createObject($this->rows[$i]);
        }

        return $this->objects[$i];
    }
}