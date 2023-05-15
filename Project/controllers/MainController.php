<?php

namespace app\controllers;

use app\core\Application;

class MainController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("mainPage");
    }
}