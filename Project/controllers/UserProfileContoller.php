<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class UserProfileContoller
{

    public function getView()
    {

        Application::$app->getRouter()->renderView("user_profile");

    }

    public function handleView()
    {
//        $body = Application::$app->getRequest()->getBody();
//        var_dump($body);
          //Application::$app->getRouter()->renderView("about");
    }
}