<?php
include 'components/connect.php';

if(isset($_POST['add_product'])){
    $id = create_unique_id();
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
    $stock = filter_var($_POST['stock'], FILTER_SANITIZE_STRING);

    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = create_unique_id().'.'.$ext;
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_files/'.$rename;

    if($image_size > 2000000 ){
        $warning_msg[] = 'Image size is too large!';
    }else{
        $insert_product = $conn->prepare("INSERT INTO `products`(id, name, price, stock, image) VALUES(?,?,?,?,?)");
        $insert_product->execute([$id, $name, $price, $stock, $rename]);
        move_uploaded_file($image_tmp_name, $image_folder);
        $success_msg[] = 'Product Added!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- Custom CSS file link -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Header section -->
<?php include 'components/header.php'; ?>

<!-- Add product section -->
<section class="add-product">
    <div class="heading">
        <h1>Add Product</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>

    <div class="form-container">
        <img src="image/tea2.png" class="cup" alt="Tea Cup Image">
        <img src="image/tea8.png" class="cup1" alt="Tea Cup Image">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Product Details</h3>
            <p>Product Name <span>*</span></p>
            <input type="text" name="name" required maxlength="50" placeholder="Enter product name" class="input">
            <p>Product Price <span>*</span></p>
            <input type="number" name="price" required maxlength="10" placeholder="Enter product price" min="0" max="9999999999" class="input">
            <p>Total Stock <span>*</span></p>
            <input type="number" name="stock" required maxlength="10" placeholder="Total products available" min="0" max="9999999999" class="input">
            <p>Product Image <span>*</span></p>
            <input type="file" required name="image" accept="image/*" class="input">
            <input type="submit" value="Add Product" name="add_product" class="btn">
        </form>
    </div>
</section>

<!-- SweetAlert CDN link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- Custom JS file link -->
<script src="js/script.js"></script>
<?php include 'components/alerts.php'; ?>

</body>
</html>
