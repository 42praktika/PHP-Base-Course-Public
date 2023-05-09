<?php

namespace app\migrations;

use app\core\Migration;

class Migration_7 extends Migration
{

    public function getVersion(): int
    {
        return 7;
    }

    function up()
    {
        $this->database->pdo->query(
            "AlTER TABLE rental add end_date_of_rental varchar(50)"
        );

        parent::up();

    }

    function down()
    {
        $this->database->pdo->query(
            "ALTER TABLE rental drop column end_date_of_rental"
        );
    }
}