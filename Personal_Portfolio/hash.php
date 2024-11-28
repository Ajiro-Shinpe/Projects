<?php
include 'config.php'; // Ensure this file sets up the $conn variable for your MySQL connection

// Password and other details
$username = "Adil khan";
$email = "adilismail7654321@gmail.com";
$password = "18052005";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare the SQL query
$sql = "INSERT INTO `admin` (`username`, `email`, `password`, `created_at`) VALUES (?, ?, ?, CURRENT_TIMESTAMP)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $hashed_password);

// Execute the query
if ($stmt->execute()) {
    echo "Admin user added successfully!";
} else {
    echo "Error: " . $stmt->error;
}
?>
