<?php
session_start();

// Check if cart exists
if (isset($_SESSION['cart']) && isset($_POST['quantity'])) {
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$product_id]);
        } else {
            $_SESSION['cart'][$product_id]['quantity'] = intval($quantity);
        }
    }
}

// Redirect to cart page
header('Location: cart.php');
exit;
?>
