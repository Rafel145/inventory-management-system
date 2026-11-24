<?php
$host = 'localhost';
$dbname = 'nama_database';
$username = 'username_database';
$password = 'password_database';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname",
        $username,
        $password
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch(PDOException $e) {
    die("Database connection failed.");
}
?>