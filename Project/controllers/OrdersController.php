<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\OrderMapper;
use app\mappers\UserMapper;
use app\models\Order;

class OrdersController
{
    public function getView()
    {
    }
    public function handleView()
    {

        try{
            $body = Application::$app->getRequest()->getBody();

            $username = $body['username'];
            $phone = $body['phone'];
            $address = $body['address'];

            $mapper = new OrderMapper();
            $user = $mapper->createObject($body);
            $mapper->Insert($user);
            header("Location: /thanks");
        }
        catch (\Exception $exception){
            echo $exception;
        }

    }
}