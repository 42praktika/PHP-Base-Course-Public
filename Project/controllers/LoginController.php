<?php
declare(strict_types=1);

namespace app\controllers;

use app\controllers\ajax\AJAX_LoginValidationController;
use app\core\Application;
use app\mappers\UserMapper;

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

        if(AJAX_LoginValidationController::ValidateForm($body) !== "ok"){
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
        header("Location: /");
    }

}