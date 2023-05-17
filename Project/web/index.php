<?php

use app\controllers\AboutController;
use app\controllers\AddCarController;
use app\controllers\AuthController;
use app\controllers\DeleteCarController;
use app\controllers\DeleteReviewController;
use app\controllers\DeleteUserController;
use app\controllers\FeedbackController;
use app\controllers\MainPageController;
use app\controllers\RegistrationController;
use app\controllers\RentFormController;
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
$router->setGetRoute("/feedBack", [new FeedbackController, "getView"]);
$router->setPostRoute("/feedBack", [new FeedbackController, "handleView"]);
$router->setGetRoute("/authPage", [new AuthController, "getView"]);
$router->setPostRoute("/adminPage", [new AuthController, "handleView"]);
$router->setGetRoute("/addCar", [new AddCarController, "getView"]);
$router->setPostRoute("/addCar", [new AddCarController, "handleView"]);
$router->setGetRoute("/deleteReview", [new DeleteReviewController, "getView"]);
$router->setPostRoute("/deleteReview", [new DeleteReviewController, "handleView"]);
$router->setGetRoute("/rentForm", [new RentFormController, "getView"]);
$router->setPostRoute("/rentForm", [new RentFormController, "handleView"]);
$router->setGetRoute("/deleteUser", [new DeleteUserController, "getView"]);
$router->setPostRoute("/deleteUser", [new DeleteUserController, "handleView"]);
$router->setGetRoute("/deleteCar", [new DeleteCarController, "getView"]);
$router->setPostRoute("/deleteCar", [new DeleteCarController, "handleView"]);


ob_start();
$application->run();
ob_flush();