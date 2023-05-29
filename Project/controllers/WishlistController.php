<?php

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\DBException;
use app\mappers\ProductMapper;
use app\mappers\WishlistMapper;
use app\models\Wishlist;

class WishlistController
{
    public function addWishlist(): void
    {
        session_start();
        $body = Application::$app->getRequest()->getBody();
        $title = $body["title"];

        if (empty($title)) {
            ErrorController::showError("EmptyTitle", "addWishlist");
        } else {
            $user = $_SESSION["user"];
            $wishlistMapper = (new \app\mappers\WishlistMapper)->getInstance();
            try {
                $array = [
                    "userId" => $user->getId(),
                    "title" => $title
                ];
                var_dump($array);
                $wishlist = $wishlistMapper->createObject($array);
                $wishlistMapper->Insert($wishlist);
                header("Location: http://localhost:8080/myWishlists");
                exit();
            } catch (DBException $e) {
                Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
                ErrorController::showError("error", "mainPage");
            }
        }
    }

    public function showAddWishlistForm(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            Application::$app->getRouter()->renderStatic("403.html");
            Application::$app->getResponse()->setStatusCode(Response::HTTP_FORBIDDEN);
            exit();
        }
        Application::$app->getRouter()->renderTemplate("addWishlist", ["post_action" => "addWishlist", "wishlists" => "myWishlists", "main" => "mainPage"]);
    }

    public function showWishlist(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            Application::$app->getRouter()->renderStatic("403.html");
            Application::$app->getResponse()->setStatusCode(Response::HTTP_FORBIDDEN);
            exit();
        }
        $body = Application::$app->getRequest()->getBody();
        $user = $_SESSION["user"];
        $wishlistId = intval($body["listID"]);
        $wishlistMapper = (new \app\mappers\WishlistMapper)->getInstance();
        $productMapper = (new \app\mappers\ProductMapper)->getInstance();
        try {
            $title = $wishlistMapper->doSelect($wishlistId)["title"];
            $productsId = $productMapper->doSelectProductsInWishlist($user->getId(), $wishlistId);
            $products = [];
            foreach ($productsId as $product) {
                $products[] = $productMapper->doSelect($product["product_id"]);
            }
            Application::$app->getRouter()->renderTemplate("wishlist", ["title" => $title, "products" => $products, "wishlistId" => $wishlistId, "removeProduct" => "removeProduct", "removeWishlist" => "removeWishlist", "rename" => "renameWishlist", "wishlists" => "myWishlists"]);
        } catch (DBException $e) {
            Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
            ErrorController::showError("error", "myWishlists");
        }
    }

    public function removeWishlist(): void
    {
        session_start();
        $body = Application::$app->getRequest()->getBody();
        $wishlistId = intval($body["listID"]);
        $wishlistMapper = (new \app\mappers\WishlistMapper)->getInstance();
        try {
            $wishlistMapper->doDelete($wishlistId);
            header("Location: http://localhost:8080/myWishlists");
            exit();
        } catch (DBException $e) {
            Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
            ErrorController::showError("error", "myWishlists");
        }
    }

    public function renameWishlist(): void
    {
        session_start();
        $user = $_SESSION["user"];
        $body = Application::$app->getRequest()->getBody();
        $wishlistId = intval($body["listID"]);
        $title = $body["title"];
        $wishlistMapper = (new \app\mappers\WishlistMapper)->getInstance();
        try {
            $wishlistMapper->doUpdateTitle($title, $wishlistId, $user->getId());
            header("Location: http://localhost:8080/myWishlists");
            exit();
        } catch (DBException $e) {
            Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
            ErrorController::showError("error", "myWishlists");
        }
    }

    public function showRenameWishlistForm(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            Application::$app->getRouter()->renderStatic("403.html");
            Application::$app->getResponse()->setStatusCode(Response::HTTP_FORBIDDEN);
            exit();
        }
        $body = Application::$app->getRequest()->getBody();
        $wishlistId = intval($body["listID"]);
        $title = $body["title"];
        Application::$app->getRouter()->renderTemplate("renameWishlist", ["post" => "rename", "title" => $title, "wishlistId" => $wishlistId, "wishlists" => "myWishlists"]);
    }
}