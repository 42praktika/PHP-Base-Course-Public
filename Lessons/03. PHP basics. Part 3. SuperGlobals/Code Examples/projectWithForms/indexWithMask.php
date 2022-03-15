<?php

declare(strict_types=1);

/*
 * URI – имя и адрес ресурса в сети, включает в себя URL и URN
 * URL – адрес ресурса в сети, определяет местонахождение и способ обращения к нему
 * URN – имя ресурса в сети, определяет только название ресурса, но не говорит как к нему подключиться
 */
$uriParts = parse_url($_SERVER["REQUEST_URI"]);

switch ($uriParts['path'] ?? '') {
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