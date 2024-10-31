<?php
include 'db.php';

// Query to retrieve all products with one image per product and their categories
$sql = "SELECT c.name AS category_name, p.id, p.name, pi.image 
        FROM products p 
        LEFT JOIN product_images pi ON p.id = pi.product_id 
        LEFT JOIN categories c ON p.category_id = c.id 
        GROUP BY p.id";

$result = $conn->query($sql);

// Display product list
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $name = $row['name'];
        $image = $row['image'];
        $category = $row['category_name'];
        echo "<div>";
        echo "<a href='product.php?id=$id'>";
        echo "<img src='$image' alt='$name'>";
        echo "<h2>$name</h2>";
        echo "<p>Category: $category</p>";
        echo "</a>";
        echo "</div>";
    }
} else {
    echo "No products found!";
}

// Close connection
$conn->close();
?>
