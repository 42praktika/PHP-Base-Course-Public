<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\models\User;

class RegistrationController
{

    public function getView(): void
    {
        Application::$app->getRouter()->renderView("registration");
    }

    public function register(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            (new User())->assign($body)->save();
            Application::$app->getRouter()->renderView("success"); }
        catch (\Exception $exception) {
//            Application::$app->getLogger()->error($exception);
            echo $exception;
        }
    }
}