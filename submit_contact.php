<?php
require 'dbContact.php'; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $field = $_POST['field'];
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    try {
        // Insert data into the database
        $stmt = $pdo_contact->prepare("INSERT INTO contact_messages (name, phone, email, field, message) 
                                       VALUES (:name, :phone, :email, :field, :message)");
        $stmt->execute([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'field' => $field,
            'message' => $message
        ]);

        echo "Thank you! Your message has been submitted.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
