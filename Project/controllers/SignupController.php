<?php

declare(strict_types=1);

namespace app\controllers;
use app\core\Application;
use app\core\Response;
use app\exceptions\FileException;
use app\mappers\UserMapper;
use app\models\User;
class SignupController
{
    public function getView()
    {
//        session_start();
//        $authorised = false;
//
//        $userID = isset($_SESSION["userID"]);
//        if($userID) $authorised = true;
//
//        if($authorised){
//            Application::$app->getRouter()->renderTemplate("profile");
//            return;
//        }
//
//        Application::$app->getRouter()->renderTemplate("registration");
    }
    public function handleView()
    {

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
            $user = $mapper->createObject($body);
            $mapper->Insert($user);
            header("Location: /profile");
            //$this->login($email, $password);
        }
        catch (\Exception $exception){
            echo $exception;
        }

    }

}