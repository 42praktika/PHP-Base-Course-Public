<?php
declare(strict_types=1);

namespace app\controllers;

use app\controllers\ajax\AJAX_RegistrationFormValidationController;
use app\core\Application;
use app\mappers\UserMapper;

class RegisterController
{

    public function getView()
    {
        Application::$app->getRouter()->renderView("login");
    }

    public function handleView()
    {

        try{
            $body = Application::$app->getRequest()->getBody();

            $email = $body["email"];
            $password = $body["password"];

            if(AJAX_RegistrationFormValidationController::ValidateForm($body) !== "ok"){
                header("Location: /error");
                return;
            }

            if(strlen($password) < 10 || strlen($password) > 35){
                echo "Password length must be in interval [10:35]";
                return;
            }

            $userExist = UserMapper::findUserByEmail($body["email"]) != null;
            if($userExist){
                echo "User with Email $email is already registered";
                return;
            }

            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            $mapper->Insert($user);

            if(is_null($password) || is_null($email)){
                header("Location: /error");
                return;
            }

            if(!AJAX_RegistrationFormValidationController::ValidateForm($_POST)){
                header("Location: /error");
                return;
            }
            $this->login($email, $password);
        }
        catch (\Exception $exception){
            echo $exception;
        }

    }
    public function login(string $email, string $password)
    {
        if($email==null || $password == null){
            return;
        }
        session_start();
        setcookie("SID", session_id(), time()+20*24*60*60);
        $_SESSION["authorised"] = true;
        $_SESSION["userID"] = UserMapper::findUserByEmail($email)->getId();
        header("Location: /user");
        exit();
    }
}