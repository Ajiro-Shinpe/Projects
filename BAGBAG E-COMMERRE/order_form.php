<?php
session_start();
include 'db.php';
include 'header.php';

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (empty($cart)) {
    echo "<p class='text-center mt-5'>Your cart is empty.</p>";
    include 'footer.php';
    exit;
}
?>

<div class="container mt-5">
    <h1 class="mb-4 text-center">Order Form</h1>
    
    <form  action="process_order.php" method="post">
        <?php foreach ($cart as $product_id => $product): 
            $stmt = $conn->prepare("SELECT p.name, p.price, pi.image FROM products p JOIN product_images pi ON p.id = pi.product_id WHERE p.id = ?");
            $stmt->bind_param("i", $product_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $product_data = $result->fetch_assoc();
            
            if ($product_data):
        ?>
        <div class="card mb-4">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo htmlspecialchars($product_data['image']); ?>" alt="<?php echo htmlspecialchars($product_data['name']); ?>" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($product_data['name']); ?></h5>
                        <p class="card-text">Price: Rs. <?php echo htmlspecialchars($product_data['price']); ?></p>
                        <p class="card-text">Quantity: <?php echo htmlspecialchars($product['quantity']); ?></p>
                        
                        <input type="hidden" name="products[<?php echo $product_id; ?>][id]" value="<?php echo htmlspecialchars($product_id); ?>">
                        <input type="hidden" name="products[<?php echo $product_id; ?>][price]" value="<?php echo htmlspecialchars($product_data['price']); ?>">
                        <input type="hidden" name="products[<?php echo $product_id; ?>][quantity]" value="<?php echo htmlspecialchars($product['quantity']); ?>">
                    </div>
                </div>
            </div>
        </div>
        <?php endif; endforeach; ?>
        
        <div class="card mt-5" style="height:auto;overflow:hiden;">
            <div class="card-body" >
                <h3 class="card-title mb-4">Your Details</h3>
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    <label for="name">Name</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number" required>
                    <label for="phone_number">Phone Number</label>
                </div>
                
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="address" name="address" placeholder="Address" style="height: 100px;" required></textarea>
                    <label for="address">Address</label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg w-100">Place Order</button>
            </div>
        </div>
    </form>
</div>

<?php
include 'footer.php';
?>
