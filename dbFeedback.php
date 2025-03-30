<?php
$host = "localhost";
$dbname = "feedback"; // Feedback database
$username = "root";
$password = "";

try {
    $pdo_feedback = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo_feedback->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
