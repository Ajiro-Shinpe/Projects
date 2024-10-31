<header class="header">

   <section class="flex">

      <a href="add_product.php" class="logo"><img src="image/logo.webp"></a>

      <nav class="navbar">
         <a href="add_product.php"><i class="fas fa-plus"></i></a>
         <a href="view_products.php"><i class="fas fa-eye"></i></a>
         <?php 
            $count_total_cart_item = $conn->prepare("SELECT * FROM `cart` WHERE user_id=?");
            $count_total_cart_item->execute([$user_id]);
            $total_cart_item = $count_total_cart_item->rowCount();
         ?>
         <a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i> <sup><?=$total_cart_item; ?></sup></a>
      </nav>

   </section>

</header>
<div class="banner">
   <img src="image/0.jpg">
   <div class="text">
      <h1>Quality <span>Tea Production</span> <br> From The India.</h1>
      <p>Each tea purchase comes with organically and ethically grown loose theleaf tea, carefully blended to create the perfect cup.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
      <div class="flex-btn">
         <a href="add_product.php" class="btn">add product</a>
         <a href="view_products.php" class="btn">view products</a>
      </div>
   </div>
</div>