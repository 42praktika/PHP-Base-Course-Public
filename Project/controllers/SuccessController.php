<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;

class SuccessController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
    }
}
