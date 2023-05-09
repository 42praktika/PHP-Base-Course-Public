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
            "CREATE TABLE if not exists cars (
                                     id serial primary key,
                                     state_number varchar(25),
                                     mark varchar(50),
                                     model varchar(50),
                                     typeId int,
                                     cost int,
                                     FOREIGN KEY (typeID) REFERENCES cars_type(id) ON DELETE CASCADE 
                        );"
        );

        parent::up();

    }

    function down()
    {
        $this->database->pdo->query(
            "DROP TABLE if exists cars"
        );
    }
}