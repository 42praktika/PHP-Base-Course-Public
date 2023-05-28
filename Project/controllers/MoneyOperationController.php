<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\exceptions\DbException;
use app\mappers\CategoryMapper;
use app\mappers\MoneyOperationMapper;
use function PHPUnit\Framework\throwException;

class MoneyOperationController
{

    public function getView(): void
    {
        try {
            if (array_key_exists("userId", $_SESSION)) {
                $id = $_GET['id'];
                $moneyOperationMapper = new MoneyOperationMapper();
                $operation = $moneyOperationMapper->Select((int)$id);
                if ($operation == null || $operation->getAuthorId() != $_SESSION['userId']) {
                    throw new DbException();
                } else {
                    $mapper = new CategoryMapper();
                    $defaultCategories = $mapper->doSelectDefaultAllByType($operation->isIncome());
                    $categories = $mapper->doSelectAllByTypeAuthorId($_SESSION["userId"], $operation->isIncome());
                    foreach ($defaultCategories as $c) {
                        array_push($categories, $c);
                    }
                    $template = $operation->isIncome() ? "income" : "expense";
                    Application::$app->getRouter()->renderTemplate($template,
                        ["income_action"=>"edit-money-operation?id=".$_GET['id'],
                            "expense_action"=>"edit-money-operation?id=".$_GET['id'],
                            "profile_action"=>"profile",
                            "categories"=>$categories,
                            "operation"=>$operation]);
                }
            } else {
                Application::$app->getRouter()->renderTemplate("login",
                    ["login_action"=>"login", "main_action"=>"/"]);
            }
        } catch (DbException $exception) {
            Application::$app->getRouter()->renderStatic("403.html");
        }
        catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }

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
                    "categories"=>$categories,
                    "operation"=>null]);
        } catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
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
                    "categories"=>$categories,
                    "operation"=>null]);
        } catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }

    public function add(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            if (array_key_exists("sum", $body) & strlen($body["date"]) != 0 & array_key_exists("category_id", $body) & ctype_digit($body["sum"])) {
                $body["author_id"] = $_SESSION['userId'];
                $income = $body["income"] === 'true';
                $mapper = new MoneyOperationMapper();
                $operation = $mapper->createObject($body);
                $operation->setIncome($income);
                $mapper->Insert($operation);
                Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
            } else {
                Application::$app->getRouter()->renderStatic("400.html");
            }
        }
        catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }

    public function delete(): void
    {
        try {
            $author_id = $_SESSION['userId'];
            $mapper = new MoneyOperationMapper();
            $operation = $mapper->Select((int)$_GET['id']);
            $mapper->Delete($operation);
            Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
        }
        catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }

    public function edit(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            if (array_key_exists("sum", $body) & strlen($body["date"]) != 0 & array_key_exists("category_id", $body) & ctype_digit($body["sum"])) {
                $body["author_id"] = $_SESSION['userId'];
                $body["id"] = $_GET["id"];
                $mapper = new MoneyOperationMapper();
                $oldOperation = $mapper->Select((int)$_GET["id"]);
                if ($oldOperation == null || $oldOperation->getAuthorId() != $_SESSION['userId']) {
                    throw new DbException();
                } else {
                    $operation = $mapper->createObject($body);
                    $mapper->Update($operation);
                    Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
                }
            } else {
                Application::$app->getRouter()->renderStatic("400.html");
            }
        }
        catch (DbException $exception) {
            Application::$app->getRouter()->renderStatic("403.html");
        }
        catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }
}