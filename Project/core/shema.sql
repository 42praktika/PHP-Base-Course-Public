CREATE TABLE if not exists users (
                                     id serial ,
                                     name varchar(50),
    username varchar(50) primary key ,
    email varchar(100),
    password varchar(50),
    isAdmin int);
CREATE TABLE if not exists category
(
    id   serial     primary key,
    name varchar(50));

CREATE TABLE if not exists product (
                                       id serial primary key,
                                       name varchar(50),
    image varchar,
    price int,
    title varchar,
    description varchar,
    categoryId int references category(id));

CREATE TABLE if not exists cart(
    login varchar  references users(username),
    productID int  references product(id),
    amount int);