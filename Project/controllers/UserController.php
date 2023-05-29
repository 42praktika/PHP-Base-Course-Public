<?php

namespace app\controllers;

use app\core\Application;
use app\core\Response;
use app\exceptions\DBException;
use app\mappers\UserMapper;
use app\mappers\WishlistMapper;
use app\models\User;
use app\utils\UserValidator;

class UserController
{
    public function showUserWishlists(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            Application::$app->getRouter()->renderStatic("403.html");
            Application::$app->getResponse()->setStatusCode(Response::HTTP_FORBIDDEN);
            exit();
        }
        $user = $_SESSION["user"];
        $wishlistMapper = (new \app\mappers\WishlistMapper)->getInstance();
        try {
            $wishlists = $wishlistMapper->doSelectUserWishlists($user->getId());
            Application::$app->getRouter()->renderTemplate("userWishlists", ["post_action_add" => "addWishlist", "wishlists" => $wishlists, "open" => "wishlist", "main" => "mainPage"]);
        } catch (DBException $e) {
            Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
            ErrorController::showError("error", "mainPage");
        }
    }

    public function showProfile(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            Application::$app->getRouter()->renderStatic("403.html");
            Application::$app->getResponse()->setStatusCode(Response::HTTP_FORBIDDEN);
            exit();
        }
        $sessionUser = $_SESSION["user"];
        $userMapper = (new \app\mappers\UserMapper)->getInstance();
        try {
            $user = $userMapper->doSelect($sessionUser->getId());
            Application::$app->getRouter()->renderTemplate("profile", ["user" => $user, "action" => "editProfile", "main" => "mainPage"]);
        } catch (DBException $e) {
            Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
            ErrorController::showError("error", "mainPage");
        }
    }

    public function showEditProfileForm(): void
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            Application::$app->getRouter()->renderStatic("403.html");
            Application::$app->getResponse()->setStatusCode(Response::HTTP_FORBIDDEN);
            exit();
        }
        $sessionUser = $_SESSION["user"];
        $userMapper = (new \app\mappers\UserMapper)->getInstance();
        try {
            $user = $userMapper->doSelect($sessionUser->getId());
            Application::$app->getRouter()->renderTemplate("editProfile", ["action" => "edit", "user" => $user, "profile" => "profile"]);
        } catch (DBException $e) {
            Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
            ErrorController::showError("error", "profile");
        }
    }

    public function editProfile(): void
    {
        session_start();
        $sessionUser = $_SESSION["user"];
        $email = $sessionUser->getEmail();
        $userId = $sessionUser->getId();
        $password = $sessionUser->getPassword();

        $body = Application::$app->getRequest()->getBody();
        $newUsername = $body['username'];
        $newEmail = $body['email'];
        $oldPassword = $body['oldPassword'];
        $newPassword = $body['newPassword'];
        $rePassword = $body['rePassword'];
        $mapper = (new \app\mappers\UserMapper)->getInstance();

        if (empty($newUsername) || empty($newEmail)) {
            ErrorController::showError("FieldsMissingEditProfile", "editProfile");
        } else if (!$newEmail == $email) {
            try {
                if (!UserValidator::userExistsWithEmail($newEmail)) {
                    ErrorController::showError("EmailExists", "editProfile");
                }
            } catch (DBException $e) {
                Application::$app->getLogger()->error($e->getMessage(), ['exception' => $e]);
                ErrorController::showError("error", "profile");
            }
        } else if (!UserValidator::isValidEmail($newEmail)) {
            ErrorController::showError("InvalidEmail", "profile");
        } else if (!UserValidator::isValidUsername($newUsername)) {
            ErrorController::showError("InvalidUsername", "profile");
        } else if (!empty($newPassword) && !empty($rePassword) && !empty($oldPassword)) {
            if (!password_verify($oldPassword, $password)) {
                ErrorController::showError("InvalidOldPassword", "profile");
            } else if (!UserValidator::isPasswordsEquals($newPassword, $rePassword)) {
                ErrorController::showError("PasswordMismatch", "profile");
            } else if (!UserValidator::isValidPassword($password)) {
                ErrorController::showError("InvalidPassword", "profile");
            } else {
                $mapper->Update(new User(
                    $userId,
                    $newUsername,
                    $newEmail,
                    $newPassword
                ));
                header("Location: http://localhost:8080/profile");
                exit();
            }
        } else {
            $mapper->Update(new User(
                $userId,
                $newUsername,
                $newEmail,
                $password
            ));
            header("Location: http://localhost:8080/profile");
            exit();
        }
    }
}