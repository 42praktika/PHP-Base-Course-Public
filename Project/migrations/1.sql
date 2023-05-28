CREATE TABLE if not exists login_user(
                                    id serial primary key,
                                    login varchar,
                                    password varchar,
                                    email varchar
);

CREATE TABLE if not exists migrations(
    version int
);

INSERT INTO migrations(version) values (1);