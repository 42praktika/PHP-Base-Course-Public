<?php

declare(strict_types=1);
//Можно прописать в php.ini session.auto_start = 1, чтобы не стартовать сессии каждый раз
session_start();
session_destroy();

echo 'Подчищаем сессию';
