<?php

namespace app\controllers\adminPanel\ajax;

use app\mappers\TagMapper;

class AJAX_VerifyTagNameController
{
    public static function ValidateForm(array $data) : string {

        if(!isset($data["title"])){
            return "Tag name must not be empty";
        }
        if($data["title"] == ""){
            return "Tag name must not be empty";
        }
        $tagname = $data["title"];
        $cleared_tagname = stripslashes($tagname);
        $cleared_tagname = htmlspecialchars($cleared_tagname);
        $cleared_tagname = ltrim($cleared_tagname);
        $cleared_tagname = rtrim($cleared_tagname);


        if($tagname !== $cleared_tagname){
            return "Invalid Tag name";
        }
        if(strlen($tagname) < 1 || strlen($tagname) > 32){
            return "Tag name length must be in interval [1:32]";
        }
        $mapper = new TagMapper();
        $tag = $mapper->SelectByTitle($tagname);

        if($tag != null){
            return "Tag $tagname already exist";
        }

        return "ok";
    }
    public function handleView(): void
    {
        echo self::ValidateForm($_POST);
    }
}