<?php

namespace app\migrations;

use app\core\Migration;

class Migration_2 extends Migration
{

    public function getVersion(): int
    {
        return 2;
    }

    function up()
    {
        $this->database->pdo->query(
            "CREATE TABLE if not exists category
(
    id   serial     primary key,
    name varchar(50));
"
        );
        parent::up();
    }


    function down()
    {
        $this->database->pdo->query(
            "DROP TABLE if exists category"
        );
    }
}