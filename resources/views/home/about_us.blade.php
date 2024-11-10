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
            color: #ffffff;
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
            text-align: left;
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

        .top-title {
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

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .reason_section .card-title {
                font-size: 22px;
            }

            .reason_section .card-text {
                font-size: 16px;
            }

            .top-title {
                font-size: 32px;
            }
        }

        @media (max-width: 576px) {
            .reason_section .card {
                margin-bottom: 20px;
            }
            
            .reason_section .card-body {
                padding: 20px;
            }

            .reason_section .card-title {
                font-size: 20px;
            }

            .reason_section .card-text {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Header Section -->
        @include('home.header')
        <!-- End Header Section -->
    </div>
    <!-- End Hero Area -->

    <!-- Reason Section -->
    <section class="reason_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <a class="top-title" href="">
                    <span style="color: #000;">WHAT WE OFFER</span>
                </a>
            </div>
            <div class="row">
                <!-- Reason 1 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">We're experts in:</h5>
                            <p class="card-text">Auto Polish: We use premium polish to remove scratches, swirl marks, and other imperfections, restoring your car's original luster.</p>
                            <p class="card-text">Ceramic Coating: Our ceramic coating provides long-lasting protection against the elements, UV rays, and scratches, keeping your car looking new for longer.</p>
                        </div>
                    </div>
                </div>
                <!-- Reason 2 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">We cater to:</h5>
                            <p class="card-text">We cater to a variety of vehicles, specializing in motorcycles, tricycles, and cars. Our services are designed to be fast and efficient:</p>
                            <p class="card-text">Motorcycles & Tricycles: In and out in just 10 minutes!</p>
                            <p class="card-text">Cars: Get that showroom shine in 30 minutes!</p>
                        </div>
                    </div>
                </div>
                <!-- Reason 3 -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Our commitment:</h5>
                            <p class="card-text">Our commitment to customer satisfaction is at the heart of everything we do. We strive to provide a friendly and professional service, ensuring your vehicle receives the best possible care.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('home.css')

    <section> @include('home.footer')</section>
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
