<?php

namespace app\controllers;

use app\core\Application;

class MenuController
{

    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("menu");
    }
}