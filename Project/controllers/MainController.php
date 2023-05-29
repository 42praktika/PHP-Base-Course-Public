<?php

namespace app\controllers;

use app\core\Application;
use app\core\Request;
use app\mappers\CategoryMapper;
use app\mappers\ProductMapper;
use app\mappers\UserMapper;

class MainController
{

    public function getView()
    {

        try {
            session_start();
            $mapperProduct = new ProductMapper();
            $products = $mapperProduct->selectAll()->rows;

            $lastProduct = $mapperProduct->doSelectLast();

            $categoryMapper = new CategoryMapper();
            $categories = $categoryMapper->SelectAll()->rows;


            Application::$app->getRouter()->renderTemplate("mainPage", ["products" => $products, "last" => $lastProduct, "categories" => $categories, "postAction" => "addToCart", "detailsAction" => "details", "searchCategory" => "searchCategory"]);

        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

    public function category()
    {

        try {
            session_start();
            $body = Application::$app->getRequest()->getBody();
            $categoryId = $body['categoryid'];
            $mapperProduct = new ProductMapper();
            $products = $mapperProduct->doSelectByCategory($categoryId);

            $lastProduct = $mapperProduct->doSelectLast();

            $categoryMapper = new CategoryMapper();
            $categories = $categoryMapper->SelectAll()->rows;

            Application::$app->getRouter()->renderTemplate("mainPage", ["products" => $products, "last" => $lastProduct, "categories" => $categories, "postAction" => "addToCart", "detailsAction" => "details", "cid"]);

        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

}
