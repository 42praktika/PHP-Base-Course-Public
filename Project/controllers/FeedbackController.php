<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\ReviewMapper;

class FeedbackController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("feedbackPage");
    }

    public function handleView()
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new ReviewMapper();
            $review = $mapper->createObject($body);
            $mapper->Insert($review);
        }
        catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);
        }
    }
}