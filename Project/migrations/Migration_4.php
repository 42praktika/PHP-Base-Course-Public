<?php

namespace app\migrations;

use app\core\Migration;

class Migration_4 extends Migration
{

    public function getVersion(): int
    {
        return 4;
    }

    function up()
    {
        $this->database->pdo->query(

            "CREATE TABLE if not exists reviews (
                                    id serial primary key,
                                    name_of_reviewer varchar(50),
                                    stars int,
                                    review varchar(250)
                        );"
        );

        parent::up();

    }
    function down()
    {
        $this->database->pdo->query(
            "DROP TABLE if exists reviews"
        );
    }
}