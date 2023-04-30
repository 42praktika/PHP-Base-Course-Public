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
        return ["first_name", "second_name", "third_name", "email","phone", "series", "number", "number_driver", "psw"];
    }
}