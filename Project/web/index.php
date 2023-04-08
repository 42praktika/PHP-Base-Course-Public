<?php

use app\controllers\MainController;
use app\controllers;
use app\core\Application;

const PROJECT_ROOT = __DIR__."/../";
require "../vendor/autoload.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";

});

$application = new Application();
$router = $application->getRouter();

$router->setGetRoute("/", [new MainController, "getView"]);
$router->setGetRoute("/about", [new controllers\AboutUsController(), "getView"]);
$router->setPostRoute("/handle", [new MainController, "handleView"]);

ob_start();
$application->run();
ob_flush();