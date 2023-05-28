<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;
use app\viewmodels\HeaderViewModel;

class MangaProfileContoller
{

    public function getView()
    {
        session_start();
        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;


        if(!$authorised){
            $header = HeaderViewModel::getView(false);
            Application::$app->getRouter()->renderTemplate("manga_profile", ["header"=>$header]);
            return;
        }

        $user = UserMapper::findUserByID($_SESSION["userID"]);

        $header = HeaderViewModel::getView(true, ["username"=>$user->getNickname()]);

        Application::$app->getRouter()->renderTemplate("manga_profile", ["header"=>$header]);

    }

    public function handleView()
    {
//        $body = Application::$app->getRequest()->getBody();
//        var_dump($body);
          //Application::$app->getRouter()->renderView("about");
    }
}