<?php

namespace app\models;

use app\core\Model;

class Category extends Model
{
 private string $name;

    /**
     * @param int|null $id
     * @param string $name
     */


    public function __construct(
        ?int $id,
        string $name

    ) {
        parent::__construct($id);
        $this->name = $name;
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


}