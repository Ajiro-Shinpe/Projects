<?php
session_start();
include 'db.php';
include 'header.php';
?>

<div class="container">
    <h1 class="fs-1">Admin Panel</h1>
    <h3 class="text-white">Mange All Actions</h3>
    <div class="button-container"> 
    <!-- Product Management Button -->

    <div>
        <a href="insert_product.php" class="btn btn-primary">Insert Products</a>
    </div>
    <div>
        <a href="manage_products.php" class="btn btn-primary">Manege Products</a>
    </div>
    
    <!-- Category Management Button -->
    <div>
        <a href="manage_categories.php" class="btn btn-primary">Manage Categories</a>
    </div>
    
    <!-- Feedback Management Button -->
    <div>
        <a href="manage_feedback.php" class="btn btn-primary">Manage Feedbacks</a>
    </div>
    
    <!-- Contact Us Management Button -->
    <div>
        <a href="manage_contacts.php" class="btn btn-primary">Manage Contact Queries</a>
    </div>
</div>
    <!-- Orders Section -->
    <h2>All Orders</h2>
    <?php
    // Fetch all orders
    $stmt = $conn->prepare("SELECT o.id, o.product_id, p.name as product_name, o.price, o.quantity, o.name as customer_name, o.email, o.phone_number, o.address, o.order_date 
                            FROM orders o 
                            JOIN products p ON o.product_id = p.id
                            ORDER BY o.order_date DESC");
    $stmt->execute();
    $orders = $stmt->get_result();
    ?>
    
    <?php if ($orders->num_rows > 0): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Customer Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($order = $orders->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($order['id']); ?></td>
                <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                <td>Rs. <?php echo htmlspecialchars($order['price']); ?></td>
                <td><?php echo htmlspecialchars($order['quantity']); ?></td>
                <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                <td><?php echo htmlspecialchars($order['email']); ?></td>
                <td><?php echo htmlspecialchars($order['phone_number']); ?></td>
                <td><?php echo htmlspecialchars($order['address']); ?></td>
                <td><?php echo htmlspecialchars($order['order_date']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>
    
</div>

<?php
include 'footer.php';
?>
