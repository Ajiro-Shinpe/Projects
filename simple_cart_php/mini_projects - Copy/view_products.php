<?php

   include 'components/connect.php';
   if (isset($_POST['add_to_cart'])) {
      $id = create_unique_id();
      $product_id = $_POST['product_id'];
      $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);
      $qty = $_POST['qty'];
      $qty = filter_var($qty, FILTER_SANITIZE_STRING);

      $varify_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ? AND product_id = ?");
      $varify_cart->execute([$user_id, $product_id]);

      $max_cart_limit = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
      $max_cart_limit->execute([$user_id]);

      if ($varify_cart->rowCount() > 0) {
         $warning_msg[] = 'Already added to cart';
      }elseif($max_cart_limit-> rowCount() == 10){
         $warning_msg[] = 'Cart is full';
      }else{
         $select_p = $conn->prepare("SELECT * FROM `products` WHERE id = ?");
         $select_p->execute([$product_id]);
         $fetch_p = $select_p->fetch(PDO::FETCH_ASSOC);

         $total_stock = ($fetch_p['stock'] - $qty);
         if ($qty > $fetch_p['stock']) {
            $warning_msg[] = 'Only '.$fetch_p['stock'].' stock is left';
         }else{
            $insert_cart = $conn->prepare("INSERT INTO `cart`(id, user_id, product_id, qty) VALUES(?,?,?,?)");
            $insert_cart->execute([$id, $user_id, $product_id, $qty]);

            $update_stock = $conn->prepare("UPDATE `products` SET stock = ? WHERE id = ?");
            $update_stock->execute([$total_stock, $product_id]);
            $success_msg[] = 'Product added to cart';
         }
      }
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>view product</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/header.php'; ?>
<!-- header section ends -->

<!-- view products section starts  -->

<section class="view-products">
   <div class="heading">
      <h1>all products</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua.</p>
   </div>
   

   <div class="box-container">

   <?php
      $select_products = $conn->prepare("SELECT * FROM `products`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){         
   ?>
   <form action="" method="post" class="box <?php if($fetch_product['stock'] == 0){echo 'disabled';}; ?>">
      <input type="hidden" name="product_id" value="<?= $fetch_product['id']; ?>">
      <img src="uploaded_files/<?= $fetch_product['image']; ?>" alt="" class="image">
      <?php if ($fetch_product['stock'] > 9) { ?>
         <span class="stock" style="color: green;"><i class="fas fa-check" style="margin-right: .5rem;"></i>In Stock</span>
      <?php }elseif($fetch_product['stock'] == 0){ ?>
         <span class="stock" style="color: red;"><i class="fas fa-times" style="margin-right: .5rem;"></i>Out Of Stock</span>
      <?php }else{ ?>   
         <span class="stock" style="color: red;">Hurry, only <?= $fetch_product['stock']; ?>left</span>
      <?php } ?>
      <h3 class="name"><?= $fetch_product['name']; ?></h3>
      <div class="flex">
         <p class="price">$<?= $fetch_product['price']; ?>/-</p>
         <input type="number" name="qty" value="1" min="1" max="99" maxlength="2" required class="qty">
      </div>
      <?php if ($fetch_product['stock'] != 0) { ?>
         <div class="flex-btn">
            <a href="#" class="btn">buy now</a>
            <input type="submit" name="add_to_cart" value="add to cart" class="btn">
         </div>
      <?php }; ?>

      
   </form>
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>

   </div>

</section>

<!-- view products section ends -->

















<!-- sweetalert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php include 'components/alers.php'; ?>

</body>
</html>