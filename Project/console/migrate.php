<?php

use app\core\ConfigParser;
use app\core\Database;
use app\migrations\{Migration_0};
const PROJECT_ROOT = __DIR__."/../";
spl_autoload_register(function ($className) {
    require str_replace("app\\",PROJECT_ROOT, $className).".php";

});

//include '..\migrations\AllMigrations.php';
$migrations = [new Migration_0()];
//$migrations = getMigrations();
echo sprintf("Найдено %s миграций%s", count($migrations), PHP_EOL);

ConfigParser::load();
$database = new Database($_ENV["DB_DSN"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
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


