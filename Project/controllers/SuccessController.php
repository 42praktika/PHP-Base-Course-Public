<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;

class SuccessController
{
    public function getView(): void
    {
        if (array_key_exists("userId", $_SESSION)) {
            Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
        } else {
            Application::$app->getRouter()->renderTemplate("login",
                ["login_action"=>"login", "main_action"=>"/"]);
        }
    }
}
