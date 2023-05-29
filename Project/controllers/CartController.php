<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\CartMapper;
use app\mappers\UserMapper;

class CartController
{

    public function getView()
    {
        session_start();
        if (!isset($_SESSION['username'])){
            echo "Please authorise!";
        }
        $username = $_SESSION["username"];

        $cartMapper = new CartMapper();
        $items = $cartMapper->doSelectAllCart($username);
        $totalSum = 0;
        $quantity = 0;
        foreach ($items as $item) {
            $totalSum += $item['price'];
            $quantity += $item['amount'];
        }
        Application::$app->getRouter()->renderTemplate("cart", ["items" => $items, "totalSum" => $totalSum, "quantity" => $quantity, "delete" => "deleteFromCart"
            , "up" => "upAmount", "down" => "downAmount", "pay" => "createorder"]);

    }

    public function addToCart()
    {
        try {

            session_start();
            $username = $_SESSION["username"];
            $body = Application::$app->getRequest()->getBody();
            $productId = intval($body["id"]);

            $cartMapper = new CartMapper();

            if (count($cartMapper->doSelectProduct($username, $productId)) < 1) {
                $body = Application::$app->getRequest()->getBody();
                $data = ["username" => $username, "productId" => $productId, "amount" => $body['amount']];
                $cartItem = $cartMapper->createObject($data);
                $cartMapper->Insert($cartItem);
            } else {
                $amount = $cartMapper->doSelectAmount($username, $productId);
                $amount["amount"] += 1;
                $cartMapper->doUpdateAmount($username, $productId, $amount["amount"]);
            }

            (new CartController)->getView();

        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

    public function deleteFromCart()
    {
        try {
            session_start();

            $username = $_SESSION["username"];
            $body = Application::$app->getRequest()->getBody();
            $productId = intval($body["id"]);

            $cartMapper = new CartMapper();
            $cartMapper->doDeleteProduct($username, $productId);
            CartController::getView();
        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

    public function upAmount()
    {
        try {
            session_start();

            $username = $_SESSION["username"];
            $body = Application::$app->getRequest()->getBody();
            $productId = intval($body["id"]);
            $amount = intval($body["amount"]);
            $amount += 1;
            $cartMapper = new CartMapper();
            $cartMapper->doUpdateAmount($username, $productId, $amount);
            CartController::getView();
        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

    public function downAmount()
    {
        try {
            session_start();
            $username = $_SESSION["username"];
            $body = Application::$app->getRequest()->getBody();
            $productId = intval($body["id"]);
            $amount = intval($body["amount"]);

            $cartMapper = new CartMapper();

            if ($amount > 1) {
                $amount -= 1;
                $cartMapper->doUpdateAmount($username, $productId, $amount);
            } else {
                $cartMapper->doDeleteProduct($username, $productId);
            }
            CartController::getView();
        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }
}
