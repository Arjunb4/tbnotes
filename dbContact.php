<?php
$host = "localhost";
$dbname = "contact"; // Change if using a different DB name
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password is empty

try {
    $pdo_contact = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo_contact->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
