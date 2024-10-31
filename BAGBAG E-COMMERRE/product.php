<?php
include 'db.php';
include 'header.php';

// Get the product ID from the URL
$product_id = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;

// Fetch product details from the `products` table and join `categories` table
$stmt = $conn->prepare("
    SELECT p.id, p.name, p.description, p.price, p.Brand, p.Product_Details, p.Color, p.Material, p.Measurement, p.Care_Instructions, p.note, c.name as category, p.stock 
    FROM products p 
    JOIN categories c ON p.category_id = c.id 
    WHERE p.id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();

// Check if product exists
if (!$product) {
    echo "Product not found!";
    exit;
}

// Fetch product images from the `product_images` table
$stmt = $conn->prepare("SELECT image FROM product_images WHERE product_id = ?");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$images = array();
while ($row = $result->fetch_assoc()) {
    $images[] = $row['image'];
}
?>

<div class="container">
    <div class="row">
        <!-- Product Image Slider Section -->
        <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12 mb-4">
            <div class="container">
                <!-- Full-width images with number text -->
                <?php foreach ($images as $key => $image): ?>
                <div class="mySlides">
                    <div class="numbertext"><?php echo $key + 1; ?> / <?php echo count($images); ?></div>
                    <img src="<?php echo htmlspecialchars($image); ?>" alt="Bag <?php echo $key + 1; ?>" class="img-fluid">
                </div>
                <?php endforeach; ?>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>

                <!-- Thumbnail images -->
                <div class="thumbnail-container">
                    <?php foreach ($images as $key => $image): ?>
                    <div class="thumbnail">
                        <img class="demo cursor" src="<?php echo htmlspecialchars($image); ?>" onclick="currentSlide(<?php echo $key + 1; ?>)" alt="Bag <?php echo $key + 1; ?>">
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Product Details Section -->
        <?php
// Existing PHP code to fetch product details
?>

<div class="col-xxl-7 col-xl-7 col-lg-7 col-md-7 col-sm-12 col-xs-12">
    <div class="product-text">
        <h2 class="product-title mb-3"><?php echo htmlspecialchars($product['name']); ?></h2>
        <h4 class="product-description my-2"><?php echo htmlspecialchars($product['description']); ?></h4>

        <div class="rating mb-3 d-flex justify-content-between align-items-center">
            <span class="product-brand">Brand: <?php echo htmlspecialchars($product['Brand']); ?></span>
            <div>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star">&nbsp;4.0 (32 reviews)</span>
            </div>
            <span class="product-rating-count">Rating: 351</span>
        </div>

        <div class="price mb-3">
            <h3 class="text-danger">Rs. <?php echo htmlspecialchars($product['price']); ?></h3>
        </div>

        <div class="product-details">
            <h3>Product Details</h3>
            <p><?php echo htmlspecialchars($product['Product_Details']); ?></p>

            <h5>Details</h5>
            <ul class="list-unstyled">
                <li><b>Color:</b> <?php echo htmlspecialchars($product['Color']); ?></li>
                <li><b>Material:</b> <?php echo htmlspecialchars($product['Material']); ?></li>
                <li><b>Measurement:</b> <?php echo htmlspecialchars($product['Measurement']); ?></li>
            </ul>

            <h5>Care Instructions:</h5>
            <p><?php echo htmlspecialchars($product['Care_Instructions']); ?></p>

            <h5>Note:</h5>
            <p><?php echo htmlspecialchars($product['note']); ?> Product color may slightly vary due to photographic lighting sources or your monitor settings.</p>

            <h5>Additional Information</h5>
            <ul class="list-unstyled">
                <li><b>Category:</b> <?php echo htmlspecialchars($product['category']); ?></li>
                <li><b>Stock:</b> <?php echo htmlspecialchars($product['stock']); ?></li>
                <li><b>Brand:</b> <?php echo htmlspecialchars($product['Brand']); ?></li>
            </ul>
        </div>

        <!-- Add to Cart and Buy Now Buttons -->
        <div class="product-actions d-flex justify-content-center align-items-center my-4 flex-wrap">
    <!-- Add to Cart Button -->
                        <button onclick="addToCart(<?php echo htmlspecialchars($product['id']); ?>)" class="btn btn-outline-light btn-lg py-3 px-5 m-1">Add To Cart</button>
    <!-- Buy Now Button -->
    <form action="order_form.php" method="post" class="ms-3 mt-3 mt-md-0">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        <button type="submit" name="buy_now" class="btn btn-outline-light btn-lg py-3 px-5 m-1">Buy Now</button>
    </form>
</div>
    </div>
</div>

    </div>
</div>

<?php
// Close the database connection
$conn->close();
include 'footer.php';
?>

<!-- Lightbox Script -->
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("demo");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
}
</script>

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
