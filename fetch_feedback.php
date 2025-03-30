<?php
$servername = "localhost";
$username = "root";  // Change as needed
$password = "";
$dbname = "feedback"; // Change to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedback from the existing table
$sql = "SELECT name, image, feedback FROM feedback"; // Change 'feedback' to your actual table name
$result = $conn->query($sql);

$feedbacks = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $feedbacks[] = $row;
    }
}

// Return JSON response
echo json_encode($feedbacks);

$conn->close();
?>
