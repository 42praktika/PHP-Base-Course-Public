<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\mappers\ReviewMapper;

class DeleteReviewController
{
    public function getView(): void
    {
        Application::$app->getRouter()->renderView("deleteReview");

    }

    public function handleView()
    {
        $body = Application::$app->getRequest()->getBody();
        $mapper = new ReviewMapper();
        $review = $mapper->Select((int)$body['id']);
        $mapper->Delete($review);
    }
}