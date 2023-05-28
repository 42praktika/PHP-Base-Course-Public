<?php

namespace app\controllers\ajax;

use app\mappers\UserMapper;

class AJAX_LoginValidationController
{
    public static function ValidateForm(array $data) : string {


        if(!isset($data["email"])){
            return "Email mustn't be empty";
        }
        if($data["email"] == ""){
            return "Email mustn't be empty";
        }
        $email = $data["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email";
        }
        if(!isset($data["password"])){
            return "Password mustn't be empty";
        }
        $password = $data["password"];
        if($password == ""){
            return "Password mustn't be empty";
        }


        $user = UserMapper::findUserByEmail($email);
        if($user == null){
            return "User with Email $email is not found";
        }
        if(!password_verify($password,$user->getPassword())){
            return "Wrong password";
        }


        return "ok";
    }
    public function handleView()
    {
        echo self::ValidateForm($_POST);
    }
}