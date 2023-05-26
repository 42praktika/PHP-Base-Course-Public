<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class LoginController
{

    public function getView(): void
    {
        Application::$app->getRouter()->renderTemplate("login",
            ["login_action"=>"login", "main_action"=>"/"]);
    }

    public function logIn(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            $_SESSION['user'] = $mapper->doSelectByEmailPassword($user->getEmail(), $user->getPassword());;
            // TODO как сделать редирект
            Application::$app->getRouter()->renderView("profile");
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}