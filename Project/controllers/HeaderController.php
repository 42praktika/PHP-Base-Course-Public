<?php

namespace app\controllers;

use app\core\Application;
use app\core\Template;

class HeaderController
{
    public static function getView(bool $authorised, array $user = []) : string
    {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        if(!$authorised){
            $header = Template::ReturnView("header.html", ["authorised" => HeaderController::$signInButton]);
            return $header;
        }
        $username = $user["username"];
        $userbutton = Template::ReturnView("_header_userbutton.html", ["username" => $username]);
        $header = Template::ReturnView("header.html", ["authorised" => $userbutton]);
        return $header;
    }

    private static string $signInButton = '<div class="horizontal-item">
                <button onclick="SetAuthContainerVisible()" class="button-login" id="header-login-button">Sign in</button>
            </div>';
}