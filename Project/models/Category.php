<?php

namespace app\models;

use app\core\DbModel;

class Category extends DbModel
{

    public function getTableName(): string
    {
        return "categories";
    }

    public function getAttributes(): array
    {
        return ["id", "name", "author_id", "income"];
    }
}