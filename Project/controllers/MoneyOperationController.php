<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\CategoryMapper;

class MoneyOperationController
{

    public function getView(): void
    {
        try {
            $mapper = new CategoryMapper();
            Application::$app->getRouter()->renderTemplate("money",
                ["money_action"=>"add-money-operation",
                    "profile_action"=>"profile",
                    "categories"=>$mapper->SelectAll()]);
        } catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}