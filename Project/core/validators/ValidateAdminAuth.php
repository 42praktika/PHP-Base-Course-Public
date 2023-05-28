<?php

namespace app\core\validators;

use app\core\Application;

class ValidateAdminAuth
{
    public function Validate() : bool{
        $authorised = false;

        $userID = isset($_SESSION["userID"]);
        if($userID) $authorised = true;

        if(!$authorised){

            Application::$app->getRouter()->renderTemplate("error", ["error_code"=>"403", "error_explanation" => "You have no access"]);
            return false;
        }

        $userID = Application::$database->pdo->prepare("SELECT * FROM admins WHERE id=:id");

        if(is_null($userID)){
            Application::$app->getRouter()->renderTemplate("error", ["error_code"=>"403", "error_explanation" => "You have no access"]);
            return false;
        }
        return true;
    }
}