<?php

$host = "127.0.0.1";
$port = 5433;
$database = "phpbasic";
$user = "postgres";
$password = "42";

$conStr = sprintf("pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
    $host, $port, $database, $user, $password);

$pdo = new PDO($conStr);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
try {
    echo "create database result:", ($pdo->exec("CREATE TABLE students (
    student_id SERIAL,
firstname varchar(100) NOT NULL,
lastname varchar(100) NOT NULL,
PRIMARY KEY (student_id))"));

}
catch (Exception $exception) {
    echo  "Create database error: ", $exception;
}*/

try {
   /* $st = $pdo->prepare("INSERT INTO students (firstname,lastname) VALUES (?,?)");
    $st->execute(["Петр", "Иванов"]);
    $st->execute(["Иван", "Петров"]);*/

   /* $st1 = $pdo->prepare("INSERT INTO students (firstname,lastname) VALUES (:firstname,:lastname)");
    $st1 ->execute([":firstname"=>"Антон", ":lastname"=>"Сидоров"]); */
    $query = $pdo->prepare("SELECT s.firstname, s.lastname FROM students s WHERE s.lastname = :lastname");
    $query->execute( [":lastname"=>"Иванов"]);
    require_once "Student.php";
   /* $result = $query->fetchAll(PDO::FETCH_CLASS, Student::class, ["firstname", "lastname"] );*/
    while ($res = $query->fetch()) {
        echo $res["firstname"], " ", $res["lastname"], PHP_EOL;
    }
}
catch (Exception $exception) {
    echo  "Insert error: ", $exception;
}