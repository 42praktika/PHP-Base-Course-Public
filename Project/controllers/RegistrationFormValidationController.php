<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\core\Router;
use app\models\User;

class RegistrationFormValidationController
{

    public static function ValidateForm(array $data) : string {


        if($data["email"] == ""){
            return "Email mustn't be empty";
        }
        if (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            return "Invalid email";
        }
        if($data["nickname"] == "" ){
            return "Nickname mustn't be empty";
        }
        if( $data["password"] == ""){
            return "Password mustn't be empty";
        }
            $password = $data["password"];
            $cleared_password = trim($password);
            $cleared_password = stripslashes($cleared_password);
            $cleared_password = stripslashes($cleared_password);
            $cleared_password = htmlspecialchars($cleared_password);

            $cleared_password = preg_replace('/[^a-zA-ZА-Яа-я0-9]/','', $cleared_password);

            if($password !== $cleared_password){
                return "Invalid password";
            }
            if(strlen($password) < 10 || strlen($password) > 35){
                return "Password length must be in interval [10:35]";
            }

        return "ok";
    }

    public function handleView()
    {
        echo self::ValidateForm($_POST);
    }
}