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



    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          About Us  
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                <i class="fa fa-quote-right" aria-hidden="true"></i>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
                
              </div>
              <p>
              Perfect as a stylish accessory or a thoughtful gift, our crochet creations are both elegant and durable, showcasing the skill and artistry of our dedicated artisans.  </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                  We're Hooked on Handmade!
                  </h5>
                  <h6>
                    Crochet With Me
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              This sparked our mission: to build a welcoming space where anyone with a love for crochet can thrive.  Whether you're a seasoned crocheter looking to share your creations or a curious girl just starting out, we want to empower you to explore the wonderful world of crochet!
<p>
Values:  We believe in the power of handmade.  Each crocheted item is infused with creativity, skill, and a touch of personal magic. We strive to:
</p>
<p>
Support the Craft: By providing a platform for sellers, we want to celebrate the artistry of crochet and give it the spotlight it deserves.
</p>
<p>
Empower Creatives: We believe everyone should have the opportunity to share their talents and turn their passion into something special.
</p>
<p>
Foster a Community: Crochet is more than just crafting; it's about connection. We want to create a space where makers and crocheters of all ages can connect, inspire, and learn from each other.
</p>
<p>
Impact: We dream of a world where the beauty and tradition of crochet is cherished and embraced by a new generation. We want to see girls of all ages confidently express themselves through crochet,  whether it's creating something beautiful for themselves, a friend, or even starting their own creative journey.
</p>
</div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                  We're Hooked on Handmade!
                  </h5>
                  <h6>
                  Crochet With Me
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              Call to Action:  Join our hooked community! Explore our marketplace, share your passion, and get ready to be inspired!</p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

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


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>

</body>

</html>