<?php

use app\controllers\PresentationController;
use app\core\Application;
use app\core\ConfigParser;

const PROJECT_ROOT = __DIR__."/../";
require "../vendor/autoload.php";
spl_autoload_register(function ($className) {
   require str_replace("app\\",PROJECT_ROOT, $className).".php";

});

$application = new Application();
$router = $application->getRouter();

$parser = new ConfigParser();
$parser->parse('config.ini');
$config = $parser->getConfig();
echo $config['APP'];

$router->setGetRoute("/", [new PresentationController, "getView"]);
$router->setPostRoute("/handle", [new PresentationController, "handleView"]);

ob_start();
$application->run();
ob_flush();