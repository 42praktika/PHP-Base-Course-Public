<?php

namespace app\core;

abstract class Model
{
    public function loadData(array $data){
        foreach ($data as $key=>$value){
            if(!property_exists($this, $key)) {
                continue;
            }
            $this->$key = $value;
        }
    }

    private ?int $id;

    public function __construct(?int $id)
    {
        if($id !== null){
            $this->setId($id);
        }
    }

    /**
     * @return ?int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param ?int $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

}