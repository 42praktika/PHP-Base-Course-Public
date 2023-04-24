CREATE TABLE if not exists users(
    id serial primary key,
    nickname varchar(50),
    email varchar(256),
    password varchar(50)
);

CREATE TABLE if not exists migrations(
    version int
);

DELETE FROM migrations;

INSERT INTO migrations(version) values (0);