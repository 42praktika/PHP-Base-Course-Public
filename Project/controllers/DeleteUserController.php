<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class DeleteUserController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("deleteUser");

    }

    public function handleView()
    {
        $body = Application::$app->getRequest()->getBody();
        $mapper = new UserMapper();
        $user = $mapper->Select((int)$body['id']);
        $mapper->Delete($user);
    }
}