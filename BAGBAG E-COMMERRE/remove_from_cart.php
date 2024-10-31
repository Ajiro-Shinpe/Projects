<?php
session_start();

// Check if cart exists
if (isset($_SESSION['cart'])) {
    $product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
    
    if ($product_id > 0) {
        // Remove product from cart
        unset($_SESSION['cart'][$product_id]);
        
        // Redirect back to cart page
        header('Location: cart.php');
        exit;
    }
}

// Redirect to cart if no product ID is provided
header('Location: cart.php');
exit;
?>
