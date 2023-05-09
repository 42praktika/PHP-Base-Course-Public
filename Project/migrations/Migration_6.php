<?php

namespace app\migrations;

use app\core\Migration;

class Migration_6 extends Migration
{

    public function getVersion(): int
    {
        return 6;
    }

    function up()
    {
        $this->database->pdo->query(

            "CREATE TABLE if not exists rental (
                                    id serial primary key,
                                    renter_email varchar(100),
                                    car_id int,
                                    rental_date varchar(50),
                                    number_of_days int,
                                    sum int,
                                    FOREIGN KEY (car_id) REFERENCES cars(id) ON DELETE CASCADE 
                        );"
        );

        parent::up();

    }
    function down()
    {
        $this->database->pdo->query(
            "DROP TABLE if exists rental"
        );
    }
}