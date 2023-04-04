<?php

namespace app\controllers;

use app\core\application;
class RegistrationController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("registrationPage");
    }
}