<?php
$host = "localhost";
$dbname = "practice_coding";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo("connection successful");  (this statement is just to check whether connection set up after connection setup comment out this statement)
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
