<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\ProductMapper;
use app\mappers\UserMapper;

class RegisterController
{
    public function getRegisterPage()
    {
        Application::$app->getRouter()->renderView("registerPage");
    }

    public function registerUser()
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            var_dump($body);
            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            $mapper->Insert($user);
            $productMapper = new ProductMapper();
            $products = $productMapper->selectAll();
            //TODO: передать продукты
            Application::$app->getRouter()->renderView("mainPage");
        }
        catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }
}