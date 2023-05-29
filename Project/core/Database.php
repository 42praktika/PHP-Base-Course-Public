<?php

namespace app\core;

use app\exceptions\DBException;
use PDO;
use PDOException;

class Database
{
    public PDO $pdo;

    /**
     * @throws DBException
     */
    public function __construct(string $dsn, string $user, string $password)
    {
        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            Application::$app->getLogger()->error('Error occurred while connecting to the database: ' . $e->getMessage());
            throw new DBException('Failed to connect to the database.', $e->getCode(), $e);
        }
    }
}