<?php

namespace app\viewmodels\adminPanel;

use app\core\Template;
use app\viewmodels\HeaderViewModel;

class AdminHeaderViewModel
{
    public static function getView(bool $authorised, array $user = []) : string
    {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        if(!$authorised){
            $header = Template::ReturnView("adminPanel/adminHeader.html", ["authorised" => AdminHeaderViewModel::$signInButton]);
            return $header;
        }
        $username = $user["username"];
        $userbutton = Template::ReturnView("_header_userbutton.html", ["username" => $username]);
        $header = Template::ReturnView("adminPanel/adminHeader.html", ["authorised" => $userbutton]);
        return $header;
    }

    private static string $signInButton = '<div class="horizontal-item">
                <button onclick="SetAuthContainerVisible()" class="button-login" id="header-login-button">Sign in</button>
            </div>';
}