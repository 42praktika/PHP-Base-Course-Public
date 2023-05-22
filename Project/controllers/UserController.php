<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;
use app\mappers\WishlistMapper;

class UserController
{
    public function showUserWishlists():void
    {
    //TODO:юсера достать
        $wishlistMapper = new WishlistMapper();
        $wishlists = $wishlistMapper->doSelectUserWishlists(1);
        Application::$app->getRouter()->renderTemplate("userWishlists", ["post_action_add"=>"addWishlist","wishlists"=>$wishlists,"open"=>"wishlist","main"=>"mainPage"]);
    }

    public function showProfile():void
    {
        //TODO:достать юсера
        $userMapper = new UserMapper();
        $user = $userMapper->doSelect(1);
        Application::$app->getRouter()->renderTemplate("profile", ["user"=>$user, "action"=>"editProfile","main"=>"mainPage"]);
    }

    public function showEditProfileForm():void
    {
        //TODO:достать юсера
        $userMapper = new UserMapper();
        $user = $userMapper->doSelect(1);
        Application::$app->getRouter()->renderTemplate("editProfile", ["action"=>"edit","user"=>$user,"profile"=>"profile"]);
    }

    public function editProfile():void
    {

    }
}