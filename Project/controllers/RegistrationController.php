<?php

namespace app\controllers;

use app\core\application;
use app\mappers\UserMapper;
use function PHPUnit\Framework\containsEqual;

class RegistrationController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("registrationPage");
    }
    public function handleView()
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $count = $mapper->SelectCount();
            $flag = 1;
            for ($i = 1; $i <= $count[0]['count']; $i++) {
                $user = $mapper->Select($i);
                if (($body['series'] === $user->getSeries() && $body['number'] === $user->getNumber())
                    || $body['number_driver'] === $user->getNumberDriver()) {
                    $flag = 0;
                }
            }
            if ($flag === 1) {
                $user = $mapper->createObject($body);
                $mapper->Insert($user);
                Application::$app->getRouter()->renderView("catalog");
            } else {
                echo "Вы уже зарегистрированы!";
            }
        }
        catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);
        }
    }
}