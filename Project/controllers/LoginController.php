<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;
use app\core\Template;
use app\models\User;
use app\exceptions\FileException;

class LoginController
{
    public function getView() {
        session_start();
        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;


        if(!$authorised){
            Application::$app->getRouter()->renderTemplate("Presentation");
            return;
        }

        $mapper = new UserMapper();
        $user = $mapper->Select($_SESSION["userID"]);

        Application::$app->getRouter()->renderTemplate("login", ["login"=>$user->getLogin(), "email"=>$user->getEmail(),
            "password"=>$user->getPassword()] );
    }

    public function handleView()
    {
        session_start();

        $userID = $_SESSION["userID"];

        try{
            $body = Application::$app->getRequest()->getBody();
            $username = $body['login'];
            $email = $body['email'];
            $password = $body['password'];

            if(strlen($password) < 6 || strlen($password) > 35){
                echo "Password length must be in interval [10:35]";
                return;
            }


            if(is_null($password) || is_null($email) || is_null($username)){
                header("Location: /error");
                return;
            }

            $mapper = new UserMapper();
            $user = UserMapper::findUserByID($userID);
            $user->setLogin($username);
            $user->setPassword($password);
            $user->setEmail($email);

            $mapper->Update($user);
            //header("Location: /login");
        }
        catch (FileException $exception){
            echo $exception;
        }

    }
}

