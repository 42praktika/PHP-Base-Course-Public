<?php

namespace app\controllers\adminPanel;

use app\core\Application;
use app\core\validators\ValidateAdminAuth;
use app\mappers\TagMapper;
use app\mappers\UserMapper;
use app\viewmodels\adminPanel\AdminHeaderViewModel;
use app\viewmodels\adminPanel\AdminTagListItemViewModel;

class AdminPanelTagListController
{
    public function getView(): void
    {
        session_start();
        $validate_auth = new ValidateAdminAuth();
        $isAdmin = $validate_auth->Validate();
        if(!$isAdmin){
            return;
        }

        $user = UserMapper::findUserByID($_SESSION["userID"]);

        $header = AdminHeaderViewModel::getView(true, ["username"=>$user->getNickname()]);

        $tagMapper = new TagMapper();
        $tags = $tagMapper->SelectAll()->getNextRow();


        $tag_list_render = "";
        foreach ($tags as $tagModel){

            $tagView = AdminTagListItemViewModel::getView($tagModel);

            $tag_list_render.= $tagView.PHP_EOL;
        }

        Application::$app->getRouter()->renderTemplate("adminPanel/adminTagList", ["header"=>$header, "tag_list" => $tag_list_render]);
        // Application::$app->getRouter()->renderView("home");
        //Application::$app->getRouter()->renderTemplate("home");
    }
}