<?php

namespace app\migrations;

use app\core\Migration;

class Migration_3 extends Migration
{

    public function getVersion(): int
    {
        return 2;
    }

    function up()
    {
        $this->database->pdo->query(
            "CREATE TABLE if not exists cart(
    login varchar  references users(username),
    productID int  references product(id),
    amount int);
"
        );
        parent::up();
    }


    function down()
    {
        $this->database->pdo->query(
            "DROP TABLE if exists cart"
        );
    }
}