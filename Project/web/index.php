<?php

use app\controllers\PresentationController;
use app\core\Application;

// Return files
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|html?|js)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

const PROJECT_ROOT = __DIR__."/../";
require "../vendor/autoload.php";
require PROJECT_ROOT."/polyfill/http_send_status.php";

spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";
});

\app\core\ConfigParser::load();
$env = getenv("APP_ENV");

if($env == "dev"){
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    ini_set('log_errors', '1');
    ini_set('error_log', PROJECT_ROOT."/runtime/".getenv("PHP_LOG"));
}
$application = new Application();
$router = $application->getRouter();

// GET controllers

$router->setGetRoute("/get500", "");
$router->setGetRoute("/", [new PresentationController, "getView"]);
$router->setGetRoute("/user", [new \app\controllers\UserProfileContoller(), "getView"]);
$router->setGetRoute("/about", [new \app\controllers\AboutContoller(), "getView"]);
$router->setGetRoute("/manga", [new \app\controllers\MangaProfileContoller(), "getView"]);
$router->setGetRoute("/favourite", [new \app\controllers\FavouritePageController(), "getView"]);
$router->setGetRoute("/logout", [new \app\controllers\LogoutController(), "getView"]);


//GET admin panel controllers
$router->setGetRoute("/admin", [new \app\controllers\adminPanel\AdminPresentationController(), "getView"]);
$router->setGetRoute("/taglist", [new \app\controllers\adminPanel\AdminPanelTagListController(), "getView"]);

// POST admin panel controllers
$router->setPostRoute("/addMangaTag", [new \app\controllers\adminPanel\tag\AdminPanelAddTagController(), "handleView"]);
// AJAX admin panel controllers
$router->setPostRoute("/validateTagName", [new \app\controllers\adminPanel\ajax\AJAX_VerifyTagNameController(), "handleView"]);
$router->setPostRoute("/deleteTagByTitle", [new \app\controllers\adminPanel\ajax\AJAX_DeleteTagByTitleController(), "handleView"]);

// POST controllers
$router->setPostRoute("/login", [new \app\controllers\LoginController(), "handleView"]);
$router->setPostRoute("/register", [new \app\controllers\RegisterController(), "handleView"]);
$router->setPostRoute("/handle", [new PresentationController, "handleView"]);

// AJAX controllers

$router->setPostRoute("/validateRegisterForm", [new \app\controllers\ajax\AJAX_RegistrationFormValidationController(), "handleView"]);
$router->setPostRoute("/validateLoginForm", [new \app\controllers\ajax\AJAX_LoginValidationController(), "handleView"]);

//

ob_start();
$application->run();
ob_flush();