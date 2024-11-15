<!DOCTYPE html>
<html lang="en">

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
            color: #000;
            padding: 0px 0;
        }

        /* Card styling */
        .reason_section .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: stretch; /* Ensures that all items stretch to the same height */
        }

        .reason_section .card {
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3);
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 30px;
            width: 100%;
            height: 100%; /* Allow cards to be the same height */
            border: 3px solid #000; /* Neon blue border */
            border-radius: 15px;
            background: #fff;
            opacity: 0; /* Initially hidden */
            transform: translateY(50px); /* Initially moved down */
            flex: 1; /* Allows the card to grow and shrink */
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Distribute space between elements */
            align-items: center; /* Center align items inside the card */
        }

        .reason_section .card.show {
            animation: slideUp .5s ease-out forwards;
        }

        .reason_section .card-body {
            padding: 30px;
            text-align: center;
        }

        .reason_section .card-title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #000;
        }

        .reason_section .card-text {
            font-size: 18px;
            color: #000;
            flex-grow: 1; /* Allows text to take up available space */
        }

        .reason_section .card-body img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            margin-top: 20px;
        }

        .reason_section .btn-primary {
            margin-top: 20px;
            border-radius: 25px;
            padding: 10px 30px;
            background-color: #00d3e0;
            color: #000000;
            transition: all 0.3s ease;
            border: 2px solid #00d3e0;
        }

        .reason_section .btn-primary:hover {
            background-color: #ffffff;
            color: #00d3e0;
            border: 2px solid #ffffff;
        }
        .slider-img{
          padding: 20px 0;
          height: 100%;
          height: 100%;
        }
        .top-title{
    
    font-size: 40px;
    font-weight: 600;
    margin: 0;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #000;
    
  padding: 10px;
  padding-top: -100px;
  margin-top: -70px;
  }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header Section -->
       
        <!-- End Header Section -->
    </div>
    <!-- End Hero Area -->

    <!-- Reason Section -->
    <section class="reason_section layout_padding">
        <div class="container">
            <div style="padding-top: -110px;" class="heading_container heading_center">
                <a class="top-title" href="">
                    <span style="color: #000;">WHY OUR SERVICES?</span>
                </a>
            </div>
            
            <div class="row">
                <!-- Reason 1 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Fast & Efficient</h5>
                            <p class="card-text">We're known for our quick turnaround times. Motorcycles and tricycles are
                                in and out in 10 minutes, while cars get that showroom shine in just 30 minutes.</p>
                            <img class="slider-img" src="images/quick.png" alt="" />
                        </div>
                    </div>
                </div>
                <!-- Reason 2 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Quality You Can Trust</h5>
                            <p class="card-text">We use only the highest quality products and techniques to ensure your
                                vehicle gets the best possible care.</p>
                            <img class="slider-img" src="images/high-quality.png" alt="" />
                        </div>
                    </div>
                </div>
                <!-- Reason 3 -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Customer Satisfaction</h5>
                            <p class="card-text">We're dedicated to providing a friendly and professional service, so you
                                can relax and enjoy the results.</p>
                            <img class="slider-img" src="images/customer-satisfaction.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @include('home.css')

    
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
