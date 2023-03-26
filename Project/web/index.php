<?php

use app\controllers\AboutController;
use app\controllers\MainPageController;
use app\core\Application;

const PROJECT_ROOT = __DIR__."/../";
require "../vendor/autoload.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";

});

$application = new Application();
$router = $application->getRouter();

$router->setGetRoute("/", [new MainPageController, "getView"]);
$router->setGetRoute("/aboutPage", [new AboutController, "getView"]);

ob_start();
$application->run();
ob_flush();