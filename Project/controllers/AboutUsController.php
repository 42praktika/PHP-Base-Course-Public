<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\FileException;
use app\models\User;

class AboutUsController
{

    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("about_us");
    }


}