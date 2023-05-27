<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\CategoryMapper;
use app\mappers\MoneyOperationMapper;

class MoneyOperationController
{

    public function getIncomeView(): void
    {
        try {
            $mapper = new CategoryMapper();
            $categories = $mapper->doSelectDefaultAllByType(true);
            $defaultCategories = $mapper->doSelectAllByTypeAuthorId($_SESSION["userId"], true);
            foreach ($defaultCategories as $c) {
                array_push($categories, $c);
            }
            Application::$app->getRouter()->renderTemplate("income",
                ["income_action"=>"add-income",
                    "profile_action"=>"profile",
                    "categories"=>$categories]);
        } catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }

    public function getExpenseView(): void
    {
        try {
            $mapper = new CategoryMapper();
            $categories = $mapper->doSelectDefaultAllByType(false);
            $defaultCategories = $mapper->doSelectAllByTypeAuthorId($_SESSION["userId"], false);
            foreach ($defaultCategories as $c) {
                array_push($categories, $c);
            }
            Application::$app->getRouter()->renderTemplate("expense",
                ["expense_action"=>"add-expense",
                    "profile_action"=>"profile",
                    "categories"=>$categories]);
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
            $mapper = new MoneyOperationMapper();
            $saving = $mapper->createObject($body);
            $mapper->Insert($saving);
            Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}