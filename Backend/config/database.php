<?php

$host = "localhost";
$port = "5432";
$dbname = "upsa_internship_connect";
$username = "postgres";
$password = "PROTECT55";

try {

    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch (PDOException $e) {

    die("Database connection failed: " . $e->getMessage());

}

?>