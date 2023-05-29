<?php

namespace app\controllers;

use app\core\Application;
use app\mappers\UserMapper;
use app\utils\UserValidator;

class RegisterController
{
    public function getRegisterPage(): void
    {
        Application::$app->getRouter()->renderTemplate("registerPage", ["post_action_signin"=>"login", "post_action_signup"=>"register"]);
    }

    public function registerUser(): void
    {
        try {
            session_start();
            $body = Application::$app->getRequest()->getBody();
            $username = $body["username"];
            $email = $body['email'];
            $password = $body['password'];
            $confirmPassword = $body['confirmpassword'];

            if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
                ErrorController::showError("FieldsMissing","register");
            } else if (!UserValidator::isValidUsername($username)) {
                ErrorController::showError("InvalidUsername","register");
            } else if (!UserValidator::userExistsWithEmail($email)){
                ErrorController::showError("EmailExists","register");
            } else if (!UserValidator::isValidEmail($email)){
                ErrorController::showError("InvalidEmail","register");
            } else if (!UserValidator::isPasswordsEquals($password, $confirmPassword)){
                ErrorController::showError("PasswordMismatch","register");
            } else if (!UserValidator::isValidPassword($password)){
                ErrorController::showError("InvalidPassword","register");
            } else {
                $mapper = (new UserMapper)->getInstance();
                $user = $mapper->createObject($body);
                $mapper->Insert($user);
                $_SESSION["user"] = $user;
                header("Location: http://localhost:8080/mainPage");
                exit();
            }
        }
        catch (\Exception $e) {
            Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
        }
    }

    public function login(): void
    {
        try {
            session_start();
            $body = Application::$app->getRequest()->getBody();
            $email = $body['email'];
            $password = $body['password'];

            if (empty($email) || empty($password)) {
                ErrorController::showError("FieldsMissing","register");
            } else {
                $mapper = (new UserMapper)->getInstance();;
                $user = $mapper->doSelectUserByEmail($email);
                $hashedPassword = $user->getPassword();
                if (password_verify($password, $hashedPassword)){
                    $_SESSION['user'] = $user;
                    header("Location: http://localhost:8080/mainPage");
                    exit();
                } else {
                    ErrorController::showError("InvalidLoginCredentials","register");
                }
            }
        } catch (\Exception $e) {
            Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
        }
    }
}