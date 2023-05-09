<?php

namespace app\controllers;

use app\core\application;
use app\mappers\UserMapper;

class AuthController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("authPage");
    }
    public function handleView()
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $count = $mapper->SelectCount();
            $user = $mapper->Select(5);
            if ($body['uname'] === $user->getEmail() && $body['psw'] === $user->getPsw()) {
                Application::$app->getRouter()->renderView("adminPage");
            } else {
                $flag = 0;
                for ($i = 1; $i <= $count[0]['count']; $i++) {
                    $user = $mapper->Select($i);
                    if ($body['uname'] === $user->getEmail() && $body['psw'] === $user->getPsw()) {
                        $flag = 1;
                    }
                }
                if ($flag === 1) {
                    Application::$app->getRouter()->renderView("catalog");
                } else {
                    Application::$app->getRouter()->renderView("don't_registered");
                }
            }
        }
        catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }
}
