<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\CarMapper;
use app\models\Car;

class DeleteCarController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("deleteCar");

    }

    public function handleView()
    {
        $body = Application::$app->getRequest()->getBody();
        $mapper = new CarMapper();
        $car = $mapper->Select((int)$body['id']);
        $mapper->Delete($car);
    }
}