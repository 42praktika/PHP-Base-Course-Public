<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\ProductMapper;
use app\mappers\WishlistMapper;

class MainPageController
{
    public function getWelcomePage()

    {
        Application::$app->getRouter()->renderTemplate("welcomePage", ["post_action"=>"register"]);

    }
    public function getMainPage()
    {
        $productMapper = new ProductMapper();
        $products = $productMapper->selectAll()->rows;
        $wishlistMapper = new WishlistMapper();
        //TODO: достать юсера
        $wishlists = $wishlistMapper->doSelectUserWishlists(1);
        Application::$app->getRouter()->renderTemplate("mainPage", ["products" => $products, "plus"=>"addWishlist","post_action_add"=>"addProduct", "wishlists"=>$wishlists]);
    }

    public function logout()
    {
       //TODO: удалить юсера
        header("Location: http://localhost:8080/welcome");
        exit();
    }
}