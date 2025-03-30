<?php
require 'dbFeedback.php'; // Ensure database connection file exists

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    try {
        $stmt = $pdo_feedback->prepare("INSERT INTO feedback (email, message) VALUES (:email, :message)");
        $stmt->execute(['email' => $email, 'message' => $message]);

        echo "Feedback submitted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

