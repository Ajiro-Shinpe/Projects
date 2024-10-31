<?php
// Include database connection
include 'db.php';
include 'header.php';

// Fetch category ID from URL
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// Fetch category name and products for the category
$query = "
    SELECT c.name as category_name, p.id, p.name, p.price, pi.image 
    FROM products p 
    JOIN product_images pi ON p.id = pi.product_id 
    JOIN categories c ON p.category_id = c.id 
    WHERE p.category_id = ? 
    GROUP BY p.id";
$stmt = $conn->prepare($query);
if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}
$stmt->bind_param("i", $category_id);
if (!$stmt->execute()) {
    die('Execute failed: ' . htmlspecialchars($stmt->error));
}
$result = $stmt->get_result();
$products = $result->fetch_all(MYSQLI_ASSOC);

// Fetch category name separately
$category_name_query = "SELECT name FROM categories WHERE id = ?";
$stmt = $conn->prepare($category_name_query);
$stmt->bind_param("i", $category_id);
$stmt->execute();
$category_result = $stmt->get_result();
$category = $category_result->fetch_assoc();
?>

<div class="container">
    <div class="row">
        <!-- Category Title -->
        <div class="col-12">
            <h1 class="category-title"><?php echo htmlspecialchars($category['name']); ?></h1>
        </div>

        <!-- Product Cards -->
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>

                <div class="col-xxl-3 col-lg-3 col-xl-3 col-md-3 col-sm-6 col-xs-12 col-xxs-12 card-grid">
    <a href="product.php?product_id=<?php echo htmlspecialchars($product['id']); ?>">
        <div class="product-card">
            <div class="product-image-container">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
            </div>
            <div class="product-info">
                <div class="product-title">
                    <span><?php echo htmlspecialchars($product['name']); ?></span>
                </div>
                <div class="product-price">
                    <span>Rs. <?php echo htmlspecialchars($product['price']); ?></span>
                </div>
                <div class="add-to-cart-button" 
                     data-tooltip="Price: Rs. <?php echo htmlspecialchars($product['price']); ?>"
                     onclick="addToCart(<?php echo htmlspecialchars($product['id']); ?>)">
                    <div class="button-wrapper">
                        <div class="button-text">Add To Cart</div>
                        <span class="button-icon">
                            <svg viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products found for this category.</p>
        <?php endif; ?>
    </div>
</div>

<?php
include 'footer.php';
?>

<script>
function addToCart(productId) {
    // Send an AJAX request to add the product to the cart
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_to_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onload = function () {
        if (xhr.status === 200) {
            // Redirect to cart.php after adding the product
            window.location.href = "cart.php";
        } else {
            console.error('Failed to add product to cart');
        }
    };

    xhr.send("product_id=" + productId);
}
</script>
