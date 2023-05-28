<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class ProfileController
{
    public function getView()
    {
        session_start();
        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;

        if(!$authorised){
            Application::$app->getRouter()->renderTemplate("signup");
            return;
        }

        $user = UserMapper::findUserByID($_SESSION["userID"]);

        Application::$app->getRouter()->renderTemplate("profile", ["username"=>$user->getUsername(), "phone" => $user->getPhone(), "email"=>$user->getEmail()] );
    }
}