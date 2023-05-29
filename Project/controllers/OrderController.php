<?php

namespace app\Project\controllers;

use app\core\Application;
use app\mappers\CartMapper;
use app\mappers\OrderMapper;
use app\mappers\ProductMapper;

class OrderController
{

    public function getView(string $productName)
    {

        try {
            session_start();
            $username = $_SESSION["username"];
            $orderMapper = new OrderMapper();
            $orders = $orderMapper->doSelectByUsername($username);
            Application::$app->getRouter()->renderTemplate("orders", ["orders" => $orders, "productName" => $productName]);

        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }

    public function createOrder()
    {

        try {
            session_start();
            $username = $_SESSION["username"];
            $body = Application::$app->getRequest()->getBody();

            $productid = intval($body["productid"]);
            $amount = intval($body["amount"]);

            $productMapper = new ProductMapper();
            $product = $productMapper->doSelectById($productid);
            $productName = $product['name'];
            $price = intval($amount * $product["price"]);

            $orderMapper = new OrderMapper();
            $number = random_int(0, PHP_INT_MAX);
            $data = ["amount" => $amount, "number" => $number, "price" => $price, "productid" => $productid, "userid" => $username];

            $order = $orderMapper->createObject($data);

            $orderMapper->Insert($order);

            $cartMapper = new CartMapper();
            $cartMapper->doDeleteProduct($username, $productid);

            OrderController::getView($productName);


        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }
}
