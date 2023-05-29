<?php

namespace app\controllers;

use app\core\Application;

class AboutController
{

    public function getView()
    {
        session_start();
        Application::$app->getRouter()->renderTemplate("about");
    }
}
