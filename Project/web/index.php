<?php

use app\controllers\ErrorController;
use app\controllers\ProductController;
use app\controllers\UserController;
use app\controllers\WishlistController;
use app\core\Application;
use app\core\ConfigParser;
use \app\controllers\MainPageController;
use \app\controllers\RegisterController;

const PROJECT_ROOT = __DIR__."/../";
require PROJECT_ROOT."/vendor/autoload.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";
});

try {
    ConfigParser::load();
} catch (\app\exceptions\FileException $e) {
    Application::$app->getLogger()->error('Configuration file not found');
}

$env = getenv("APP_ENV");
if ($env == "dev") {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('log_errors', '1');
    ini_set('error_log', PROJECT_ROOT."/runtime/".$_ENV['php_log']);
}

$application = new Application();
$router = $application->getRouter();

$router->setPostRoute("/register", [new RegisterController, "registerUser"]);
$router->setPostRoute("/login", [new RegisterController, "login"]);
$router->setPostRoute("/addWishlist", [new WishlistController, "addWishlist"]);
$router->setPostRoute("/addProduct", [new ProductController, "addProduct"]);
$router->setPostRoute("/wishlist", [new WishlistController, "showWishlist"]);
$router->setPostRoute("/removeWishlist", [new WishlistController, "removeWishlist"]);
$router->setPostRoute("/rename", [new WishlistController, "renameWishlist"]);
$router->setPostRoute("/removeProduct", [new ProductController, "removeProduct"]);
$router->setPostRoute("/editProfile", [new UserController, "showEditProfileForm"]);
$router->setPostRoute("/edit", [new UserController, "editProfile"]);
$router->setPostRoute("/renameWishlist", [new WishlistController, "showRenameWishlistForm"]);
try {
    $router->setGetRoute("/", [new MainPageController, "getWelcomePage"]);
    $router->setGetRoute("/welcome", [new MainPageController, "getWelcomePage"]);
    $router->setGetRoute("/mainPage", [new MainPageController, "getMainPage"]);
    $router->setGetRoute("/register", [new RegisterController, "getRegisterPage"]);
    $router->setGetRoute("/login", [new RegisterController, "getRegisterPage"]);
    $router->setGetRoute("/errorPage", [new ErrorController, "showError"]);
    $router->setGetRoute("/myWishlists", [new UserController, "showUserWishlists"]);
    $router->setGetRoute("/profile", [new UserController, "showProfile"]);
    $router->setGetRoute("/logout", [new MainPageController, "logout"]);
    $router->setGetRoute("/addWishlist", [new WishlistController, "showAddWishlistForm"]);
} catch (Exception $e) {
    Application::$app->getLogger()->error('Error occurred while setting routes: ' . $e->getMessage());
    $router->renderStatic("404.html");
}
ob_start();
$application->run();
ob_flush();