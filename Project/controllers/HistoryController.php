<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\CategoryMapper;
use app\mappers\MoneyOperationMapper;

class HistoryController
{

    public function getView(): void
    {
        try {
            if (array_key_exists("userId", $_SESSION)) {
                $mapper = new MoneyOperationMapper();
                $income = $_GET['income'] == 'true';
                $operations = $mapper->doSelectAllByPeriodAuthorId($_SESSION['userId'], $income, date('Y-m-01'), date('Y-m-d'));
                $categories = $this->getCategories($operations);
                Application::$app->getRouter()->renderTemplate("history",
                    ["history_action"=>"history?income=".$_GET['income'],
                        "profile_action"=>"profile",
                        "edit_action"=>"edit-money-operation",
                        "delete_action"=>"delete-money-operation",
                        "operations"=>$operations,
                        "categories"=>$categories]);
            } else {
                Application::$app->getRouter()->renderTemplate("login",
                    ["login_action"=>"login", "main_action"=>"/"]);
            }
        } catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }

    public function getViewForAnotherPeriod(): void
    {
        try {
            $mapper = new MoneyOperationMapper();
            $income = $_GET['income'] == 'true';
            $start = $_POST['start'];
            $end = $_POST['end'];
            $operations = $mapper->doSelectAllByPeriodAuthorId($_SESSION['userId'], $income, $start, $end);
            $categories = $this->getCategories($operations);
            Application::$app->getRouter()->renderTemplate("history",
                ["history_action"=>"history?income=".$_GET['income'],
                    "profile_action"=>"profile",
                    "edit_action"=>"edit-money-operation",
                    "delete_action"=>"delete-money-operation",
                    "operations"=>$operations,
                    "categories"=>$categories]);
        } catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }

    private function getCategories(array $operations): array
    {
        $categories = [];
        $categoryMapper = new CategoryMapper();
        foreach ($operations as $operation) {
            $categoryId = $operation->getCategoryId();
            $categories[$categoryId] = $categoryMapper->Select((int)$categoryId)->getName();
        }
        return $categories;
    }
}