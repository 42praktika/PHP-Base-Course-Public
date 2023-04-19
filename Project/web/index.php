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
require "../vendor/autoload.php";
require PROJECT_ROOT."/polyfill/http_send_status.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";

});
ConfigParser::load();

$application = new Application();
$router = $application->getRouter();



$router->setGetRoute("/get500", "");
$router->setGetRoute("/", [new MainPageController, "getView"]);
$router->setGetRoute("/aboutPage", [new AboutController, "getView"]);
$router->setGetRoute("/registrationPage", [new RegistrationController, "getView"]);
$router->setPostRoute("/handle", [new RegistrationController, "handleView"]);

ob_start();
$application->run();
ob_flush();