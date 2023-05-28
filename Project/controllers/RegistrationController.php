<?php
declare(strict_types=1);

namespace app\controllers;

use app\core\Application;
use app\exceptions\EmailAlreadyExistsException;
use app\mappers\UserMapper;

class RegistrationController
{

    public function getView(): void
    {
        Application::$app->getRouter()->renderTemplate("registration",
            ["registration_action"=>"registration",
                "main_action"=>"/"]);
    }

    public function register(): void
    {
        try {
            $body = Application::$app->getRequest()->getBody();
            $mapper = new UserMapper();
            $user = $mapper->createObject($body);
            if ($mapper->doSelectByEmail($user->getEmail())) {
                throw new EmailAlreadyExistsException();
            } else {
                $_SESSION["userId"] = $mapper->Insert($user)->getId();
                Application::$app->getRouter()->renderTemplate("success", ["profile_action"=>"profile"]);
            }
        }
        catch (EmailAlreadyExistsException $exception) {
            Application::$app->getRouter()->renderStatic("conflict.html");
        }
        catch (\Exception $exception) {
            Application::$app->getLogger()->error($exception);
        }
    }
}