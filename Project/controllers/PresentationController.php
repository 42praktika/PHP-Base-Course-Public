<?php
/*declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\FileException;
use app\models\User;

class PresentationController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("presentation");
    }

    public function handleView()
    {
        try {
        $body = Application::$app->getRequest()->getBody();

        (new User())->assign($body)->save();

        Application::$app->getRouter()->renderView("success"); }
        catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);
        }
    }


}*/