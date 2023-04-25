<?php

namespace app\migrations;

use app\core\Migration;

class Migration_0 extends Migration
{

    public function getVersion(): int
    {
     return 0;
    }

    function up()
    {
        $this->database->pdo->query(
            "CREATE TABLE if not exists users (
                        id serial primary key,
                        first_name varchar(50),
                        second_name varchar(50),
                        age int,
                        job varchar(300),
                        email varchar(100)
                    );"
        );

      parent::up();

    }


    function down()
    {
        // do nothing
    }
}