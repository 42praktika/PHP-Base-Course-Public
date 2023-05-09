<?php

namespace app\models;

use app\core\Model;

class CarType extends Model
{
    private string $type_name;

    public function __construct(
        ?int $id,
        string $type_name
    ) {
        parent::__construct($id);
        $this->type_name = $type_name;
    }

    /**
     * @return string
     */
    public function getTypeName(): string
    {
        return $this->type_name;
    }

    /**
     * @param string $type_name
     */
    public function setTypeName(string $type_name): void
    {
        $this->type_name = $type_name;
    }

}
