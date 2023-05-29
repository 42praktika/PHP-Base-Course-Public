<?php

namespace app\controllers;

use app\core\Application;

use app\mappers\CategoryMapper;
use app\mappers\ProductMapper;

class DetailsController
{

    public function getView()
    {
        try {
            session_start();

            $body = Application::$app->getRequest()->getBody();
            $productId = intval($body["id"]);

            $productMapper = new ProductMapper();
            $product = $productMapper->doSelectById($productId);

            $categoryMapper = new CategoryMapper();
            $categoryName = $categoryMapper->doSelectName($product['categoryid']);

            Application::$app->getRouter()->renderTemplate("details", ["product" => $product, "postAction" => "addToCart", "category" => $categoryName]);
        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

}
