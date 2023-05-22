<?php

namespace app\controllers;

use app\core\Application;

class LogoutController
{

    public function getView()
    {
        session_start();
        session_unset();
        setcookie("SID", "", time() - 3600);
        Application::$app->getRouter()->renderTemplate("mainPage");
    }

}