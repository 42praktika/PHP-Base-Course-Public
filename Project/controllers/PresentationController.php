<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\FileException;
use app\mappers\UserMapper;
use app\viewmodels\HeaderViewModel;

class PresentationController
{

    public function getView(): void
    {
        session_start();
        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;

        $unAuthorisedHeader = HeaderViewModel::getView(false);
        if(!$authorised){
            Application::$app->getRouter()->renderTemplate("home", ["header"=>$unAuthorisedHeader]);
            return;
        }

        $user = UserMapper::findUserByID($_SESSION["userID"]);

        if(is_null($user)){
            Application::$app->getRouter()->renderTemplate("home", ["header"=>$unAuthorisedHeader]);
            return;
        }

        $header = HeaderViewModel::getView(true, ["username"=>$user->getNickname()]);


        Application::$app->getRouter()->renderTemplate("home", ["header"=>$header]);
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

    private function writeBody(array $body)
    {
        $f = @fopen(PROJECT_ROOT . "/runtime/body.txt", "rb+");
        if ($f === false) {
            throw new FileException("cannot open file");
        }
        foreach ($body as $key => $value) {
            if (!fwrite($f, "$key=$value" . PHP_EOL)) {
                throw new FileException("cannot write to file");
            }
        }

        fclose($f);
    }
}