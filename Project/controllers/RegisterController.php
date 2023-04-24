<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers;
use app\core\Router;
use app\mappers\UserMapper;
use app\models\User;

class RegisterController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("login");
    }

    public function handleView()
    {

        try{

            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            $mapper->Insert($user);
            $email = $body["email"];
            $password = $body["password"];

            if(is_null($password) || is_null($email)){
                header("Location: /error");
                return;
            }

            $this->login($email, $password);
        }
        catch (\Exception $exception){
            echo $exception;
        }

    }
    public function login(string $email, string $password)
    {
        if($email==null || $password == null){
            return;
        }

        header("Location: /user");
        exit();
    }
}