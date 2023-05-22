<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\ProductMapper;
use app\mappers\WishlistMapper;
use app\models\Wishlist;

class WishlistController
{
    public function addWishlist():void
    {
        $body = Application::$app->getRequest()->getBody();
        $title = $body["title"];

        if (empty($title)) {
            ErrorController::showError("EmptyTitle","addWishlist");
        } else {
            //TODO:достать юсера,у него айди и его в вишлист
            $wishlist = new Wishlist(1,$title);
            $wishlistMapper = new WishlistMapper();
            $wishlistMapper->Insert($wishlist);
            header("Location: http://localhost:8080/myWishlists");
            exit();
        }
    }

    public function showAddWishlistForm():void
    {
        Application::$app->getRouter()->renderTemplate("addWishlist", ["post_action"=>"addWishlist","wishlists"=>"myWishlists","main"=>"mainPage"]);
    }

    public function showWishlist():void
    {
        $body = Application::$app->getRequest()->getBody();
        //TODO: достать юсера  его айди в метод
        $wishlistId = intval($body["listID"]);
        $wishlistMapper = new WishlistMapper();
        $productMapper = new ProductMapper();
        $title = $wishlistMapper->doSelect($wishlistId)["title"];
        $productsId = $productMapper->doSelectProductsInWishlist(1,$wishlistId);
        $products = [];
        foreach ($productsId as $product) {
            $products[] = $productMapper->doSelect($product["product_id"]);
        }
        Application::$app->getRouter()->renderTemplate("wishlist", ["title"=>$title,"products"=>$products,"wishlistId"=>$wishlistId,"removeProduct"=>"removeProduct","removeWishlist"=>"removeWishlist","rename"=>"renameWishlist","wishlists"=>"myWishlists"]);
    }

    public function removeWishlist():void
    {
        $body = Application::$app->getRequest()->getBody();
        $wishlistId = intval($body["listID"]);
        $wishlistMapper = new WishlistMapper();
        $wishlistMapper->doDelete($wishlistId);
        header("Location: http://localhost:8080/myWishlists");
        exit();
    }

    public function renameWishlist():void
    {
        //TODO:айди юсера и его в метод
        $body = Application::$app->getRequest()->getBody();
        $wishlistId = intval($body["listID"]);
        $title = $body["title"];
        $wishlistMapper = new WishlistMapper();
        $wishlistMapper->doUpdateTitle($title,$wishlistId,1);
        header("Location: http://localhost:8080/myWishlists");
        exit();
    }

    public function showRenameWishlistForm():void
    {
        $body = Application::$app->getRequest()->getBody();
        $wishlistId = intval($body["listID"]);
        $title = $body["title"];
        Application::$app->getRouter()->renderTemplate("renameWishlist", ["post"=>"rename","title"=>$title,"wishlistId"=>$wishlistId,"wishlists"=>"myWishlists"]);
    }
}