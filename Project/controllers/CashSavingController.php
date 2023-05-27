<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\CashSavingMapper;
use app\mappers\MoneyOperationMapper;
use app\models\CashSaving;

class CashSavingController
{

    public function getView(): void
    {
        try {
            Application::$app->getRouter()->renderTemplate("saving",
                ["cash_saving_action"=>"add-cash-saving",
                    "profile_action"=>"profile"]);
        } catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }

    public function add(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $body["author_id"] = $_SESSION['userId'];
            $mapper = new CashSavingMapper();
            $saving = $mapper->createObject($body);
            $mapper->Insert($saving);
            Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }

    public function edit(): void
    {
        try {
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}