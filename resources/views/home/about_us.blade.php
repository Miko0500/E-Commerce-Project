<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <!-- Include Font Awesome CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

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

        /* Main Section */
        .reason_section {
            color: #333;
            padding: 100px 0;
            
        }

        /* Section Title */
        .top-title {
            font-size: 40px;
            font-weight: 600;
            margin: 0;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #000;
            padding: 10px;
            padding-top: -100px;
            margin-top: -65px;
            margin-bottom: 10px;
            text-align: center;
        }

        .top-title2 {
            font-size: 40px;
            font-weight: 600;
            margin: 0;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #000;
            padding: 10px;
            padding-top: -100px;
            margin-top: -65px;
            margin-bottom: 10px;
            text-align: center;
        }

        /* Card Container */
        .reason_section .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        /* Card Styling */
        .reason_section .card {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            background: #fff;
            max-width: 380px;
            width: 100%;
            opacity: 0;
            transform: translateY(50px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .reason_section .card.show {
            animation: slideUp 0.5s ease-out forwards;
        }

        .reason_section .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }

        .reason_section .card-body {
            padding: 30px;
            text-align: center;
        }

        .reason_section .card-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #333;
        }

        .reason_section .card-text {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .reason_section .card-body img {
            width: 120px;
            height: 120px;
            object-fit: contain;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .reason_section .card-body img:hover {
            transform: scale(1.1);
        }

        .reason_section .btn-primary {
            border-radius: 25px;
            padding: 12px 30px;
            background-color: #00bcd4;
            color: #fff;
            transition: all 0.3s ease;
            border: 2px solid #00bcd4;
            text-transform: uppercase;
            font-weight: 600;
        }

        .reason_section .btn-primary:hover {
            background-color: #fff;
            color: #00bcd4;
            border-color: #fff;
        }

        /* Icon Styling */
        .card-icon {
            font-size: 50px;
            color: #00bcd4;
            margin-bottom: 20px;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .reason_section .top-title {
                font-size: 36px;
            }

            .reason_section .card-title {
                font-size: 24px;
            }

            .reason_section .card-text {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .reason_section .card {
                margin-bottom: 20px;
            }

            .reason_section .card-body {
                padding: 20px;
            }

            .reason_section .top-title {
                font-size: 32px;
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

    <!-- About Us Section -->
    <section class="reason_section layout_padding">
        <div class="container">
            <!-- Section Title -->
            <h1 class="top-title2">What We Offer</h1>

            <div class="row">
                <!-- Card 1: Expertise -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-cogs"></i> <!-- Gear icon for expertise -->
                            </div>
                            <h5 class="card-title">We're Experts In:</h5>
                            <p class="card-text">Auto Polish: We use premium polish to remove scratches, swirl marks, and other imperfections, restoring your car's original luster.</p>
                            <p class="card-text">Ceramic Coating: Our ceramic coating provides long-lasting protection against the elements, UV rays, and scratches, keeping your car looking new for longer.</p>
                            
                        </div>
                    </div>
                </div>

                <!-- Card 2: Services for Vehicles -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-car"></i> <!-- Car icon for services -->
                            </div>
                            <h5 class="card-title">We Cater To:</h5>
                            <p class="card-text">Motorcycles & Tricycles: In and out in just 10 minutes!</p>
                            <p class="card-text">Cars: Get that showroom shine in 30 minutes!</p>
                            
                        </div>
                    </div>
                </div>

                <!-- Card 3: Commitment -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-thumbs-up"></i> <!-- Thumbs up icon for commitment -->
                            </div>
                            <h5 class="card-title">Our Commitment:</h5>
                            <p class="card-text">Our commitment to customer satisfaction is at the heart of everything we do. We strive to provide a friendly and professional service, ensuring your vehicle receives the best possible care.</p>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Why Our Services Section -->
        <div class="container">
            <h1 style="margin-top: 70px; font-size: 40px;
            font-weight: 600;
            margin: 0;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #000;
            padding: 10px;
            padding-top: -100px;
            margin-top: 70px;
            margin-bottom: 10px;
            text-align: center;" class="top-title">Why Our Services?</h1>
            <div class="row">
                <!-- Reason 1: Fast & Efficient -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-clock"></i> <!-- Clock icon for speed -->
                            </div>
                            <h5 class="card-title">Fast & Efficient</h5>
                            <p class="card-text">We're known for our quick turnaround times. Motorcycles and tricycles are in and out in 10 minutes, while cars get that showroom shine in just 30 minutes.</p>
                            
                        </div>
                    </div>
                </div>

                <!-- Reason 2: Quality -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-star"></i> <!-- Star icon for quality -->
                            </div>
                            <h5 class="card-title">Quality You Can Trust</h5>
                            <p class="card-text">We use only the highest quality products and techniques to ensure your vehicle gets the best possible care.</p>
                            
                        </div>
                    </div>
                </div>

                <!-- Reason 3: Customer Satisfaction -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-icon">
                                <i class="fas fa-smile"></i> <!-- Smile icon for satisfaction -->
                            </div>
                            <h5 class="card-title">Customer Satisfaction</h5>
                            <p class="card-text">We're dedicated to providing a friendly and professional service, so you can relax and enjoy the results.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Staff Section -->
    @include('home.all_staffs')

    <!-- Footer Section -->
    @include('home.footer')

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
