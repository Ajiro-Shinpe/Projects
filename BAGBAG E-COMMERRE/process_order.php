<?php
session_start();
include 'db.php';

// Get POST data
$products = isset($_POST['products']) ? $_POST['products'] : [];
$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

foreach ($products as $product) {
    $product_id = intval($product['id']);
    $price = floatval($product['price']);
    $quantity = intval($product['quantity']);

    // Insert order details into the database
    $stmt = $conn->prepare("INSERT INTO orders (product_id, price, quantity, name, email, phone_number, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("idissss", $product_id, $price, $quantity, $name, $email, $phone_number, $address);
    $stmt->execute();
}

// Clear the cart
unset($_SESSION['cart']);

// Redirect or show confirmation
echo "<script>alert('Order has been placed successfully.');window.location.href='index.php';</script>";
?>
