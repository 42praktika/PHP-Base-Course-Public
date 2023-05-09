<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\CarMapper;

class AddCarController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("addCar");
    }

    public function handleView()
    {
        $body = Application::$app->getRequest()->getBody();
        $mapper = new CarMapper();
        $car = $mapper->createObject($body);
        $mapper->Insert($car);
        Application::$app->getRouter()->renderView("addCar");
    }
}