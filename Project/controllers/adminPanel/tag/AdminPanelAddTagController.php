<?php

namespace app\controllers\adminPanel\tag;

use app\controllers\adminPanel\ajax\AJAX_VerifyTagNameController;
use app\core\Application;
use app\core\Response;
use app\core\validators\ValidateAdminAuth;
use app\exceptions\FileException;
use app\mappers\TagMapper;

class AdminPanelAddTagController
{
    public function handleView(): void
    {
        session_start();
        $validate_auth = new ValidateAdminAuth();
        $isAdmin = $validate_auth->Validate();
        if(!$isAdmin){
            return;
        }
        $body = Application::$app->getRequest()->getBody();

        $verifyResult = AJAX_VerifyTagNameController::ValidateForm($body);
        if($verifyResult !== "ok"){
            Application::$app->getRouter()->renderTemplate("error", ["error_code" => "400", "error_explanation" => "tag already exist"]);
        }

        $mapper = new TagMapper();

        $tag = $mapper->createObject($body);
        $mapper->Insert($tag);
        header("Location: http://localhost:8042/taglist");
    }
}