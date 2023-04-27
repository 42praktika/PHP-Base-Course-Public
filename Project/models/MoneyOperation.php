<?php

namespace app\models;

use app\core\DbModel;

class MoneyOperation extends DbModel
{

    public function getTableName(): string
    {
        return "money_operations";
    }

    public function getAttributes(): array
    {
        return ["id", "author_id", "sum", "date", "category_id", "description", "income"];
    }
}