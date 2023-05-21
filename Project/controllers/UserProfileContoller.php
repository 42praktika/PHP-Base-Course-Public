<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class UserProfileContoller
{

    public function getView()
    {
        session_start();
        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;


        if(!$authorised){
            Application::$app->getRouter()->renderTemplate("error", ["error_code"=>401, "error_explanation" => "Unauthorized"]);
            return;
        }

        $user = UserMapper::findUserByID($_SESSION["userID"]);

        $header = HeaderController::getView(true, ["username"=>$user->getNickname()]);


        Application::$app->getRouter()->renderTemplate("user_profile", ["header"=>$header, "username"=>$user->getNickname(), "email"=>$user->getEmail()]);

    }

    public function handleView()
    {
//        $body = Application::$app->getRequest()->getBody();
//        var_dump($body);
          //Application::$app->getRouter()->renderView("about");
    }
}