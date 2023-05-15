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
                        name varchar(50),
                        username varchar(50),
                        email varchar(100),
                        password varchar(50),
                        isAdmin int(3)
                    );"
        );

        parent::up();

    }


    function down()
    {
        // do nothing
    }
}