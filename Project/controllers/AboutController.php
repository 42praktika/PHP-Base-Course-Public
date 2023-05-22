<?php

namespace app\controllers;

use app\core\Application;

class AboutController
{

    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("about");
    }
}