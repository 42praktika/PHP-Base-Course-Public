<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class LoginController
{

    public function getView()
    {

        session_start();
        Application::$app->getRouter()->renderTemplate("login", ["postAction" => "dologin"]);
    }

    public function handleView()
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $username = $body['username'];
            $password = $body['password'];

            $user = $mapper->doLogin($username, $password);
            $us = $mapper->doSelectByUsername($username);
            if (count($user) < 1) {
                echo '<p class="error">Uncorrect username or/and password, try again!</p>';
            } else {
                session_start();
                setcookie("SID", session_id(), time()+20*24*60*60);
                $_SESSION["username"] = $username;
                $_SESSION["isAdmin"] = $us[0]["isadmin"];
                (new MainController)->getView();

            }
        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

}
