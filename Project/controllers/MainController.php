<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;

class MainController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("main");
    }

    public function handleView()
    {
        $body = Application::$app->getRequest()->getBody();
        var_dump($body);
    }
}