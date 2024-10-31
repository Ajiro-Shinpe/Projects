<?php
include 'db.php';

// Retrieve form data
$full_name = $_POST['full_name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$state = $_POST['state'];
$comment = $_POST['comment'];
$agree = isset($_POST['agree']) ? 1 : 0; // Checkbox value

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contact_us (full_name, phone_number, email, password, address, address2, city, zip, state, comment, agree) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssi", $full_name, $phone_number, $email, $password, $address, $address2, $city, $zip, $state, $comment, $agree);

// Execute the query
if ($stmt->execute()) {
    echo "Message sent successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
