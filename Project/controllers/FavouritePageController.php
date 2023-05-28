<?php

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\FileException;
use app\mappers\UserMapper;
use app\viewmodels\HeaderViewModel;

class FavouritePageController
{
    public function getView(): void
    {
        session_start();
        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;


        if(!$authorised){
            $header = HeaderViewModel::getView(false);
            Application::$app->getRouter()->renderTemplate("favourite", ["header"=>$header]);
            return;
        }

        $user = UserMapper::findUserByID($_SESSION["userID"]);

        $header = HeaderViewModel::getView(true, ["username"=>$user->getNickname()]);


        Application::$app->getRouter()->renderTemplate("favourite", ["header"=>$header]);
        // Application::$app->getRouter()->renderView("home");
        //Application::$app->getRouter()->renderTemplate("home");
    }

    public function handleView(): void
    {
        $body = Application::$app->getRequest()->getBody();

        try {
            $this->writeBody($body);
        } catch (FileException $e) {
            Application::$app->getResponse()->setStatusCode(Response::HTTP_SERVER_ERROR);
        }
    }
}