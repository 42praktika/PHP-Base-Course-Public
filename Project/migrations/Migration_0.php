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
            "create table users (
                   id bigserial primary key,
                   username varchar,
                   email varchar unique,
                   password varchar
                    );
                    create table products(
                         id bigserial primary key,
                         img varchar,
                         text varchar
                    );
                    create table wishlists(
                      id bigserial primary key,
                      user_id int references users(id),
                      title varchar
                    );
                    create table wishlists_entry(
                        list_id int references wishlists(id) on delete cascade,
                        product_id int references products(id) on delete cascade
                    );"
        );

      parent::up();

    }


    function down()
    {
        // do nothing
    }
}