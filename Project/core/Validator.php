<?php

namespace app\Project\core;

use app\mappers\UserMapper;

class Validator
{
    public static function validEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validPassword($password): bool
    {
        if (strlen($password) <= 5 || strlen($password) >= 30) {
            return false;
        }

        if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/\d/', $password)) {
            return false;
        }
        return true;
    }

    public static function validUsername($username): bool
    {
        return (strlen($username) >= 3 && strlen($username) <= 30);
    }

    public static function passwordsEquals($password, $repassword): bool
    {
        return $password == $repassword;
    }

    public static function userExists($username): bool
    {
        $userMapper = new UserMapper();
        return (count($userMapper->doSelectByUsername($username)) > 0);


    }
}
