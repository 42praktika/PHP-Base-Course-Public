<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;

class EditDataController
{
    public function getView()
    {
    }

    public function handleView()
    {
        session_start();

        $userID = $_SESSION["userID"];

        try{
            $body = Application::$app->getRequest()->getBody();
            $username = $body['username'];
            $phone = $body['phone'];
            $email = $body['email'];
            $password = $body['password'];
            $password_confirm = $body['password_confirm'];

            if($password != $password_confirm){
                echo "fhrigd";
                //header("Location: /error");
                return;
            }

            if(strlen($password) < 6 || strlen($password) > 35){
                echo "Password length must be in interval [10:35]";
                return;
            }

//            $userExist = UserMapper::findUserByEmail($body["email"]) != null;
//            if($userExist){
//                echo "User with Email $email is already registered";
//                return;
//            }

            if(is_null($password) || is_null($email)){
                echo "null";
                //header("Location: /error");
                return;
            }


            $mapper = new UserMapper();
            $user = UserMapper::findUserByID($userID);
            $mapper->Update($user);
            header("Location: /profile");
        }
        catch (\Exception $exception){
            echo $exception;
        }

    }
}