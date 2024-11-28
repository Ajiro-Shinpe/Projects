<?php
include "./header.php";
include "./config.php";

// Check if 'portfolio_id' is provided in the URL
if (isset($_GET['portfolio_id'])) {
    $portfolio_id = $_GET['portfolio_id'];

    // Use prepared statements to prevent SQL injection
    $sql = "SELECT p.*, c.name as category_name 
            FROM portfolio p
            LEFT JOIN category c ON p.category = c.id
            WHERE p.id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $portfolio_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        die("Portfolio not found.");
    }
}

// Fetch images for the specified portfolio using prepared statements
$query = "SELECT * FROM portfolio_images WHERE portfolio_id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $portfolio_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Fetch all results as an associative array
$portfolio_images = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Check if any images were returned
if (!$portfolio_images) {
    // Handle case where no images are found, maybe assign an empty array
    $portfolio_images = [];
}
?>

<!-- HTML content remains the same -->

<main class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1><?php echo htmlspecialchars($data['title']); ?></h1>
            <p class="mb-0"><?php echo htmlspecialchars($data['desc']); ?></p>
          </div>
        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="./index.php">Home</a></li>
          <li class="current">Portfolio Details</li>
        </ol>
      </div>
    </nav>
  </div><!-- End Page Title -->

  <!-- Portfolio Details Section -->
<!-- Portfolio Details Section -->
<section id="portfolio-details" class="portfolio-details section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">
      <div class="col-lg-8">
        <div class="portfolio-details-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>

          <div class="swiper-wrapper align-items-center">
              <br />
<?php if (isset($portfolio_images) && !empty($portfolio_images)) : ?>
    <?php foreach ($portfolio_images as $image) : ?>
        <?php
            $imgSrc = isset($image['image']) ? $image['image'] : 'default-image.jpg';
            $imgSrc = htmlspecialchars($imgSrc);
        ?>
        <div class="swiper-slide">
            <img src="<?php echo $imgSrc; ?>" alt="Portfolio Image" class="img-fluid" style="height: 600px;width: 100%; aspect-ratio:1/6; object-fit:contain;" loading="lazy">
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="swiper-slide">
        <img src="default-image.jpg" alt="No Images Available">
    </div>
<?php endif; ?>
            <!-- Swiper pagination -->
          </div>
          <div class="swiper-pagination"></div>

        </div>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
          <h3>Project Information</h3>
          <ul>
            <li><strong>Category:</strong> <?php echo htmlspecialchars($data['category_name']); ?></li>
            <li><strong>Project Date:</strong> <?php echo htmlspecialchars($data['date']); ?></li>
            <li><strong>Project URL:</strong>
              <a href="<?php echo htmlspecialchars($data['url']); ?>" target="_blank">
                <?php echo htmlspecialchars($data['url']); ?>
              </a>
            </li>
          </ul>
        </div>
        <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
          <h2><?php echo htmlspecialchars($data['title']); ?></h2>
          <p><?php echo htmlspecialchars($data['desc']); ?></p>
        </div>
      </div>
    </div>
  </div>
</section><!-- /Portfolio Details Section -->

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