<?php

namespace app\controllers;

use app\core\Application;

class NewsController
{

    public function getView()
    {
        session_start();

        Application::$app->getRouter()->renderTemplate("news");
    }
}
