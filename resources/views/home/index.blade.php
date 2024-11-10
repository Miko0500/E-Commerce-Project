<!DOCTYPE html>
<html>

<head>
  
@include('home.css')

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

    @include('home.slider')

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  @include('home.product')

  <!-- end shop section -->
  <div id="bubble-container">
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
  <div class="bubble"></div>
</div>



  <!DOCTYPE html>
<html>

<head>
@include('home.css')
<style>
  /* Keyframes for sliding up animation */
  @keyframes slideUp {
    from {
      opacity: 0;
      transform: translateY(50px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Dark theme for the reason section */
  .reason_section {
    
    color: #000; /* Light text color */
    padding: 100px 0; /* Adjusted padding */
  }

  /* Card styling */
  .reason_section .card {
    border: none;
    transition: all 0.3s ease;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3); /* Darker shadow */
    border-radius: 15px; /* More rounded corners for a sleek look */
    overflow: hidden;
    margin-bottom: 30px; /* Increased margin for spacing */
    width: 100%;
    height: 350px; /* Adjusted height for a modern look */
    border: 3px solid #000; /* Neon blue border */
    border-radius: 15px;
            background: #fff;
    opacity: 0; /* Initially hidden */
    transform: translateY(50px); /* Initially moved down */
  }

  .reason_section .card.show {
    animation: slideUp 1.5s ease-out forwards; /* Apply animation */
  }

  .reason_section .card-body {
    padding: 30px;
    text-align: center;
  }

  .reason_section .card-title {
    font-size: 26px; /* Larger font size for titles */
    font-weight: 700; /* Bolder text */
    margin-bottom: 20px;
    color: #000; /* Futuristic neon blue */
  }

  .reason_section .card-text {
    font-size: 18px; /* Slightly larger font size */
    color: #000; /* Light gray for text */
  }

  .reason_section .card-body img {
    width: 120px; /* Uniform image size */
    height: 120px; /* Uniform image height */
    object-fit: contain;
    margin-top: 20px;
  }

  .reason_section .btn-primary {
    margin-top: 20px;
    border-radius: 25px; /* Rounded button */
    padding: 10px 30px;
    background-color: #000; /* Neon blue background */
    color: #000000; /* Dark text color for contrast */
    transition: all 0.3s ease;
    border: 2px solid #000; /* Border matching the background */
  }

  .reason_section .btn-primary:hover {
    background-color: #ffffff; /* Light background on hover */
    color: #000; /* Matching text color */
    border: 2px solid #ffffff; /* Light border on hover */
  }
  
</style>
</head>

<body>
  <div class="hero_area">
    <!-- Header Section -->
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
      <a class="navbar-brand" href="index.html">
      <span style="font-size: 40px;
  font-weight: 600;
  margin: 0;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: #000;
padding: 10px;
padding-top: -100px;
margin-top: -60px;">WHY OUR SERVICES?</span>
    </a>
      </div>
      <div class="row">
        <!-- Reason 1 -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Quality Products</h5>
              <p class="card-text">We offer only the highest quality products to ensure customer satisfaction.</p>
              <img class="slider-img" src="images/icon1.png" alt="" />
            </div>
          </div>
        </div>
        <!-- Reason 2 -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Fast Shipping</h5>
              <p class="card-text">Enjoy fast and reliable shipping on all orders, so you can start enjoying your products sooner.</p>
              <img class="slider-img" src="images/icon2.png" alt="" />
            </div>
          </div>
        </div>
        <!-- Reason 3 -->
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Excellent Service</h5>
              <p class="card-text">Our dedicated customer service team is here to assist you with any questions or concerns.</p>
              <img class="slider-img" src="images/icon3.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Reason Section -->

  <!-- Scripts -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>

  <script>
    function handleScroll() {
      const cards = document.querySelectorAll('.reason_section .card');
      const triggerBottom = window.innerHeight;

      cards.forEach(card => {
        const cardTop = card.getBoundingClientRect().top;

        if (cardTop < triggerBottom) {
          card.classList.add('show');
        } else {
          card.classList.remove('show');
        }
      });
    }

    window.addEventListener('scroll', handleScroll);
    window.addEventListener('load', handleScroll);
  </script>
</body>

</html>








<!DOCTYPE html>
<html>

<head>

@include('home.css')

<style>
  /* Smooth fade transition for carousel items */
  .carousel-fade .carousel-item {
    opacity: 0;
    transition-property: opacity;
    transition-duration: .5s; /* Adjust the duration for the fade effect */
    transition-timing-function: ease-in-out; /* Smooth in and out */
  }

  .carousel-fade .carousel-item.active {
    opacity: 1;
  }

  .carousel-fade .carousel-item-next,
  .carousel-fade .carousel-item-prev,
  .carousel-fade .carousel-item.active,
  .carousel-fade .carousel-item-next.active,
  .carousel-fade .carousel-item-prev.active {
    display: block;
    transition: opacity .5s ease-in-out; /* Consistent fade transition */
  }

  /* General Styles for the Client Section */
  .client_section {
    padding: 60px 0;
    
  }

  .heading_container h2 {
    font-size: 36px;
    color: #000;
    font-family: 'Arial', sans-serif; /* Modern font */
    margin-bottom: 40px;
  }

  /* Styling for carousel items */
  .carousel-inner {
    position: relative;
  }

  .box {
    background: rgb(37, 35, 35);
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
    position: relative;
    overflow: hidden;
    border: 3px solid #000; /* Neon blue border */
    border-radius: 15px;
            background: #fff;
    transition: transform 0.4s ease-in-out; /* Add scale effect on hover */
  }

  .box:hover {
    transform: scale(1.02); /* Scale up slightly on hover */
  }

  .client_info {
    text-align: center;
    margin-bottom: 20px;
  }

  .client_name  {
    font-size: 60px;
    color: #000; /* Futuristic neon blue */
  }

  .client_name i {
    font-size: 60px;
    color: #000; /* Futuristic neon blue */
  }

  .client_name h5 {
    font-size: 32px;
    color: #000; /* Futuristic neon blue */
    margin-bottom: 10px;
    font-weight: bold;
  }

  .client_name h6 {
    font-size: 20px;
    color: #000; /* Futuristic neon blue */
    font-style: italic;
  }

  .box p {
    font-size: 18px;
    color: #000;
    line-height: 1.8;
    margin-bottom: 10px;
  }

  /* Overlay effect for carousel items */


  /* Style for carousel buttons */
  .carousel-control-prev, .carousel-control-next {
    width: 7%;
  }

  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    background-color: #000; /* Futuristic neon blue */
    border-radius: 50%;
    padding: 10px;
  }
</style>

</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->

    <!-- end header section -->
    <!-- slider section -->

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
      <a class="navbar-brand" href="index.html">
      <span style="font-size: 40px;
  font-weight: 600;
  margin: 0;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: #000;
padding: 10px;
padding-top: -100px;
margin-top: -60px;">ABOUT US</span>
    </a>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
              <div class="client_name">
                  <h5 style="color: #000;">
                  We're experts in:
                  </h5>
                  
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p class="card-text">Auto Polish:  We use premium polish to remove scratches, swirl marks, and other imperfections, restoring your car's original luster.</p>
                            <p class="card-text">Ceramic Coating:  Our ceramic coating provides long-lasting protection against the elements, UV rays, and scratches, keeping your car looking new for longer.</p>
                            
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                <h5 style="color: #000;">
                We cater to:
                  </h5>
                  
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p class="card-text">We cater to a variety of vehicles, specializing in motorcycles, tricycles, and cars. Our services are designed to be fast and efficient:</p>
                            <p class="card-text">Motorcycles & Tricycles:  In and out in just 10 minutes!</p>
                            <p class="card-text">Cars:  Get that showroom shine in 30 minutes!</p>
                            
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                <h5 style="color: #000;">
                Our commitment:
                  </h5>
                 
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p class="card-text">Our commitment to customer satisfaction is at the heart of everything we do. We strive to provide a friendly and professional service, ensuring your vehicle receives the best possible care.</p>
                            
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
    <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev" style="
        width: 40px; 
        height: 40px; 
        background-color: #000; /* Neon blue background color */
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%; /* Makes the button round */
        font-size: 18px;
        text-decoration: none;
    ">
        <i class="fa fa-angle-left" aria-hidden="true"></i>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next" style="
        width: 40px; 
        height: 40px; 
        background-color: #000; /* Neon blue background color */
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%; /* Makes the button round */
        font-size: 18px;
        text-decoration: none;
    ">
        <i class="fa fa-angle-right" aria-hidden="true"></i>
        <span class="sr-only">Next</span>
    </a>
</div>

      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- end info section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="js/custom.js"></script>

  <script>
    $(document).ready(function () {
      $('#customCarousel2').carousel({
        interval: 3500, // Set your desired interval (in milliseconds)
        pause: "hover" // Pause on hover
      });
    });
  </script>

  

</body>

</html>





  <!-- contact section -->

  @include('home.contact')

  <!-- end contact section -->

   

  <!-- info section -->
@include('home.footer')

</body>

</html>