<?php

declare(strict_types=1);

//Простой роутинг с подключаемыми скриптами
switch ($_SERVER["REQUEST_URI"]) {
    case '':
    case '/':
        require_once __DIR__.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'register.php';
        break;
    case '/profile':
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'profile.php';
        break;
    default:
        http_response_code(404);
        require_once __DIR__.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'404.php';
}

