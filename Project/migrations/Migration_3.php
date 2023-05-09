<?php

namespace app\migrations;

class Migration_3 extends \app\core\Migration
{

    public function getVersion(): int
    {
        return 3;
    }

    function up()
    {
        $this->database->pdo->query(
            "INSERT INTO cars_type(type_name) VALUES 
                                     ('Седан'),
                                     ('Хэтчбек'),
                                     ('Кабриолет'),
                                     ('Джип'),
                                     ('Универсал')"
        );

        parent::up();

    }

    function down()
    {
        $this->database->pdo->query(
            "DELETE FROM cars_type"
        );
    }
}