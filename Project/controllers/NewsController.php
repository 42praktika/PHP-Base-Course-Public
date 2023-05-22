<?php

namespace app\controllers;

use app\core\Application;

class NewsController
{

    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("news");
    }
}