<?php

namespace app\controllers;

use app\core\Application;
use app\exceptions\DBException;
use app\mappers\ProductMapper;
use app\mappers\WishlistMapper;

class ProductController
{
    public function addProduct(): void
    {
        session_start();
        $body = Application::$app->getRequest()->getBody();
        $productId = intval($body["prodID"]);
        $wishlistId = intval($body['listID']);
        $wishlistMapper = (new WishlistMapper)->getInstance();
        try {
            if ($wishlistMapper->doSelectProductFromWishlist($wishlistId, $productId)) {
                $wishlistMapper->doInsertProductIntoWishlist($wishlistId, $productId);
            }
        } catch (DBException $e) {
            Application::$app->getLogger()->error('Error occurred while adding product: ' . $e->getMessage());
            ErrorController::showError("error", "mainPage");
        }
        header("Location: http://localhost:8080/mainPage");
        exit();
    }

    public function removeProduct(): void
    {
        session_start();
        $body = Application::$app->getRequest()->getBody();
        $productMapper = (new ProductMapper)->getInstance();
        $productId = $body["prodID"];
        $wishlistId = $body["listID"];
        try {
            $productMapper->doDeleteProductFromWishlist($productId, $wishlistId);
        } catch (DBException $e) {
            Application::$app->getLogger()->error('Error occurred while removing product: ' . $e->getMessage());
            ErrorController::showError("error", "myWishlists");
        }
        header("Location: http://localhost:8080/myWishlists");
        exit();
    }
}