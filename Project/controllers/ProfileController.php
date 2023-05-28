<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\CashSavingMapper;
use app\mappers\MoneyOperationMapper;
use app\mappers\UserMapper;

class ProfileController
{

    public function getView(): void
    {
        $userMapper = new UserMapper();
        $username = $userMapper->Select($_SESSION["userId"])->getName();
        Application::$app->getRouter()->renderTemplate("profile",
            ["username"=>$username,
                "expenses"=>$this->getExpenseSumByPeriod(),
                "income"=>$this->getIncomeSumByPeriod(),
                "savings"=>$this->getCashSavings(),
                "add_income_action"=>"add-income",
                "add_expense_action"=>"add-expense",
                "add_cash_savings_action"=>"add-cash-saving",
                "edit_saving_action"=>"edit-saving",
                "history_income_action"=>"history?income=true",
                "history_expense_action"=>"history?income=false"]);
    }

    private function getCashSavings() : array
    {
        try {
            $mapper = new CashSavingMapper();
            return $mapper->doSelectAllByAuthorId($_SESSION["userId"]);
        } catch (\Exception $exception) {
            echo $exception;
            return [];
//            Application::$app->getLogger()->error($exception);
        }
    }

    private function getExpenseSumByPeriod() : string
    {
        try {
            $mapper = new MoneyOperationMapper();
            $sum = $mapper->getSumByPeriod($_SESSION["userId"], false, date('Y-m-01'), date('Y-m-d'));
            return $sum["sum"];
        } catch (\Exception $exception) {
            echo $exception;
            return "";
//            Application::$app->getLogger()->error($exception);
        }
    }

    private function getIncomeSumByPeriod() : string
    {
        try {
            $mapper = new MoneyOperationMapper();
            $sum = $mapper->getSumByPeriod($_SESSION["userId"], true, date('Y-m-01'), date('Y-m-d'));
            return $sum["sum"];
        } catch (\Exception $exception) {
            echo $exception;
            return "";
//            Application::$app->getLogger()->error($exception);
        }
    }
}