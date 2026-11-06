<?php

function getDatabaseConnection(): PDO {

    $host = "localhost";
    $dbname = "php_assignment";
    $username = "root";
    $password = "";

    $pdo = new PDO(
        "mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
}