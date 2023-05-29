<?php

namespace app\controllers;

use app\core\Application;

class ErrorController
{
    public static function showError($errorMessage, $action):void
    {
        $message = match ($errorMessage) {
            'InvalidUsername' => 'Неверное имя пользователя. Имя пользователя должно содержать от 3 до 10 символов',
            'EmailExists' => 'Пользователь с таким email уже существует',
            'InvalidEmail' => 'Неверный email',
            'PasswordMismatch' => 'Пароли не совпадают',
            'FieldsMissing' => 'Заполните все поля',
            'InvalidLoginCredentials'=>"Неверный email или пароль",
            'InvalidPassword' => 'Неверный пароль. Пароль должен содержать от 6 до 20 символов и включать как минимум одну заглавную букву, одну прописную букву и одну цифру.',
            'EmptyTitle'=> 'Название не может быть пустым',
            'FieldsMissingEditProfile' => 'Поля имя и email не могут быть пустыми',
            "InvalidOldPassword" => "Неверный старый пароль",
            default => 'Произошла ошибка.',
        };
        Application::$app->getRouter()->renderTemplate("errorPage", ["message"=>$message, "action"=>$action]);
    }
}