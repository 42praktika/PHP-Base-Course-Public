<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\MoneyOperationMapper;

class ProfileController
{

    public function getView(): void
    {
//        TODO хардкод для демонстрации
        Application::$app->getRouter()->renderTemplate("profile",
            ["username"=>"TestName",
                "expenses"=>42,
                "income"=>43,
                "savings"=>44,
                "add_money_operation_action"=>"add-money-operation",
                "add_cash_savings_action"=>"add-cash-saving"]);
    }

    private function getSumExpensesByPeriod() : int
    {
        try {
            $mapper = new MoneyOperationMapper();
//            $sum = $mapper->getSumByPeriod(2, false, '2023-05-01', '2023-05-30');
            $sum = $mapper->getSumByPeriod($_SESSION["user"]->getId(), false, '2023-04-01', '2023-04-30');
            return $sum[0];
        } catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
        return 12;
    }
}