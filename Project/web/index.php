<?php

use app\controllers\PresentationController;
use app\core\Application;
use app\core\ConfigParser;

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

$router->setGetRoute("/view", [new PresentationController, "getView"]);
$router->setPostRoute("/handle", [new PresentationController, "handleView"]);
$router->setGetRoute("/", [new PresentationController, "getStartPage"]);
$router->setGetRoute("/register", [new PresentationController, "getRegisterPage"]);

ob_start();
$application->run();
ob_flush();