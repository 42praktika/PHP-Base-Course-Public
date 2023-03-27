<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;

class MangaProfileContoller
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("manga_profile");
    }

    public function handleView()
    {
//        $body = Application::$app->getRequest()->getBody();
//        var_dump($body);
          //Application::$app->getRouter()->renderView("about");
    }
}