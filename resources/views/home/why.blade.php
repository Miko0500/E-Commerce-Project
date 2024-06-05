<!DOCTYPE html>
<html>

<head>
@include('home.css')
<style>
    /* Custom CSS for card styling */
    .reason_section .card {
      border: none;
      transition: all 0.3s ease;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      overflow: hidden;
      margin-bottom: 20px;
      width: 300px;
      height: 300px;
    }

    .reason_section .card:hover {
      transform: translateY(-5px);
      box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
    }

    .reason_section .card-body {
      padding: 30px;
      text-align: center;
    }

    .reason_section .card-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
    }

    .reason_section .card-text {
      font-size: 16px;
      color: #666;
    }

    .reason_section .btn-primary {
      margin-top: 20px;
      border-radius: 20px;
      padding: 10px 30px;
      transition: all 0.3s ease;
    }

    .reason_section .btn-primary:hover {
      background-color: #007bff;
    }

    .reason_section .btn-primary i {
      margin-left: 5px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- Header Section -->
    @include('home.header')
    <!-- End Header Section -->

    <!-- Slider Section -->
    <!-- Your Slider Content Goes Here -->
    <!-- End Slider Section -->
  </div>
  <!-- End Hero Area -->

  <!-- Reason Section -->
  <section class="reason_section layout_padding">
    
    <div class="container">
    <div style="padding-bottom: 60px;" class="heading_container heading_center">
        <h2>
          Why Buy On Our Product?
        </h2>
      </div>
      <div class="row">
        <!-- Reason 1 -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Quality Products</h5>
              <p class="card-text">We offer only the highest quality products to ensure customer satisfaction.</p>
              <img class="slider-img" style="width:100px; height:100px" src="images/icon1.png" alt="" />
            </div>
          </div>
        </div>
        <!-- Reason 2 -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fast Shipping</h5>
              <p class="card-text">Enjoy fast and reliable shipping on all orders, so you can start enjoying your products sooner.</p>
              <img class="slider-img" style="width:100px; height:100px" src="images/icon2.png" alt="" />
            </div>
          </div>
        </div>
        <!-- Reason 3 -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Excellent Service</h5>
              <p class="card-text">Our dedicated customer service team is here to assist you with any questions or concerns.</p>
              <img class="slider-img" style="width:100px; height:90px" src="images/icon3.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Reason Section -->

  <!-- info section -->
  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> Crochet
          <a href="https://html.design/">With Us</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->

  <!-- Scripts -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
