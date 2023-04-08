<?php

use app\controllers\PresentationController;
use app\controllers;
use app\core\Application;



if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|html?)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}


const PROJECT_ROOT = __DIR__."/../";
require "../vendor/autoload.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";
});

$application = new Application();
$router = $application->getRouter();

$router->setGetRoute("/", [new PresentationController, "getView"]);
$router->setGetRoute("/about", [new controllers\AboutContoller(), "getView"]);
$router->setGetRoute("/manga", [new controllers\MangaProfileContoller(), "getView"]);
$router->setGetRoute("/user", [new controllers\UserProfileContoller(), "getView"]);


$router->setPostRoute("/handle", [new PresentationController, "handleView"]);

$router->setPostRoute("/login", [new controllers\LoginController(), "handleView"]);


ob_start();
$application->run();
ob_flush();