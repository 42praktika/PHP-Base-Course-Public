<?php

namespace app\controllers;

use app\core\Application;

class FAQController
{

    public function getView()
    {
        session_start();
        Application::$app->getRouter()->renderTemplate("faqs");
    }
}
