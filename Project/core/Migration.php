<?php

namespace app\core;

abstract class Migration
{
    protected Database $database;

    public abstract function getVersion(): int;

    public function setDatabase(Database $database)
    {
        $this->database = $database;
    }

    function up()
    {
        $this->database->pdo->query("CREATE TABLE if not exists migrations (version int);");
        $this->database->pdo->query("DELETE FROM migrations;");
        $this->database->pdo->query("INSERT INTO migrations (version) values (" . $this->getVersion() . ");");
    }

    abstract function down();
}
