<?php

namespace app\models;

use app\core\Model;

class Menu extends Model
{


    private string $name;

    private string $description;

    private int $price;

    private string $category;

    /**
     * @param string $name
     * @param string $description
     * @param int $price
     * @param string $category
     */
    public function __construct(string $name, string $description, int $price, string $category)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->category = $category;
    }


}