<?php

$host = "localhost";
$dbname = "productsreview";
$dbusername = "root";
$dbpassword = "";
$port = 3307;

try {
    // Add port to the DSN string
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
