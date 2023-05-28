<?php

use app\controllers\AboutController;
use app\controllers\CashSavingController;
use app\controllers\CategoryController;
use app\controllers\HistoryController;
use app\controllers\LoginController;
use app\controllers\LogoutController;
use app\controllers\MainController;
use app\controllers\MoneyOperationController;
use app\controllers\ProfileController;
use app\controllers\RegistrationController;
use app\controllers\SuccessController;
use app\core\Application;
use app\core\ConfigParser;

//Возвращает файлы напрямую
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

session_start();

const PROJECT_ROOT = __DIR__."\..\\";
require PROJECT_ROOT."/vendor/autoload.php";
require PROJECT_ROOT."/polyfill/http_send_status.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";
});

ConfigParser::load();

$env = getenv("APP_ENV");
if ($env == "dev") {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('log_errors', '1');
    ini_set('error_log', PROJECT_ROOT."/runtime/".getenv("PHP_LOG"));
}

$application = new Application();
$router = $application->getRouter();

$router->setGetRoute("/get500", "");

$router->setGetRoute("/", [new MainController, "getView"]);

$router->setGetRoute("/about", [new AboutController, "getView"]);

$router->setGetRoute("/registration", [new RegistrationController, "getView"]);
$router->setPostRoute("/registration", [new RegistrationController, "register"]);

$router->setGetRoute("/login", [new LoginController, "getView"]);
$router->setPostRoute("/login", [new LoginController, "logIn"]);

$router->setGetRoute("/profile", [new ProfileController(), "getView"]);

$router->setGetRoute("/add-income", [new MoneyOperationController, "getIncomeView"]);
$router->setPostRoute("/add-income", [new MoneyOperationController(), "add"]);

$router->setGetRoute("/add-expense", [new MoneyOperationController, "getExpenseView"]);
$router->setPostRoute("/add-expense", [new MoneyOperationController(), "add"]);

$router->setGetRoute("/add-cash-saving", [new CashSavingController, "getView"]);
$router->setPostRoute("/add-cash-saving", [new CashSavingController(), "add"]);

$router->setGetRoute("/history", [new HistoryController(), "getView"]);

$router->setGetRoute("/edit-saving", [new CashSavingController(), "getView"]);
$router->setPostRoute("/edit-saving", [new CashSavingController(), "edit"]);

$router->setGetRoute("/delete-cash-saving", [new CashSavingController(), "delete"]);

$router->setGetRoute("/history", [new HistoryController(), "getView"]);
$router->setPostRoute("/history", [new HistoryController(), "getViewForAnotherPeriod"]);

$router->setGetRoute("/edit-money-operation", [new MoneyOperationController(), "getView"]);
$router->setPostRoute("/edit-money-operation", [new MoneyOperationController(), "edit"]);

$router->setGetRoute("/delete-money-operation", [new MoneyOperationController(), "delete"]);

$router->setGetRoute("/success", [new SuccessController(), "getView"]);

$router->setGetRoute("/logout", [new LogoutController(), "logout"]);

$router->setGetRoute("/category", [new CategoryController(), "getView"]);
$router->setPostRoute("/add-category", [new CategoryController(), "add"]);
$router->setGetRoute("/delete-category", [new CategoryController(), "delete"]);

ob_start();
$application->run();
ob_flush();
