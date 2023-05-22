<?php

namespace app\controllers;

use app\core\Application;

class FAQController
{

    public function getView()
    {
        Application::$app->getRouter()->renderTemplate("faqs");
    }
}