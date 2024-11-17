<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        /* Scroll animation keyframes */
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

        /* Staff Section */
        .staff_section {
            padding: 80px 0;
            position: relative;
        }

       /* General Styles for the Title */
.top-title {
  font-size: 40px;
  font-weight: 600;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: #000;
  padding: 10px;
  margin-top: -65px;
  margin-bottom: 20px;
  text-align: center;
}

        /* Staff Member Styling */
        .staff-card {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 40px;
            opacity: 0; /* Initially hidden */
            transform: translateY(50px);
            transition: transform 0.3s ease, opacity 0.3s ease;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fff;
        }

        .staff-card.show {
            animation: slideUp 0.5s ease-out forwards; /* Apply animation on scroll */
        }

        /* Image and Description Styling */
        .staff-card .img-box {
            flex: 1 1 40%;
            padding: 15px;
            text-align: center;
        }

        .staff-card .img-box img {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #00bcd4;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .staff-card .img-box img:hover {
            transform: scale(1.1);
        }

        .staff-card .detail-box {
            flex: 1 1 60%;
            padding: 15px;
            text-align: left;
        }

        .staff-card .detail-box h6 {
            font-size: 26px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .staff-card .detail-box .info {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
            line-height: 1.6;
        }

        .staff-card .detail-box .info strong {
            color: #333;
        }

        /* Alternate layout: Image on the right, description on the left */
        .staff-card.reverse {
            flex-direction: row-reverse;
        }

        /* Hover Effect */
        .staff-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        /* Search Bar Styling */
        .staff_section form {
            display: flex;
            justify-content: center;
            margin-bottom: 40px;
        }

        .staff_section form input[type="search"] {
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 25px;
            font-size: 16px;
            width: 100%;
            max-width: 320px;
            margin-right: 12px;
        }

        .staff_section form input[type="submit"] {
            background-color: #00bcd4;
            color: #ffffff;
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
        }

        .staff_section form input[type="submit"]:hover {
            background-color: #0097a7;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .staff-card {
                flex-direction: column;
                align-items: center;
            }

            .staff-card.reverse {
                flex-direction: column-reverse;
            }

            .staff-card .img-box,
            .staff-card .detail-box {
                flex: 1 1 100%;
                text-align: center;
            }

            .staff-card .detail-box h6 {
                font-size: 22px;
            }

            .staff-card .info {
                font-size: 14px;
            }
        }

        /* Responsive Adjustments */
@media (max-width: 992px) {
  .top-title {
    font-size: 32px; /* Smaller title font size for medium screens */
  }

  .staff-card {
    flex-direction: column; /* Stack cards vertically on smaller screens */
    align-items: center;
  }

  .staff-card .img-box img {
    max-width: 250px; /* Smaller image on medium screens */
  }

  .staff-card .detail-box {
    text-align: center; /* Center align text */
  }

  .staff-card h6 {
    font-size: 18px; /* Adjust heading size for small screens */
  }

  .staff-card .info {
    font-size: 14px; /* Adjust text size for small screens */
  }
}

@media (max-width: 768px) {
  .top-title {
    font-size: 28px; /* Even smaller title size for smaller screens */
  }

  .staff-card .img-box img {
    max-width: 220px; /* Reduce image size further */
  }

  .staff-card h6 {
    font-size: 16px; /* Reduce heading font size */
  }

  .staff-card .info {
    font-size: 12px; /* Reduce text size further */
  }
}

@media (max-width: 480px) {
  .top-title {
    font-size: 24px; /* Further reduce title size for extra small screens */
  }

  .staff-card .img-box img {
    max-width: 200px; /* Even smaller image size on mobile */
  }

  .staff-card h6 {
    font-size: 14px; /* Further reduce heading font size */
  }

  .staff-card .info {
    font-size: 10px; /* Further reduce text size for extra small screens */
  }
}
    </style>
</head>

<body>
    <section class="staff_section layout_padding">
        <div class="container">
            
            <div style="padding-bottom: 20px;" class="heading_container heading_center">
                <a style="font-size: 40px;
            font-weight: 600;
            margin: 0;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #000;
            padding: 10px;
            padding-top: -100px;
            margin-top: -65px;
            margin-bottom: 10px;
            text-align: center;" class="top-title">
                    <span>Staff Information</span>
                </a>
            </div>

            <div class="row">
                @foreach($staff as $index => $member)
                    <div class="col-sm-12">
                        <!-- Staff Member 1 (Image on left, description on right) -->
                        <div class="staff-card {{ $index % 2 == 0 ? '' : 'reverse' }}">
                            <div class="img-box">
                                <img src="{{ asset('staff/' . $member->image) }}" alt="{{ $member->name }}">
                            </div>
                            <div class="detail-box">
                                <h6>{{ $member->name }}</h6>
                                <!-- <p class="info"><strong>Age:</strong> {{ $member->age }}</p>
                                <p class="info"><strong>Birthday:</strong> {{ \Carbon\Carbon::parse($member->birthday)->format('d M, Y') }}</p> -->
                                <p class="info"><strong>Sex:</strong> {{ ucfirst($member->sex) }}</p>
                                <p class="info"><strong>Contact:</strong> {{ $member->contact }}</p>
                                <p class="info"><strong>Address:</strong> {{ $member->address }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Include necessary scripts -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
        function handleScroll() {
            const cards = document.querySelectorAll('.staff-card');
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
