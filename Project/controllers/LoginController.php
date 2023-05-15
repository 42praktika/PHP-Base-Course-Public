<?php

namespace app\controllers;

use app\core\Application;

class LoginController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("login");
    }


}