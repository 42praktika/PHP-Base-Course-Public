<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;

class LoginController
{

    public function getView(): void
    {
        Application::$app->getRouter()->renderView("login");
    }

    public function logIn(): void
    {
        $body = Application::$app->getRequest()->getBody();
        echo $body["name"].", вы вошли!";
    }
}