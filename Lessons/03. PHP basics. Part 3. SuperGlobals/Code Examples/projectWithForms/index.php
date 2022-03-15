<?php

declare(strict_types=1);

//Простой роутинг с подключаемыми скриптами
switch ($_SERVER["REQUEST_URI"]) {
    case '':
    case '/':
        require_once __DIR__.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'42.php';
        break;
    case '/author':
        require_once __DIR__.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'authors.php';
        break;
    default:
        http_response_code(404);
        require_once __DIR__.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'404.php';
}