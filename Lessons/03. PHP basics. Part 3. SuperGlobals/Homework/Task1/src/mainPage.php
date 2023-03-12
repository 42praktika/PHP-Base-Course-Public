<?php

declare(strict_types=1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($name === '' || $email === '' || $password === '' || strlen($name) > 20 || strlen($name) < 3
        || strlen($password) < 8) {
        header("Location: /failedRegister");
        header('Content-Length: 0');
        exit();
    }
}
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'mainPage.html';
