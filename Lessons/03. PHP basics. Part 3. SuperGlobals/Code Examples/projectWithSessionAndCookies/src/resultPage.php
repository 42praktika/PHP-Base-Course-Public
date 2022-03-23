<?php

declare(strict_types=1);

//Можно прописать в php.ini session.auto_start = 1, чтобы не стартовать сессии каждый раз
session_start();
//Сохраняем в SESSION и COOKIE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullName = $_POST['full_name'] ?? '';
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($fullName === '' || $login === '' || $password === '') {
        $_SESSION['error'] = 'Не заполнены поля пользователя';
        header("Location: /");
        header('Content-Length: 0');
        exit();
    }

    $_SESSION['error'] = '';
    $userToken = createToken($fullName, $login);
    $_SESSION['user_list'][$userToken]['full_name'] = $fullName;
    $_SESSION['user_list'][$userToken]['login'] = $login;

    $_SESSION['user_list'][$userToken]['token'] = $userToken;
    $_SESSION['last_user'] = $userToken;

    //Установка cookie
    setcookie('last_user_token', $userToken, time() + 60 * 60 * 24 * 30, '/');

    //wtf
    $_SESSION['user_list'][$userToken]['password'] = $password;

    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'result.html';
} else {
    require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'result.html';
}

// From: https://dev.to/robdwaller/how-to-create-a-json-web-token-using-php-3gml
function createToken(string $userFullName, string $login): string
{
    // Create token header as a JSON string
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);

    // Create token payload as a JSON string
    $payload = json_encode(['full_name' => $userFullName, 'login' => $login]);

    // Encode Header to Base64Url String
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

    // Encode Payload to Base64Url String
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

    // Create Signature Hash
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);

    // Encode Signature to Base64Url String
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

    // Create JWT
    return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
}