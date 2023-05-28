<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class LogoutController
{

    public function logout(): void
    {
        try {
            session_unset();
            Application::$app->getRouter()->renderTemplate("main",
                ["registration_action"=>"registration",
                "info_action"=>"about",
                "login_action"=>"login"]);
        }
        catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }
}