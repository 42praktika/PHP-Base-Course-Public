<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\ProductMapper;
use app\mappers\WishlistMapper;
use app\models\Wishlist;

class ProductController
{
    public function addProduct():void
    {
        $body = Application::$app->getRequest()->getBody();
        $productId = intval($body["prodID"]);
        $wishlistId = intval($body['listID']);

        $wishlistMapper = new WishlistMapper();

        if(!$wishlistMapper->doSelectProductFromWishlist($wishlistId, $productId)) {
            $wishlistMapper->doInsertProductIntoWishlist($wishlistId, $productId);
        }
        header("Location: http://localhost:8080/mainPage");
        exit();
    }

    public function removeProduct():void
    {
        $body = Application::$app->getRequest()->getBody();
        $productMapper = new ProductMapper();
        var_dump($body);
        $productId = $body["prodID"];
        $wishlistId = $body["listID"];
        $productMapper->doDeleteProductFromWishlist($productId,$wishlistId);
        header("Location: http://localhost:8080/myWishlists");
        exit();
    }
}