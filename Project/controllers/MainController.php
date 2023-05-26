<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;

class MainController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderTemplate("main",
            ["registration_action"=>"registration",
            "info_action"=>"about",
            "login_action"=>"login"]);
    }
}
