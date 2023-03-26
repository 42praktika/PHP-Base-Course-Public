<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;

class RegistrationController
{

    public function getView(): void
    {
        Application::$app->getRouter()->renderView("registration");
    }

    public function register(): void
    {
        $body = Application::$app->getRequest()->getBody();
        echo "Здравствуйте, ".$body["name"]."!";
    }
}