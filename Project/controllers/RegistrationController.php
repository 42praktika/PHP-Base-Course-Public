<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;
use app\Project\core\Validator;

class RegistrationController
{

    public function getView()
    {
        session_start();

        Application::$app->getRouter()->renderTemplate("registration", ["postAction" => "doregistration"]);
    }

    public function handleView()
    {
        try {

            $body = Application::$app->getRequest()->getBody();
            $name = $body['name'];
            $username = $body['username'];
            $email = $body['email'];
            $password = $body['password'];
            $repassword = $body['repassword'];
            $_SESSION['username'] = $username;
            if (empty($username) || empty($name) || empty($email) || empty($password) || empty($repassword)) {
                echo '<p class="error">All fields must be filled in!</p>';
            } else if (!Validator::validUsername($username)) {
                echo '<p class="error">Username length should be from 3 to 30!</p>';
            } else if (Validator::userExists($username)) {
                echo '<p class="error">User with this username is exists already!</p>';
            } else if (!Validator::validEmail($email)) {
                echo '<p class="error">It is not an email!</p>';
            } else if (!Validator::passwordsEquals($password, $repassword)) {
                echo '<p class="error">Password not matched!</p>';
            } else if (!Validator::validPassword($password)) {
                echo '<p class="error">Password length should be from 5 to 30 and contain lowercase and uppercase letters and numbers!</p>';
            } else {
                $mapper = new UserMapper();
                $user = $mapper->createObject($body);
                $mapper->Insert($user);
                session_start();
                setcookie("SID", session_id(), time()+20*24*60*60);
                $_SESSION["username"] = $username;
                $_SESSION["isAdmin"] = $user->getIsAdmin();
                (new MainController)->getView();

            }
        } catch (\Exception $exception) {

            Application::$app->getLogger()->error($exception);

        }
    }
}
