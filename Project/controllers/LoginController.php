<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class LoginController
{

    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("login");
    }

    public function handleView()
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $username = $body['username'];
            $password = $body['password'];
            $user = $mapper->login($username,$password);
             if( count($user)<1){
                 Application::$app->getRouter()->renderTemplate("login");
                 echo '<p class="error">Uncorrect username or/and password, try again!</p>';
             } else {
                 Application::$app->getRouter()->renderTemplate("mainPage");
             }
        }
        catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

}