<?php

use app\controllers\AboutController;
use app\controllers\MainController;
use app\controllers\RegistrationController;
use app\core\Application;

const PROJECT_ROOT = __DIR__."/../";
//require "../vendor/autoload.php"; TODO Не находит этот путь
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";

});

$application = new Application();
$router = $application->getRouter();

//$router->setGetRoute("/", [new PresentationController, "getView"]);
//$router->setPostRoute("/handle", [new PresentationController, "handleView"]);

$router->setGetRoute("/", [new MainController, "getView"]);
$router->setGetRoute("/about", [new AboutController, "getView"]);
$router->setGetRoute("/registration", [new RegistrationController, "getView"]);
$router->setPostRoute("/registration", [new RegistrationController, "register"]);

ob_start();
$application->run();
ob_flush();