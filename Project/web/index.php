<?php

use app\controllers\LoginController;
use app\controllers\ArchiveController;
use app\controllers\PresentationController;
use app\controllers\RegisterController;
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
$router->setGetRoute("/", [new PresentationController, "getView"]);
$router->setPostRoute("/main", [new PresentationController, "handleView"]);

$router->setGetRoute("/archive", [new ArchiveController, "getView"]);
$router->setPostRoute("/archive", [new ArchiveController, "handleView"]);

$router->setGetRoute("/login", [new LoginController, "getView"]);
$router->setPostRoute("/login", [new LoginController, "handleView"]);

$router->setGetRoute("/register", [new RegisterController, "getView"]);
$router->setPostRoute("/register", [new RegisterController, "handleView"]);


ob_start();
$application->run();
ob_flush();