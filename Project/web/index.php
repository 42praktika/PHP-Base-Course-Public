<?php

use app\controllers\AboutController;
use app\controllers\LoginController;
use app\controllers\MainController;
use app\controllers\RegistrationController;
use app\core\Application;
use app\core\ConfigParser;

//Возвращает файлы напрямую
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

const PROJECT_ROOT = __DIR__."/../";
//require "../vendor/autoload.php"; TODO Не находит этот путь
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
//    ini_set('error_log', PROJECT_ROOT."/runtime/".getenv("PHP_LOG"));
}

$application = new Application();
$router = $application->getRouter();

//$router->setGetRoute("/", [new PresentationController, "getView"]);
//$router->setPostRoute("/handle", [new PresentationController, "handleView"]);
$router->setGetRoute("/get500", "");

$router->setGetRoute("/", [new MainController, "getView"]);

$router->setGetRoute("/about", [new AboutController, "getView"]);

$router->setGetRoute("/registration", [new RegistrationController, "getView"]);
$router->setPostRoute("/registration", [new RegistrationController, "register"]);

$router->setGetRoute("/login", [new LoginController, "getView"]);
$router->setPostRoute("/login", [new LoginController, "logIn"]);

ob_start();
$application->run();
ob_flush();