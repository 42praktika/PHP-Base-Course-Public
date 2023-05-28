<?php

namespace app\controllers\adminPanel\ajax;

use app\core\Application;
use app\core\validators\ValidateAdminAuth;
use app\mappers\TagMapper;

class AJAX_DeleteTagByTitleController
{
    public function handleView()
    {
        session_start();
        $validate_auth = new ValidateAdminAuth();
        $isAdmin = $validate_auth->Validate();
        if(!$isAdmin){
            return;
        }
        $body = Application::$app->getRequest()->getBody();

        $mapper = new TagMapper();
       $tagMixed = $mapper->SelectByTitle($body["title"]);
       $tag = $mapper->createObject($tagMixed);

       $mapper->Delete($tag);
       echo "ok";

    }
}