<?php

namespace app\Project\controllers;

use app\core\Application;
use app\mappers\CategoryMapper;
use app\mappers\ProductMapper;


class SearchController
{
    public function getView()
    {

        try {
            session_start();

            $body = Application::$app->getRequest()->getBody();
            $text = $body['text'];

            $mapperProduct = new ProductMapper();

            $products = $mapperProduct->doSelectByTitle($text);

            $lastProduct = $mapperProduct->doSelectLast();

            $categoryMapper = new CategoryMapper();
            $categories = $categoryMapper->SelectAll()->rows;

            Application::$app->getRouter()->renderTemplate("mainPage", ["products" => $products, "last" => $lastProduct, "categories" => $categories, "postAction" => "addToCart", "detailsAction" => "details", "searchCategory" => "searchCategory", "text" => $text]);

        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

}
