<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;
use app\viewmodels\HeaderViewModel;

class AboutContoller
{

    public function getView()
    {
        session_start();
        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;


        if(!$authorised){
            $header = HeaderViewModel::getView(false);
            Application::$app->getRouter()->renderTemplate("about", ["header"=>$header]);
            return;
        }

        $user = UserMapper::findUserByID($_SESSION["userID"]);

        $header = HeaderViewModel::getView(true, ["username"=>$user->getNickname()]);

        Application::$app->getRouter()->renderTemplate("about", ["header"=>$header]);
    }

    public function handleView()
    {

    }
}