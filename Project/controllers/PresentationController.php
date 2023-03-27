<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;

class PresentationController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("presentation");
    }

    public function getViewMainPage()
    {
        Application::$app->getRouter()->renderView("mainPage");
    }

    public function handleView()
    {
        $body = Application::$app->getRequest()->getBody();
        var_dump($body);
    }
}