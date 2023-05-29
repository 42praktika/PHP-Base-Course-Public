<?php

namespace app\controllers;

use app\core\Application;

class PromocodeController
{

    public function getView()
    {
        session_start();

        Application::$app->getRouter()->renderTemplate("promocode");
    }
}
