<style>
  .slider_section .slider_container {
    color: #aca9a9;
    background-color: rgba(37, 35, 35, 0.8); /* Slightly transparent dark background */
    padding: 25px;
    border-radius: 0 0 15px 15px;
    border: 3px solid #000000;
    background-image: url('/images/car.jpg') !important;
    background-size: 50% 80%;
    background-size: contain; /* Cover the entire container */
    background-repeat: no-repeat; /* Do not repeat the image */
    background-position: center; /* Center the image */
    position: relative; /* Ensure it can contain absolutely positioned elements */
    width: 100%;
    height: 80vh; /* Set height for the container */
  }

  .carousel-inner {
    height: 100%; /* Ensure the carousel items take the full height */
  }

  .carousel-item {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
  }

  .detail-boxes {
    color: #fff;
    padding: 40px;
    text-align: left;
    background: rgba(0, 0, 0, 0.6);
    border-radius: 15px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.7);
    z-index: 1;
    transform: translateY(20%);
    opacity: 1;
    transition: opacity 0.5s ease, transform 0.5s ease;
  }

  .carousel-item.active .detail-boxes {
    opacity: 1;
    transform: translateY(0);
  }

  .title {
    font-size: 80px;
    font-weight: 900;
    margin: 0;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: white; /* Set color to black */
    text-shadow: 0 0 15px rgba(0, 0, 0, 0.3); /* Adjust shadow if desired */
}


  .subtitle {
    font-size: 50px;
    font-weight: 600;
    margin: 20px 0;
    letter-spacing: 1px;
    color: #e0e0e0;
  }

  .description {
    font-size: 18px;
    font-weight: 300;
    color: #b0b0b0;
    margin-bottom: 30px;
  }

  .btn-get-started {
    display: inline-block;
    padding: 15px 30px;
    background: linear-gradient(135deg, #ff007a, #ff7b00);
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    text-decoration: none;
    border-radius: 30px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.5);
    transition: background 0.3s ease, transform 0.3s ease;
  }

  .btn-get-started:hover {
    background: linear-gradient(135deg, #e6006d, #ff6f00);
    transform: translateY(-5px);
  }

  .img-box {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    overflow: hidden;
    position: relative;
  }

  .slider-img {
    width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
    transition: transform 0.5s ease, filter 0.5s ease;
    object-fit: cover;
  }

  .slider-img:hover {
    transform: scale(1.05);
    filter: brightness(1.2);
  }
</style>



<section class="slider_section">
    <div class="slider_container">
        @if (Route::has('login'))
            @auth
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7 d-flex align-items-center">
                                        <div class="detail-boxes">
                                            <h1 class="title">Shee Auto Polish</h1>
                                            <h2 class="subtitle">& Ceramic Coating</h2>
                                            <p class="description">Experience premium car wash services with a spotless shine and unparalleled convenience every time you visit.</p>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-7 d-flex align-items-center">
                                        <div class="detail-boxes">
                                            <h1 class="title">Shee Auto Polish</h1>
                                            <h2 class="subtitle">& Ceramic Coating</h2>
                                            <p class="description">Experience premium car wash services with a spotless shine and unparalleled convenience every time you visit.</p>
                                            <a href="{{ url('/register') }}" class="btn-get-started">Get Started</a>
                                        </div>
                                    </div>
                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
        @endif
    </div>
</section>
