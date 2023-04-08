<?php

use app\controllers\AboutController;
use app\controllers\MainController;
use app\controllers\RegistrationController;
use app\core\Application;

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

$application = new Application();
$router = $application->getRouter();

//$router->setGetRoute("/", [new PresentationController, "getView"]);
//$router->setPostRoute("/handle", [new PresentationController, "handleView"]);
$router->setGetRoute("/get500", "");

$router->setGetRoute("/", [new MainController, "getView"]);
$router->setGetRoute("/about", [new AboutController, "getView"]);
$router->setGetRoute("/registration", [new RegistrationController, "getView"]);
$router->setPostRoute("/registration", [new RegistrationController, "register"]);

ob_start();
$application->run();
ob_flush();