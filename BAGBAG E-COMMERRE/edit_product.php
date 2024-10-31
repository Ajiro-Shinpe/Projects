<?php
session_start();
include 'db.php'; // Ensure this includes your database connection
// include 'header.php'; // Include your header file

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Product ID is required.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input data
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $price = $_POST['price'];
    $product_details = htmlspecialchars($_POST['product_details']);
    $color = htmlspecialchars($_POST['color']);
    $material = htmlspecialchars($_POST['material']);
    $measurement = htmlspecialchars($_POST['measurement']);
    $brand = htmlspecialchars($_POST['brand']);
    $care_instructions = htmlspecialchars($_POST['care_instructions']);
    $note = htmlspecialchars($_POST['note']);
    $category = htmlspecialchars($_POST['category']);
    $stock = $_POST['stock'];
    $category_id = $_POST['category_id'];

    // Handle file upload
    $image = $_FILES['image']['name'];
    if ($image) {
        $target_dir = __DIR__ . "/path/to/images/";
        $image = basename($image);
        $target_file = $target_dir . $image;

        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $file_type = $_FILES['image']['type'];
        $max_file_size = 5000000; // 5MB

        if (in_array($file_type, $allowed_types) && $_FILES['image']['size'] <= $max_file_size) {
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0755, true);
            }
            
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                // File uploaded successfully
            } else {
                echo "Error uploading the file.";
                exit;
            }
        } else {
            echo "Invalid file type or file too large.";
            exit;
        }
    } else {
        // Retain existing image if no new image is uploaded
        $stmt = $conn->prepare("SELECT image FROM products WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $existing_image = $result->fetch_assoc()['image'];
        $image = $existing_image;
    }

    // Update product data
    $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, product_details=?, color=?, material=?, measurement=?, brand=?, care_instructions=?, image=?, note=?, category=?, stock=?, category_id=? WHERE id=?");
    $stmt->bind_param("ssssssssssssssi", $name, $description, $price, $product_details, $color, $material, $measurement, $brand, $care_instructions, $image, $note, $category, $stock, $category_id, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: manage_products.php");
        exit;
    } else {
        echo "No changes were made.";
    }
}
?>

<div class="container">
    <h1>Edit Product</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="product_details" class="form-label">Product Details</label>
            <textarea class="form-control" id="product_details" name="product_details" rows="3"><?php echo htmlspecialchars($product['product_details']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="color" value="<?php echo htmlspecialchars($product['color']); ?>">
        </div>
        <div class="mb-3">
            <label for="material" class="form-label">Material</label>
            <input type="text" class="form-control" id="material" name="material" value="<?php echo htmlspecialchars($product['material']); ?>">
        </div>
        <div class="mb-3">
            <label for="measurement" class="form-label">Measurement</label>
            <input type="text" class="form-control" id="measurement" name="measurement" value="<?php echo htmlspecialchars($product['measurement']); ?>">
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="<?php echo htmlspecialchars($product['brand']); ?>">
        </div>
        <div class="mb-3">
            <label for="care_instructions" class="form-label">Care Instructions</label>
            <textarea class="form-control" id="care_instructions" name="care_instructions" rows="3"><?php echo htmlspecialchars($product['care_instructions']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <textarea class="form-control" id="note" name="note" rows="3"><?php echo htmlspecialchars($product['note']); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            <?php if (!empty($product['image'])): ?>
                <img src="path/to/images/<?php echo htmlspecialchars($product['image']); ?>" alt="Product Image" style="max-width: 100px; margin-top: 10px;">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

<?php
include 'footer.php'; // Include your footer file
?>
