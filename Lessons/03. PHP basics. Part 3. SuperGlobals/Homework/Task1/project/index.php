<?php

declare(strict_types=1);

//Возвращает файлы напрямую
if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
    return false;
}

//Простой роутинг с подключаемыми скриптами
switch ($_SERVER["REQUEST_URI"]) {
    case '':
    case '/':
        require_once __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'form.php';
        break;
    case '/about':
        require_once __DIR__.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'about.php';
        break;
    case '/result':
        require_once __DIR__.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'result.php';
        break;
    default:
        http_response_code(404);
        require_once __DIR__.DIRECTORY_SEPARATOR.'public'.DIRECTORY_SEPARATOR.'404.php';
}
