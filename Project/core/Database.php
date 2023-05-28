<?php

namespace app\core;

use http\Exception\RuntimeException;
use MongoDB\Driver\Exception\ExecutionTimeoutException;
use PDO;
class Database
{
    public PDO $pdo;
    public function __construct(string $dsn, string $user, string $password)
    {
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

}
