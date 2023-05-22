<?php

use app\controllers\NewsController;
use app\controllers\PresentationController;
use app\core\Application;
use app\core\ConfigParser;
use app\controllers\AboutController;
use app\controllers\CartController;
use app\controllers\FAQController;
use app\controllers\LoginController;
use app\controllers\LogoutController;
use app\controllers\MainController;
use app\controllers\PromocodeController;
use app\controllers\RegistrationController;

//Возвращает файлы напрямую
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

const PROJECT_ROOT = __DIR__."/../";
require PROJECT_ROOT."../vendor/autoload.php";
require PROJECT_ROOT."/polyfill/http_send_status.php";
spl_autoload_register(function ($className) {
    require str_replace("app\\",PROJECT_ROOT, $className).".php";

});



ConfigParser::load();

$env = getenv("APP_ENV");
if ($env == "dev") {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('log_errors', '1');
    ini_set('error_log', PROJECT_ROOT."/runtime/".getenv("PHP_LOG"));
}

$application = new Application();
$router = $application->getRouter();

$router->setGetRoute("/get500", "");

$router->setGetRoute("/", [new PresentationController, "getView"]);
$router->setPostRoute("/handle", [new PresentationController, "handleView"]);

$router->setGetRoute("/about", [new AboutController, "getView"]);

$router->setGetRoute("/cart", [new CartController, "getView"]);

$router->setGetRoute("/faqs", [new FAQController, "getView"]);

$router->setGetRoute("/login", [new LoginController, "getView"]);
$router->setPostRoute("/dologin", [new LoginController, "handleView"]);

$router->setGetRoute("/logout", [new LogoutController, "getView"]);


$router->setGetRoute("/main", [new MainController, "getView"]);

$router->setGetRoute("/promo", [new PromocodeController, "getView"]);

$router->setGetRoute("/news", [new NewsController, "getView"]);

$router->setGetRoute("/registration", [new RegistrationController, "getView"]);
$router->setPostRoute("/doregistration", [new RegistrationController, "handleView"]);




ob_start();
$application->run();
ob_flush();