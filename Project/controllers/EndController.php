<?php

namespace app\controllers;

use app\core\Application;

class EndController
{
    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("thanks");
    }
}