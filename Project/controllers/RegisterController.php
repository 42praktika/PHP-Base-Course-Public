<?php

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\FileException;
use app\mappers\UserMapper;
use app\models\User;
class RegisterController
{
    public function getView()
    {
        Application::$app->getRouter()->renderView("registration");
    }
    public function handleView()
    {
        try{
            $body = Application::$app->getRequest()->getBody();

            $login = $body['login'];
            $email = $body['email'];
            $password = $body['password'];
            $password_confirm = $body['password_confirm'];

            if($login == null || $email == null || $login == null){
                echo "null";
                return;
            }

            if($password != $password_confirm){
                echo "Пароли не совпадают";
                return;
            }

            if(strlen($password) < 6 || strlen($password) > 35){
                echo "Пароль должен быть больше 6 символов";
                return;
            }

            $userExist = UserMapper::findUserByLogin($body["login"]) != null;
            if($userExist){
                echo "Пользователь $login уже зарегистрирован";
                return;
            }


            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            $mapper->Insert($user);
            session_start();

            $_SESSION["authorised"] = true;
            $_SESSION["userID"] = $user->getId();
            header("Location: /login");
        }
        catch (FileException $exception){
            echo $exception;
        }

    }

}