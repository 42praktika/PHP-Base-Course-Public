<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Router;
use app\mappers\UserMapper;
use app\models\User;
class LoginController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("login");
    }

    public function handleView()
    {
        $body = Application::$app->getRequest()->getBody();

        $email = $body["email"];
        $password = $body["password"];

        $user = UserMapper::findUserByEmail($email);
        if($user == null){
            echo "User with Email $email is not found";
            return;
        }

        if($user->getPassword() != $password){
            echo "Incorrect password for user with Email $email";
            return;
        }

        var_dump($user);
//
//        $this->login($email, $password);
    }
    public function login(string $email, string $password)
    {
        if($email==null || $password == null){
            return;
        }

        header("Location: /profile");
        exit();
    }
}