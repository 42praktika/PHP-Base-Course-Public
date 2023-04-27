<?php

namespace app\models;

use app\core\DbModel;

class CashSaving extends DbModel
{

    public function getTableName(): string
    {
        return "cash_savings";
    }

    public function getAttributes(): array
    {
        return ["id", "name", "author_id", "sum"];
    }
}