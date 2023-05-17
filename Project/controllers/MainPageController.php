<?php

namespace app\controllers;

use app\core\Application;

class MainPageController
{
    public function getWelcomePage()
    {
        Application::$app->getRouter()->renderView("welcomePage");
    }

    public function getMainPage()
    {
        Application::$app->getRouter()->renderView("mainPage");
    }
}