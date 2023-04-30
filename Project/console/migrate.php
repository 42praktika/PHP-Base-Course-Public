<?php

use app\core\ConfigParser;
use app\core\Database;
const PROJECT_ROOT = __DIR__."/../";
spl_autoload_register(function ($className) {
    require str_replace("app\\",PROJECT_ROOT, $className).".php";

});

include '..\migrations\AllMigrations.php';
$migrations = getMigrations();
echo sprintf("Найдено %s миграций%s", count($migrations), PHP_EOL);

ConfigParser::load();
$database = new Database($_ENV["db"]["dsn"], $_ENV["db"]["user"], $_ENV["db"]["password"]);
try {
    $maxver = $database->pdo->query("SELECT max(version) FROM migrations")->fetch(PDO::FETCH_NUM)[0];
}
catch (\Exception $exception) {
    $maxver = -1;
}
echo sprintf("Максимальная миграция $maxver%s", PHP_EOL);

foreach ($migrations as $migration) {
    $migration->setDatabase($database);
    if ($migration->getVersion()>$maxver) {
        echo sprintf("Применяем миграцию %s%s", $migration->getVersion(), PHP_EOL);
        $migration->up();
    }
}


