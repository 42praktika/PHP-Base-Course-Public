<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Router;
use app\mappers\UserMapper;
use app\models\User;
class LoginController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("login");
    }

    public function handleView()
    {

        $body = Application::$app->getRequest()->getBody();

        $email = $body["email"];
        $password = $body["password"];

        if(LoginValidationController::ValidateForm($body) !== "ok"){
            header("Location: /error");
            return;
        }

        $user = UserMapper::findUserByEmail($email);
        if($user == null){
            echo "User with Email $email is not found";
            return;
        }

        if(!password_verify($password, $user->getPassword())){
            echo "Incorrect password for user with Email $email";
            return;
        }

        session_start();
        setcookie("SID", session_id(), time()+20*24*60*60);
        $_SESSION["authorised"] = true;
        $_SESSION["userID"] = $user->getId();
//        var_dump($user);
//
//        $this->login($email, $password);
        header("Location: /");
    }

}