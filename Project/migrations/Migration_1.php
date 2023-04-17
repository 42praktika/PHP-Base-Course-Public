<?php

namespace app\migrations;

use app\core\Migration;

class Migration_1 extends Migration
{

    public function getVersion(): int
    {
     return 1;
    }

    function up()
    {
        $this->database->pdo->query(
           "ALTER TABLE users ADD COLUMN phone varchar(15)"
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