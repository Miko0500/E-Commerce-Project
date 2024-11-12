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

/* Dark theme for the staff section */
.staff_section {
    padding: 10px 0;
 
    color: #ffffff; /* Light text for contrast */
    position: relative;
    overflow: hidden;
}

/* Staff card styling with dark theme */
.staff-card {
    position: relative;
    border: 3px solid #000; /* Neon blue border */
    border-radius: 15px;
    background: #fff; /* Dark background for cards */
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5); /* Darker shadow for a more intense look */
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 30px;
    padding: 20px;
    opacity: 0; /* Initially hidden */
    transform: translateY(50px); /* Initially moved down */
}

.staff-card.show {
    animation: slideUp .5s ease-out forwards; /* Apply animation on scroll */
}

.staff-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.7); /* Stronger shadow on hover */
}

.staff-card .img-box {
    position: relative;
    height: 200px;
    overflow: hidden;
    margin-bottom: 15px;
    border-bottom: 2px solid #000; /* Neon blue line separating image */
}

.staff-card .img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.staff-card .detail-box {
    text-align: left;
}

.staff-card .detail-box h6 {
    margin: 10px 0;
    font-size: 18px;
    font-weight: 600;
    color: #000; /* Neon blue text for names */
}

.staff-card .detail-box .info {
    margin-top: 5px;
    font-size: 14px;
    color: #000; /* Light gray text for details */
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
  margin-top: 10px;
  }

  .staff_section form {
    margin-top: 10px;
    margin-bottom: 50px;
    display: flex;
    justify-content: center;
}

.staff_section form input[type="search"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 25px;
    font-size: 16px;
    width: 100%;
    max-width: 300px;
    margin-right: 10px;
}

.staff_section form input[type="submit"] {
    background-color: grey;
    color: #ffffff;
    border: none;
    padding: 13px 20px;
    border-radius: 25px;
    font-size: 16px;
    cursor: pointer;
}

.staff_section form input[type="submit"]:hover {
    background-color: black;
}

    </style>
</head>
<body>
    <section class="staff_section layout_padding">
        <div class="container">
            <div style="padding-bottom: 10px;" class="heading_container heading_center">
                <a class="top-title" href="index.html">
                    <span>Staff Information</span> <!-- Neon blue for the heading -->
                </a>
            </div>

            <form action="{{ url('search_staff') }}" method="get">
            @csrf
            <input type="search" name="search" placeholder="Search staff" />
            <input type="submit" class="btn btn-secondary" value="Search" />
        </form>

            <div class="row">
                @foreach($staff as $member)
                <div class="col-sm-6 col-md-4">
                    <div class="box staff-card">
                        <div class="img-box">
                            <img src="{{ asset('staff/' . $member->image) }}" alt="{{ $member->name }}">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $member->name }}</h6>
                            <p class="info"><strong>Age:</strong> {{ $member->age }}</p>
                            <p class="info"><strong>Birthday:</strong> {{ \Carbon\Carbon::parse($member->birthday)->format('d M, Y') }}</p>
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
