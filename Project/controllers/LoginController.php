<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class LoginController
{

    public function getView(): void
    {
        Application::$app->getRouter()->renderView("login");
    }

    public function logIn(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            // TODO это норм так делать?
            $_SESSION['user'] = $mapper->doSelectByEmailPassword($user->getEmail(), $user->getPassword());;
            Application::$app->getRouter()->renderView("profile");
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}