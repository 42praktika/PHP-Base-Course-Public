<?php

declare(strict_types=1);
//Можно прописать в php.ini session.auto_start = 1, чтобы не стартовать сессии каждый раз
session_start();

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'templates'.DIRECTORY_SEPARATOR.'mainForm.html';

