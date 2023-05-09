<?php

namespace app\migrations;

use app\core\Migration;

class Migration_5 extends Migration
{

    public function getVersion(): int
    {
        return 5;
    }

    function up()
    {
        $this->database->pdo->query(

            "INSERT INTO cars(state_number, mark, model, typeid, cost) VALUES 
                                     ('н626нн', 'Renault', 'Logan Stepway', 1, 2550),
                                     ('к234св', 'Ford', 'Focus RS', 2, 2400),
                                     ('в777ор', 'Scoda', 'Octavia RS', 1, 3000),
                                     ('а234ыв','Toyota', 'Camry', 1, 3250),
                                     ('х666ам', 'BMW', '520i', 1, 3560),
                                     ('р116ус', 'Renault', 'Kaptur', 4, 3100),
                                     ('г384ос', 'BMW', '320 xDrive', 1, 4000),
                                     ('и765рс', 'Tesla', 'Model S', 5, 5000)"
        );

        parent::up();

    }
    function down()
    {
        $this->database->pdo->query(
            "DELETE FROM cars"
        );
    }
}