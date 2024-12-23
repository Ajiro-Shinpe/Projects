@extends('frontend.layout.main')
@section('main-container')
         
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Carosel for home page -->
     
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{url('frontend/imgs/caro1.webp')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="{{url('frontend/imgs/car2.jpeg')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{url('frontend/imgs/caro3.webp')}}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<!-- For home pg -->



<center><h1> Elegence</h1></center>
<p style="text-align: center;">Welcome to Elegant, where beauty meets sophistication. At our salon, we are dedicated to providing a comprehensive range of top-quality services, including hair styling, facials, manicures, and pedicures. Our team of experienced professionals is passionate about enhancing your natural beauty and ensuring you leave feeling confident and refreshed. Whether you're here for a simple trim or a full day of pampering, Elegant is committed to delivering a luxurious and personalized experience in a serene and welcoming environment. Discover the difference at Elegant, where every detail is designed with your beauty and comfort in mind</p>
</body>


    <center><h1 class="text-warning mt-5">About Our Services</h1></center>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1 class="mt-3">Hair Styling</h1>
                <p>Experience the art of hair styling at our salon, where creativity meets precision. Whether you're looking for a fresh cut, a stunning new color, or an elegant updo, our skilled stylists are here to bring your vision to life. Let us help you express your unique style with a look that’s perfectly tailored to you.</p>

            </div>
            <div class="col-sm-12 col-md-6 mt-4">
                <img src="{{url('frontend/imgs/hair styling.jpg')}}" class="img-fluid"alt="image">

            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <img src="{{url('frontend/imgs/manicure.webp')}}" class="img-fluid"alt="image">
            </div>
            <div class="col-sm-12 col-md-6">
                <h1 class="mt-3">Manicure
                </h1>
                <p>Pamper your hands with our luxurious manicure services, designed to offer both beauty and care in every detail. From the moment you step into our salon, our skilled technicians will provide a personalized consultation to ensure your manicure is tailored to your preferences. Whether you're looking for a classic polish, a bold new look, or intricate nail art, we use only the finest products to achieve flawless results. Our manicure services go beyond aesthetics, incorporating nourishing treatments that hydrate and strengthen your nails and cuticles. As you unwind in our serene environment, you'll experience a soothing hand massage that revitalizes your skin and leaves your hands feeling soft and rejuvenated. Treat yourself to an indulgent escape that refreshes both your appearance and your spirit.</p>

            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h1 class="mt-3">Pedicure`</h1>
             <p>Indulge in the ultimate foot care with our rejuvenating pedicure services. Our treatments go beyond just aesthetics, providing soothing care that refreshes tired feet. Whether you need a quick refresh or a full spa experience, we ensure your feet feel as good as they look.</p>
            </div>
            <div class="col-sm-12 col-md-6">
                <img src="{{url('frontend/imgs/padicure.webp')}}" class="img-fluid"alt="image">

            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <img src="{{url('frontend/imgs/facial.webp')}}" class="img-fluid"alt="image">

            </div>
            <div class="col-sm-12 col-md-6">
                <h1 class="mt-3">Facial</h1>
                <p>Refresh and renew your skin with our tailored facial treatments. We use high-quality products to cleanse, exfoliate, and hydrate, leaving your skin glowing and revitalized. Whether you're looking to address specific skin concerns or just want to unwind, our facials offer the perfect blend of relaxation and results.</p>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <h1 class="text-center my-5 text-primary">Book Appointment Online & Addvance Payments</h1>
        <div class="card-group">
          <a href="{{ url('/Appointment') }}" class="card text-decoration-none">
          <img src="{{url('frontend/imgs/padicure.webp')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">pedi Cure</h5>
            <p class="card-text">1. Basic Pedicure: Trim, file, and polish - $25<br>
                2. Spa Pedicure: Trim, file, polish, and foot massage - $35<br>
                3. Deluxe Pedicure: Trim, file, polish, foot massage, and exfoliation - $45<br>
                4. Luxury Pedicure: Trim, file, polish, foot massage, exfoliation, and paraffin wax - $55</p>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary">Last updated 3 mins ago</small>
          </div>
        </a>
        <a href="{{ url('/Appointment') }}" class="card text-decoration-none">
            <img src="{{url('frontend/imgs/manicure.webp')}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">manicure</h5>
              <p class="card-text">
                1. Basic Manicure: Trim, file, and polish - $15<br>
                2. Spa Manicure: Trim, file, polish, and hand massage - $25<br>
                3. Gel Manicure: Gel polish application - $30<br>
                4. Nail Art Manicure: Custom nail art design - $40
                </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
          </a>
          <a href="{{ url('/Appointment') }}" class="card text-decoration-none">
            <img src="{{url('frontend/imgs/faciall2.webp')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Facial</h5>
            <p class="card-text">1. Express Facial: 15-minute basic facial - $30<br>
                2. Basic Facial: 30-minute facial - $50<br>
                3. Advanced Facial: 60-minute facial with exfoliation and mask - $90<br>
                4. Luxury Facial: 90-minute facial with advanced treatments - $120<br>
                </p>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary">Last updated 3 mins ago</small>
          </div>
        </a>
        <a href="{{ url('/Appointment') }}" class="card text-decoration-none">
          <img src="{{url('frontend/imgs/hair style.jpeg')}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Hair Styling</h5>
            <p class="card-text">1. Basic Style: Wash, cut, and style - $30 <br>
                2. Premium Style: Wash, cut, style, and hair treatment - $50<br>
                3. Bridal Style: Updo, styling, and hair accessories - $100<br>
                4. Kids' Style: Wash, cut, and style (ages 5-12) - $20</p>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary">Last updated 3 mins ago</small>
          </div>
        </div>
      </a>
    </div>
    
@endsection