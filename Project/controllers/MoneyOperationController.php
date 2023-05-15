<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\MoneyOperationMapper;

class MoneyOperationController
{

    public function getViewExpenses(): void
    {
        try {
            $mapper = new MoneyOperationMapper();
            $sum = $mapper->getSumByPeriod(2, false, '2023-05-01', '2023-05-30');
//            $sum = $mapper->getSumByPeriod($_SESSION["user"]->getId(), false, '2023-04-01', '2023-04-30');
            $GLOBALS['sum'] = $sum;
            Application::$app->getRouter()->renderView("money");
        } catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }

    public function getViewIncome(): void
    {
        try {
            $mapper = new MoneyOperationMapper();
            $sum = $mapper->getSumByPeriod($_SESSION["user"]->getId(), true, '2023-04-01', '2023-04-30');
            $GLOBALS['sum'] = $sum;
            Application::$app->getRouter()->renderView("money");
        } catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}