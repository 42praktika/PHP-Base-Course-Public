<?php

use app\controllers\DetailsController;
use app\controllers\NewsController;
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
use app\Project\controllers\AdminController;
use app\Project\controllers\OrderController;
use app\Project\controllers\SearchController;

//Возвращает файлы напрямую
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

const PROJECT_ROOT = __DIR__ . "/../";
require PROJECT_ROOT . "../vendor/autoload.php";
require PROJECT_ROOT . "/polyfill/http_send_status.php";
spl_autoload_register(function ($className) {
    require str_replace("app\\", PROJECT_ROOT, $className) . ".php";

});


ConfigParser::load();

$env = getenv("APP_ENV");
if ($env == "dev") {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('log_errors', '1');
    ini_set('error_log', PROJECT_ROOT . "/runtime/" . getenv("PHP_LOG"));
}

$application = new Application();
$router = $application->getRouter();

$router->setGetRoute("/get500", "");

$router->setGetRoute("/about", [new AboutController, "getView"]);

$router->setGetRoute("/cart", [new CartController, "getView"]);
$router->setPostRoute("/addToCart", [new CartController, "addToCart"]);
$router->setPostRoute("/deleteFromCart", [new CartController, "deleteFromCart"]);
$router->setPostRoute("/upAmount", [new CartController, "upAmount"]);
$router->setPostRoute("/downAmount", [new CartController, "downAmount"]);

$router->setGetRoute("/faqs", [new FAQController, "getView"]);

$router->setGetRoute("/login", [new LoginController, "getView"]);
$router->setPostRoute("/dologin", [new LoginController, "handleView"]);

$router->setGetRoute("/logout", [new LogoutController, "getView"]);


$router->setGetRoute("/main", [new MainController, "getView"]);
$router->setPostRoute("/searchCategory", [new MainController, "category"]);

$router->setGetRoute("/promo", [new PromocodeController, "getView"]);

$router->setGetRoute("/news", [new NewsController, "getView"]);

$router->setPostRoute("/details", [new DetailsController, "getView"]);

$router->setGetRoute("/orders", [new OrderController, "getView"]);
$router->setPostRoute("/createorder", [new OrderController, "createOrder"]);

$router->setPostRoute("/search", [new SearchController, "getView"]);

$router->setGetRoute("/registration", [new RegistrationController, "getView"]);
$router->setPostRoute("/doregistration", [new RegistrationController, "handleView"]);

$router->setGetRoute("/admin", [new AdminController, "getView"]);
$router->setPostRoute("/showEditProduct", [new AdminController, "showEditProduct"]);
$router->setPostRoute("/editProduct", [new AdminController, "editProduct"]);
$router->setPostRoute("/addProduct", [new AdminController, "addProduct"]);
$router->setPostRoute("/deleteProduct", [new AdminController, "deleteProduct"]);


ob_start();
$application->run();
ob_flush();