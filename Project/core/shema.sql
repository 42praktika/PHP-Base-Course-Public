CREATE TABLE if not exists users
(
    id       serial,
    name     varchar(50),
    username varchar(50) primary key,
    email    varchar(100),
    password varchar(50),
    isAdmin  int
);
CREATE TABLE if not exists category
(
    id   serial primary key,
    name varchar(50)
);

CREATE TABLE if not exists product
(
    id          serial primary key,
    name        varchar(50),
    image       varchar,
    price       int,
    title       varchar,
    description varchar,
    categoryId  int references category (id)
);

CREATE TABLE if not exists cart
(
    username  varchar references users (username),
    productID int references product (id),
    amount    int
);

CREATE TABLE if not exists orders
(
    id        serial primary key,
    amount    int,
    number    varchar,
    price     int,
    productid int references product (id),
    userid    varchar references users (username)
);
