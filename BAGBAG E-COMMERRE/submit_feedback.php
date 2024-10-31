<?php
include'db.php';

// Retrieve form data
$full_name = $_POST['full_name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$feedback = $_POST['feedback'];
$agree = isset($_POST['agree']) ? 1 : 0; // Checkbox value

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback (full_name, phone_number, email, password, feedback, agree) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $full_name, $phone_number, $email, $password, $feedback, $agree);

// Execute the query
if ($stmt->execute()) {
    echo "Feedback submitted successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
