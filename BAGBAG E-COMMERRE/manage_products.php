<?php
session_start();
include 'db.php'; // Ensure this includes your database connection
include 'header.php'; // Include your header file
?>

<div class="container">
    <h1>Manage Products</h1>
    
    <!-- Fetch and display products data -->
    <?php
    // Fetch all products
    $stmt = $conn->prepare("SELECT * FROM products ORDER BY id DESC"); // Ordering by ID
    $stmt->execute();
    $products = $stmt->get_result();
    ?>
    
    <?php if ($products->num_rows > 0): ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($product = $products->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($product['id']); ?></td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['description']); ?></td>
                <td>Rs. <?php echo htmlspecialchars($product['price']); ?></td>
                <td>
                    <?php 
                    $imagePath = "images/" . htmlspecialchars($product['image']);
                    if (!empty($product['image']) && file_exists($imagePath)): ?>
                        <img src="<?php echo $imagePath; ?>" alt="Product Image" style="max-width:50px;height:50px;object-fit:contain;aspect-ratio:1/1;">
                    <?php else: ?>
                        No Image
                    <?php endif; ?>
                </td>
                <td>
                    <a href="edit_product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete_product.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No products found.</p>
    <?php endif; ?>

    <!-- Add Product Button -->
    <div class="mt-4">
        <a href="insert_product.php" class="btn btn-primary">Add New Product</a>
    </div>
</div>

<?php
include 'footer.php'; // Include your footer file
?>
