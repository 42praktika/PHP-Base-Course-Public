<?php


namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\DBException;
use app\mappers\ProductMapper;
use app\mappers\WishlistMapper;

class MainPageController
{
    public function getWelcomePage(): void

    {

        Application::$app->getRouter()->renderTemplate("welcomePage", ["post_action"=>"register"]);

    }
    public function getMainPage(): void
    {
        session_start();

        if (!isset($_SESSION['user'])) {
            Application::$app->getRouter()->renderStatic("403.html");
            Application::$app->getResponse()->setStatusCode(Response::HTTP_FORBIDDEN);
            exit();
        }
        $productMapper = (new ProductMapper)->getInstance();;
        $products = $productMapper->selectAll()->rows;
        $wishlistMapper = new WishlistMapper();
        $user = $_SESSION["user"];
        try {
            $wishlists = $wishlistMapper->doSelectUserWishlists($user->getId());
        } catch (DBException $e) {
            Application::$app->getLogger()->error('Error occurred while loading mainPage: ' . $e->getMessage());
            ErrorController::showError("error", "login");
        }
        Application::$app->getRouter()->renderTemplate("mainPage", ["products" => $products, "plus"=>"addWishlist","post_action_add"=>"addProduct", "wishlists"=>$wishlists]);
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user']);
        header("Location: http://localhost:8080/welcome");
        exit();
    }
}