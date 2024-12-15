  <style>
    /* Carousel height for consistency */
    .carousel-item img {
      height: 500px;
      object-fit: cover;
      border-radius: 10px;
    }

    /* Custom styling for carousel indicators */
    .carousel-indicators button {
      background-color: #fff;
      border-radius: 50%;
      width: 12px;
      height: 12px;
    }

    /* Styling for carousel controls */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: rgba(0, 0, 0, 0.5);
      border-radius: 50%;
      width: 40px;
      height: 40px;
    }

    /* Background overlay for captions */
    .carousel-caption {
      background: rgba(0, 0, 0, 0.5);
      border-radius: 10px;
      padding: 10px;
    }

    /* Hover effect on images */
    .carousel-item img:hover {
      transform: scale(1.05);
      transition: transform 0.5s ease;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .carousel-item img {
        height: 300px;
      }
    }
  </style>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://www.ezoic.com/wp-content/uploads/2020/12/7-tips-for-running-a-successful-forum-or-online-community.jpg" class="d-block w-100" alt="Slide 1">
      <div class="carousel-caption d-none d-md-block">
        <h5>Community Tips</h5>
        <p>Learn how to manage a successful online community.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://cdn3.vectorstock.com/i/1000x1000/37/02/internet-forum-concept-vector-21393702.jpg" class="d-block w-100" alt="Slide 2">
      <div class="carousel-caption d-none d-md-block">
        <h5>Interactive Forum</h5>
        <p>Engage in discussions with like-minded individuals.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeh9Vj1UbS6cE1GAE_oMgicKDM52_WBXBucbVRYWQfuoVDiPr9cjPIH21ntZYlykE2U28&usqp=CAU" class="d-block w-100" alt="Slide 3">
      <div class="carousel-caption d-none d-md-block">
        <h5>Global Connections</h5>
        <p>Join conversations from around the world.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
