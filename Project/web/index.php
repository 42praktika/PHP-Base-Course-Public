<?php

use app\controllers\AboutController;
use app\controllers\MainPageController;
use app\controllers\RegistrationController;
use app\core\Application;
use app\core\ConfigParser;

//Возвращает файлы напрямую
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

const PROJECT_ROOT = __DIR__."/../";
require PROJECT_ROOT."/vendor/autoload.php";
require PROJECT_ROOT."/polyfill/http_send_status.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";

});


$env = getenv("APP_ENV");
if ($env == "dev") {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('log_errors', '1');
    ini_set('error_log', PROJECT_ROOT."/runtime/".getenv("PHP_LOG"));
}
ConfigParser::load();
$application = new Application();
$router = $application->getRouter();



$router->setGetRoute("/get500", "");
$router->setGetRoute("/", [new MainPageController, "getView"]);
$router->setGetRoute("/aboutPage", [new AboutController, "getView"]);
$router->setGetRoute("/registrationPage", [new RegistrationController, "getView"]);
$router->setPostRoute("/catalog", [new RegistrationController, "handleView"]);


ob_start();
$application->run();
ob_flush();