<?php

namespace app\controllers;
use app\core\Application;
use app\mappers\UserMapper;

class LoginController
{
    public function getView()
    {
        session_start();

        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;

        if(!$authorised){

            Application::$app->getRouter()->renderTemplate("login");
            return;
        }
        header("Location: /profile");
    }
    public function handleView()
    {

        $body = Application::$app->getRequest()->getBody();

        $phone = $body["phone"];
        $password = $body["password"];

        $user = UserMapper::findUserByPhone($phone);
        if($user == null){
            echo "User with Email $phone is not found";
            return;
        }

        if(!password_verify($password, $user->getPassword())){
            echo "Incorrect password for user with Phone $phone";
            return;
        }

        session_start();

        $_SESSION["authorised"] = true;
        $_SESSION["userID"] = $user->getId();
        header("Location: /profile");
    }
}