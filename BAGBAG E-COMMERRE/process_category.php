<?php
session_start();
include 'db.php'; // Ensure this file contains your database connection code

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'insert') {
        // Handle category insertion
        $name = $_POST['category_name'];
        $image = $_FILES['category_image']['name'];

        if ($image) {
            $target = 'images/' . basename($image);
            move_uploaded_file($_FILES['category_image']['tmp_name'], $target);
        }

        $stmt = $conn->prepare("INSERT INTO categories (name, image) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $image);
        $stmt->execute();
        $stmt->close();

    } elseif ($action == 'update') {
        // Handle category update
        $category_id = $_POST['category_id'];
        $update_name = $_POST['update_category_name'];
        $update_image = $_FILES['update_category_image']['name'];

        if ($update_image) {
            $target = 'images/' . basename($update_image);
            move_uploaded_file($_FILES['update_category_image']['tmp_name'], $target);
        }

        $stmt = $conn->prepare("UPDATE categories SET name = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssi", $update_name, $update_image, $category_id);
        $stmt->execute();
        $stmt->close();

    } elseif ($action == 'delete') {
        // Handle category deletion
        $category_id = $_POST['category_id'];

        // Check if category is used in products
        $stmt = $conn->prepare("SELECT * FROM products WHERE category_id = ?");
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "Category cannot be deleted because it is referenced in products.";
        } else {
            $stmt = $conn->prepare("DELETE FROM categories WHERE id = ?");
            $stmt->bind_param("i", $category_id);
            $stmt->execute();
            $stmt->close();
        }
    }

    header('Location: manage_categories.php');
    exit();
}

$conn->close();
?>