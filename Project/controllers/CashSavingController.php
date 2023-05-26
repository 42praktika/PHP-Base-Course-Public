<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\MoneyOperationMapper;

class CashSavingController
{

    public function getView(): void
    {
        try {
            Application::$app->getRouter()->renderTemplate("saving",
                ["cash_saving_action"=>"add-cash-saving", "profile_action"=>"profile"]);
        } catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}