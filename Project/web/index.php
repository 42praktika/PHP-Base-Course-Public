<?php

use app\controllers\PresentationController;
use app\core\Application;

const PROJECT_ROOT = __DIR__."/../";
require "../vendor/autoload.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";

});

$application = new Application();
$router = $application->getRouter();

$router->setGetRoute("/", [new PresentationController, "getView"]);
$router->setPostRoute("/handle", [new PresentationController, "handleView"]);
$router->setGetRoute("/about", [new PresentationController, "aboutView"]);

ob_start();
$application->run();
ob_flush();