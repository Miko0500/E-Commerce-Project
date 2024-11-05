<!DOCTYPE html>
<html>

<head>
  
@include('home.css')

<style type="text/css">
  /* footer section*/
.footer_section {
  margin-top: 45px;
  font-weight: 500;
}

.footer_section p {
  padding: 20px 0;
  margin: 0 auto;
  text-align: center;
  
  width: 80%;
}

.footer_section a {
  color: #cbc9c9;
}

/* end footer section*/
</style>

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

  <!-- shop section -->

  @include('home.all_staff')

  <!-- end shop section -->







  <!-- contact section -->

 

  <!-- end contact section -->

   

  <!-- info section -->
  <section class="info_section  layout_padding2-top">
    
    
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
      <p>
          &copy; <span id="displayYear"></span> Shee Auto Polish & Ceramic Coating
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>