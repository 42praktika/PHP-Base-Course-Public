<?php

use app\controllers\PresentationController;
use app\core\Application;
use app\core\ConfigParser;
use \app\controllers\MainPageController;
use \app\controllers\RegisterController;

const PROJECT_ROOT = __DIR__."/../";
require PROJECT_ROOT."/vendor/autoload.php";
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

$router->setPostRoute("/register", [new RegisterController, "registerUser"]);
$router->setGetRoute("/", [new MainPageController, "getWelcomePage"]);
$router->setGetRoute("/mainPage", [new MainPageController, "getMainPage"]);
$router->setGetRoute("/register", [new RegisterController, "getRegisterPage"]);

ob_start();
$application->run();
ob_flush();