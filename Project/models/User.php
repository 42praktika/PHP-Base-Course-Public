<?php

namespace app\models;

use app\core\DbModel;

class User extends DbModel
{

    public function getTableName(): string
    {
        return "users";
    }

    public function getAttributes(): array
    {
        return ["id","name", "email", "password"];
    }
}