<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\FileException;
use app\mappers\UserMapper;
use app\models\User;

class PresentationController
{

    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("index", ["post_action"=>"handle"]);

    }

    public function handleView()
    {
        try {
        $body = Application::$app->getRequest()->getBody();

       $mapper = new UserMapper();
       $user = $mapper->createObject($body);
       $mapper->Insert($user);
       $users = $mapper->SelectAll();
       var_dump($users);
       // Application::$app->getRouter()->renderView("success");
             }
        catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);
        }
    }


}