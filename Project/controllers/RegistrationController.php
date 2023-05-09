<?php

namespace app\controllers;

use app\core\application;
use app\mappers\UserMapper;
use function PHPUnit\Framework\containsEqual;

class RegistrationController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("registrationPage");
    }
    public function handleView()
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            $mapper->Insert($user);
            Application::$app->getRouter()->renderView("catalog");
        }
        catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);
        }
    }
}