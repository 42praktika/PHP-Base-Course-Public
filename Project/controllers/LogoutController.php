<?php

namespace app\controllers;

use app\core\Application;

class LogoutController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("mainPage");
    }
}