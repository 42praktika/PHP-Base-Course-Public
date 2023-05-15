<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;
use app\models\User;

class RegistrationController
{

    public function getView(): void
    {
        Application::$app->getRouter()->renderView("registration");
    }

    public function register(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            $GLOBALS["user"] = $mapper->Insert($user);
            Application::$app->getRouter()->renderView("profile");
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}