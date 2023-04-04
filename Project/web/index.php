<?php

use app\controllers\AboutController;
use app\controllers\MainPageController;
use app\controllers\RegistrationController;
use app\core\Application;

if(preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}
const PROJECT_ROOT = __DIR__."/../";
require "../vendor/autoload.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";

});

$application = new Application();
$router = $application->getRouter();

$router->setGetRoute("/", [new MainPageController, "getView"]);
$router->setGetRoute("/aboutPage", [new AboutController, "getView"]);
$router->setGetRoute("/registrationPage", [new RegistrationController, "getView"]);

ob_start();
$application->run();
ob_flush();