<?php

namespace app\core;

use PDO;

class Database
{
    public PDO $pdo;
    public function __construct(string $dsn, string $user, string $password)
    {
        $this->pdo = new PDO($dsn, $user, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $request = $this->pdo->prepare("SELECT * FROM users");
//        $request->execute();
//        $data = $request->fetch(PDO::FETCH_ASSOC);
//
//        foreach ($data as $el){
//            var_dump($el);
//        }
    }
}