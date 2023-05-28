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
            if (array_key_exists("userId", $_SESSION)) {
                if (array_key_exists('id', $_GET)) {
                    $mapper = new CashSavingMapper();
                    $saving = $mapper->Select((int)$_GET['id']);
                    $path = "edit-saving?id=".$_GET['id'];
                    $delete = "delete-cash-saving?id=".$_GET['id'];
                    Application::$app->getRouter()->renderTemplate("saving",
                        ["cash_saving_action"=>$path,
                            "profile_action"=>"profile",
                            "saving"=>$saving,
                            "delete_action"=>$delete]);
                } else {
                    Application::$app->getRouter()->renderTemplate("saving",
                        ["cash_saving_action"=>"add-cash-saving",
                            "profile_action"=>"profile",
                            "saving"=>new CashSaving(null, "", 0, 0),
                            "delete_action"=>null]);
                }
            } else {
                Application::$app->getRouter()->renderTemplate("login",
                    ["login_action"=>"login", "main_action"=>"/"]);
            }
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
            if (ctype_digit($body["sum"])) {
                $saving = $mapper->createObject($body);
                $mapper->Insert($saving);
                Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
            } else {
                Application::$app->getRouter()->renderStatic("400.html");
            }
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }

    public function edit(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $body["author_id"] = $_SESSION['userId'];
            $body["id"] = $_GET["id"];
            $mapper = new CashSavingMapper();
            if (ctype_digit($body["sum"])) {
                $saving = $mapper->createObject($body);
                $mapper->Update($saving);
                Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
            } else {
                Application::$app->getRouter()->renderStatic("400.html");
            }
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }

    public function delete(): void
    {
        try {
            $author_id = $_SESSION['userId'];
            $mapper = new CashSavingMapper();
            $saving = $mapper->Select((int)$_GET['id']);
            $mapper->Delete($saving);
            Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
        }
        catch (\Exception $exception) {
            echo $exception;
//            Application::$app->getLogger()->error($exception);
        }
    }
}