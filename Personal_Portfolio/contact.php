<?php
  include "./header.php";
?>
  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <!-- <h1>Contact</h1> -->
              <h1>Get in Touch</h1>
              <p class="mb-0">Ready to collaborate on your next project? I'd love to hear from you. Whether you have a question, need a quote, or just want to say hello, feel free to reach out.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
          <li><a href="./index.php">Home</a></li>
          <li class="current">Contact</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="icon bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>Federal B Area, Karachi, Pakistan</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Me</h3>
                <p>+92 315 8239299</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>adilismail7654321.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center" data-aos="fade-up" data-aos-delay="500">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Social Profiles</h3>
                <div class="social-links">
                  <a href="tel:+923158239299" target="_blank" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                  <a href="https://github.com/Ajiro-Shinpe" target="_blank" title="GitHub"><i class="bi bi-github"></i></a>
                  <a href="https://www.linkedin.com/in/adil-ismail-9498b2290/" target="_blank" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                  <a href="https://www.fiverr.com/adilismail271?up_rollout=true" target="_blank" title="Fiverr">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 1C5.925 1 1 5.925 1 12s4.925 11 11 11 11-4.925 11-11S18.075 1 12 1z"></path>
                      <text x="7" y="16" font-size="8" fill="currentColor">F</text>
                    </svg>
                  </a>
                  <a href="https://www.guru.com/freelancers/muhammad-adil-ismail" target="_blank" title="Guru">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="10"></circle>
                      <text x="6" y="16" font-size="8" fill="currentColor">Guru</text>
                    </svg>
                  </a>
                        </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>

<form action="./submitcontact.php" method="post" class="conact-form" >
  <div class="row gy-4">
    <div class="col-md-6">
      <input type="text" name="name" class="form-control" placeholder="Your Name" required>
    </div>
    <div class="col-md-6 ">
      <input type="email" class="form-control" name="email" placeholder="Your Email" required>
    </div>
    <div class="col-md-12">
      <input type="text" class="form-control" name="subject" placeholder="Subject" required>
    </div>
    <div class="col-md-12">
      <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
    </div>
    <div class="col-md-12 text-center">
      <button type="submit">Send Message</button>
    </div>
  </div>
</form>


      </div>

    </section><!-- /Contact Section -->

  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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