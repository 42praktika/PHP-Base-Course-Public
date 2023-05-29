<?php

namespace app\utils;

use app\exceptions\DBException;
use app\mappers\UserMapper;

class UserValidator
{
    public static function isValidEmail($email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isValidPassword($password): bool
    {
        // Проверка длины пароля
        if (strlen($password) < 6 || strlen($password) > 20) {
            return false;
        }

        // Проверка наличия заглавных букв, прописных букв и цифр в пароле
        if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/\d/', $password)) {
            return false;
        }

        return true;
    }

    public static function isValidUsername($username): bool
    {
        return (strlen($username) > 3 && strlen($username) < 20);
    }

    public static function isPasswordsEquals($password, $confirmPassword): bool
    {
        return $password == $confirmPassword;
    }

    /**
     * @throws DBException
     */
    public static function userExistsWithEmail($email): bool
    {
        $userMapper = new UserMapper();
        return $userMapper->doSelectByEmail($email);
        // true, если пользователь с таким email уже существует

    }
}