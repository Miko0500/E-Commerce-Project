<style>
  .slider-img:hover {
    transform: scale(1.1); /* Scale up the image by 5% on hover */
    transition: transform 0.5s ease; /* Add a smooth transition effect */
  }
</style>


<section class="slider_section">
  <div class="slider_container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-7">
                <div class="detail-box"> 
                  <h1 style="font-size: 100px;">Crochet</h1>
                  <h1>With Me</h1>
                  <p>Discover the warmth and charm of handmade crochet products, crafted with passion and precision to bring comfort and style to your life.</p>
                  <a href="{{url('/register')}}">Get Started</a>
                </div>
              </div>
              <div class="col-md-5">
                <div class="img-box">
                  <img class="slider-img" style="width:600px; height:400px" src="images/crochet2.jpg" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>