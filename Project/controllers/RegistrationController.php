<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class RegistrationController
{

    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("registration");
    }
    public function handleView()
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            $mapper->Insert($user);
            Application::$app->getRouter()->renderTemplate("mainPage");
        }
        catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }
}