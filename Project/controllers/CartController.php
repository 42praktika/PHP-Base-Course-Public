<?php

namespace app\controllers;

use app\core\Application;

class CartController
{

    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("cart");
    }
}