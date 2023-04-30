<?php

namespace app\controllers;

use app\core\application;
use app\models\User;

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

            (new User())->assign($body)->save();

            Application::$app->getRouter()->renderView("catalog"); }
        catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);
        }
    }
}