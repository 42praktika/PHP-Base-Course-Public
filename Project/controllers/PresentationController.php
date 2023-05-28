<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\FileException;
use app\mappers\UserMapper;

class PresentationController
{
    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("presentation");
    }

    public function handleView()
    {

        $body = Application::$app->getRequest()->getBody();

        $login = $body["login"];
        $password = $body["password"];


        $user = UserMapper::findUserByLogin($login);
        if($user == null){
            echo "User with $login is not found";
            return;
        }

        session_start();

        $_SESSION["authorised"] = true;
        $_SESSION["userID"] = $user->getId();

        //echo $_SESSION["userID"];
        header("Location: /login");
    }
}