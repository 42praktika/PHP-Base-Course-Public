<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\RentalMapper;

class RentFormController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("rentForm");
    }

    public function handleView()
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new RentalMapper();
            $rental = $mapper->createObject($body);
            $mapper->Insert($rental);
        }
        catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);
        }
    }
}