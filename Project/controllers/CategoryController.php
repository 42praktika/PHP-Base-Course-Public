<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\exceptions\DbException;
use app\mappers\CashSavingMapper;
use app\mappers\CategoryMapper;
use app\mappers\MoneyOperationMapper;
use app\models\CashSaving;

class CategoryController
{

    public function getView(): void
    {
        try {
            if (array_key_exists("userId", $_SESSION)) {
                $mapper = new CategoryMapper();
                $defaultIncomeCategories = $mapper->doSelectDefaultAllByType(true);
                $incomeCategories = $mapper->doSelectAllByTypeAuthorId($_SESSION["userId"], true);
                $defaultExpenseCategories = $mapper->doSelectDefaultAllByType(false);
                $expenseCategories = $mapper->doSelectAllByTypeAuthorId($_SESSION["userId"], false);
                Application::$app->getRouter()->renderTemplate("category",
                    ["category_action"=>"add-category",
                        "delete_action"=>"delete-category",
                        "profile_action"=>"profile",
                        "incomeCategories"=>$incomeCategories,
                        "defaultIncomeCategories"=>$defaultIncomeCategories,
                        "expenseCategories"=>$expenseCategories,
                        "defaultExpenseCategories"=>$defaultExpenseCategories]);
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

    public function add(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $body["author_id"] = $_SESSION['userId'];
            $mapper = new CategoryMapper();
            $category = $mapper->createObject($body);
            $mapper->Insert($category);
            Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
        }
        catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }

    public function delete(): void
    {
        try {
            $author_id = $_SESSION['userId'];
            $mapper = new CategoryMapper();
            $category = $mapper->Select((int)$_GET['id']);
            if ($author_id == $category->getAuthorId()) {
                $mapper->Delete($category);
                Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
            } else {
                throw new DbException();
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