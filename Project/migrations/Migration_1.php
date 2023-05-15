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
            "CREATE TABLE if not exists product (
                        id serial primary key,
                        name varchar(50),
                        image varchar,
                        price int,
                        title varchar,
                        description varchar,
                        categoryId int references category(id));"
        );
        parent::up();
    }


    function down()
    {
        $this->database->pdo->query(
            "DROP TABLE if exists product "
        );
    }
}