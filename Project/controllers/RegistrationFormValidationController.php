<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Router;
use app\models\User;

class RegistrationFormValidationController
{

    public function getView()
    {
//        Application::$app->getRouter()->renderView("login");
    }

    public function handleView()
    {
        $body = Application::$app->getRequest()->getBody();

        $email = $body["email"];
        $password = $body["password"];

        if(is_null($password) || is_null($email)){
            return false;
        }
        return true;
    }
}