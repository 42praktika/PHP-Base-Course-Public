<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Router;
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

        $user = new User();
        $user->assign($body);
        $user->save();
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