<?php
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Retrieve parameters from POST request
$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

// Default quantity
$quantity = 1;

// Add or update product in the cart
if ($product_id > 0) {
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += $quantity;
    } else {
        // Fetch product details from database (optional, depends on your needs)
        include 'db.php';
        $query = "SELECT name, price, image FROM products WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $product_result = $stmt->get_result();
        $product = $product_result->fetch_assoc();

        $_SESSION['cart'][$product_id] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'image' => $product['image'],
            'quantity' => $quantity
        ];
    }
}

// Send a response (optional, for debugging)
echo 'Product added to cart';
?>
