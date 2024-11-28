<?php
  include "./header.php";
  include "./config.php";
?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Portfolio</h1>
              <p class="mb-0">Welcome to my portfolio! Explore my projects and experiences, showcasing my skills and passion for innovative solutions.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="./index.php">Home</a></li>
            <li class="current">Portfolio</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <?php
              $cat_list = "SELECT * FROM `category`";
              $cat_result = mysqli_query($conn, $cat_list);
              if($cat_result -> num_rows > 0){
                while($cat_data = $cat_result -> fetch_assoc()){
                  ?>
                  <li data-filter=".<?php echo $cat_data['name']?>"><?php echo $cat_data['name']?></li>
                  <?php
                }
              }
            ?>

          </ul><!-- End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          <?php
$sql = "
SELECT p.*, pi.image AS cover_image, c.name AS category_name
FROM portfolio p
JOIN portfolio_images pi ON p.id = pi.portfolio_id AND pi.is_cover = 1
JOIN category c ON p.category = c.id
";
$portfolio_run = mysqli_query($conn, $sql);

if ($portfolio_run && $portfolio_run->num_rows > 0) {
while ($portfolio_data = mysqli_fetch_assoc($portfolio_run)) {
    ?>
    <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?= $portfolio_data['category_name']; ?>">
        <div class="portfolio-content h-100">
            <img src="<?= $portfolio_data['cover_image']; ?>" class="img-fluid" alt="">
            <div class="portfolio-info">
                <h4><?= $portfolio_data['title']; ?></h4>
                <p><?= $portfolio_data['category_name']; ?></p>
                <a href="<?= $portfolio_data['cover_image']; ?>" title="<?= $portfolio_data['title']; ?>" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="./portfolio-details.php?portfolio_id=<?= $portfolio_data['id']; ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>

            </div>
        </div>
    </div>
    <?php
}
} else {
echo "No portfolio data found";
}

?>



          </div><!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->

  </main>


  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>