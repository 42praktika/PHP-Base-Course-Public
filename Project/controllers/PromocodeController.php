<?php

namespace app\controllers;

use app\core\Application;

class PromocodeController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("promocode");
    }
}