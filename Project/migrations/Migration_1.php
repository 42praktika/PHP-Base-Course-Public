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

            "CREATE TABLE if not exists cars_type (
                                    id serial primary key,
                                    type_name varchar(50)
                        );"
        );

        parent::up();

    }
    function down()
    {
        $this->database->pdo->query(
            "DROP TABLE if exists cars_type"
        );
    }
}