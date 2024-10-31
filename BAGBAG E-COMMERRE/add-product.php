<?php
// Include database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $brand = $_POST['brand'];
    $color = $_POST['color'];
    $measurement = $_POST['Measurement'];
    $material = $_POST['Material'];
    $product_details = $_POST['product_details'];
    $category_id = $_POST['category']; // Assuming this is the category ID, not the name
    $note = $_POST['note'];
    $stock = $_POST['stock'];
    $images = $_FILES['image'];

    // Insert product into the database
    $stmt = $conn->prepare("INSERT INTO products (name, description, price, product_details, color, material, measurement, brand, note, category_id, stock) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssiis", $name, $description, $price, $product_details, $color, $material, $measurement, $brand, $note, $category_id, $stock);
    $stmt->execute();
    $product_id = $conn->insert_id;

    // Loop through uploaded images and insert them into the product_images table
    foreach ($images['name'] as $key => $image_name) {
        $image_tmp = $images['tmp_name'][$key];
        $image_dir = "images/" . $image_name;
        move_uploaded_file($image_tmp, $image_dir);

        // Insert image into the product_images table
        $stmt = $conn->prepare("INSERT INTO product_images (product_id, image) VALUES (?, ?)");
        $stmt->bind_param("is", $product_id, $image_dir);
        $stmt->execute();
    }

    echo "Product added successfully!";
}
?>
