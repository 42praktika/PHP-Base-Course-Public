<?php

declare(strict_types=1);

$pageInfo = match ($_SERVER["REQUEST_URI"]) {
    '/about' => 'О проекте',
    '/42' => '42 лаборатория',
    '/author' => 'Информация об авторах курса',
    default => 'Welcome to PHP project base page',
};

echo 'REQUEST URI: ' . $_SERVER["REQUEST_URI"] . '<br>';
echo $pageInfo;