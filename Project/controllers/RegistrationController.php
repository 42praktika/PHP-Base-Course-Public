<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class RegistrationController
{

    public function getView(): void
    {
        Application::$app->getRouter()->renderTemplate("registration",
            ["registration_action"=>"registration",
                "main_action"=>"/"]);
    }

    public function register(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            $_SESSION["userId"] = $mapper->Insert($user)->getId();
            Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}