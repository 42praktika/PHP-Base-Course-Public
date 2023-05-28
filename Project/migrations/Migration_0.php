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
                        nickname varchar(50),
                        email varchar(100),
                        password varchar(60)
                    );
                    CREATE TABLE if not exists roles (
                        id serial primary key,
                        rolename varchar(50)
                    );"
        );

      parent::up();

    }


    function down()
    {
        // do nothing
    }
}