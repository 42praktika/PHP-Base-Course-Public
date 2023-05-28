<?php

use app\controllers\MainController;
use app\core\Application;
use app\core\ConfigParser;

//Возвращает файлы напрямую
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

const PROJECT_ROOT = __DIR__."/../";
require "../vendor/autoload.php";
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
$router->setGetRoute("/about", [new \app\controllers\AboutUsController(), "getView"]);
$router->setGetRoute("/registration", [new \app\controllers\SignupController(), "getView"]);
$router->setGetRoute("/login", [new \app\controllers\LoginController(), "getView"]);
$router->setGetRoute("/logout", [new \app\controllers\LogoutController(), "getView"]);
//$router->setGetRoute("/edit", [new \app\controllers\EditDataController(), "getView"]);
$router->setGetRoute("/profile", [new \app\controllers\ProfileController(), "getView"]);
$router->setGetRoute("/cart", [new \app\controllers\CartController(), "getView"]);
$router->setGetRoute("/menu", [new \app\controllers\MenuController(), "getView"]);

$router->setPostRoute("/handle", [new MainController, "handleView"]);
$router->setPostRoute("/signup", [new \app\controllers\SignupController(), "handleView"]);
$router->setPostRoute("/login", [new \app\controllers\LoginController(), "handleView"]);
$router->setPostRoute("/edit", [new \app\controllers\EditDataController(), "handleView"]);

ob_start();
$application->run();
ob_flush();