<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\models\MoneyOperation;

class HistoryController
{

    public function getView(): void
    {
        try {
            Application::$app->getRouter()->renderTemplate("history",
                ["history_action"=>"history",
                    "profile_action"=>"profile",
                    "operations"=>["one", "two"]]);
        } catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }

        // TODO как через шаблонизатор сделать forEach
    }
}