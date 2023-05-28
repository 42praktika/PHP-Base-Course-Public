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
            "CREATE TABLE if not exists users (
                        id serial primary key,
                        title varchar(32),
                        email varchar(128),
                        password varchar(60)
                    );");


            $this->database->pdo->query(
                "CREATE TABLE if not exists manga (
                        id serial primary key,
                        title varchar(256),
                        description varchar(1024),
                        cover_image_path varchar(256),
                        author_name varchar(64),
                        rating_id int,
                        age_rating int,
                        chapter_list_id int,
                        release_date int,
                        genre varchar(64)
                    );");

        $this->database->pdo->query(
            "CREATE TABLE if not exists tags (
                        id serial primary key,
                        title varchar(32)
                    );");

        $this->database->pdo->query(
            "CREATE TABLE if not exists manga_tags (
                        manga_id int,
                        tag_id int,
                        FOREIGN KEY (manga_id) REFERENCES manga (id),
                        FOREIGN KEY (tag_id) REFERENCES tags (id)
                    );");

        $this->database->pdo->query(
            "CREATE TABLE if not exists admins (
                        id int,
                        FOREIGN KEY (id) REFERENCES users (id)
                    );");
        $this->database->pdo->query(
            "CREATE TABLE if not exists user_manga_lists (
                        user_id int,
                        manga_id int,
                        list_type varchar(16),
                        FOREIGN KEY (user_id) REFERENCES users (id),
                        FOREIGN KEY (manga_id) REFERENCES manga (id)
                    );");

      parent::up();

    }


    function down()
    {
        // do nothing
    }
}