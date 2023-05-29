<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\CategoryMapper;
use app\mappers\ProductMapper;

class LogoutController
{

    public function getView()
    {
        try {
            session_start();
            session_unset();
            setcookie("SID", "", time() - 3600);

            (new MainController)->getView();
        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

}
