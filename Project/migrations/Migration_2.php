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
           "ALTER TABLE users ALTER COLUMN phone TYPE varchar(50)"
        );
        parent::up();
    }


    function down()
    {
        $this->database->pdo->query(
            "ALTER TABLE users DROP COLUMN phone"
        );
    }
}