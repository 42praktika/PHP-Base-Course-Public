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
//            TODO куда класть юзера, чтобы к нему был доступ на следующих страницах?
            $_SESSION["user"] = $mapper->Insert($user);

//            TODO вообще тут надо бы редирект на profile
            Application::$app->getRouter()->renderView("success");
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}