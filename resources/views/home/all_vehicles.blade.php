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

        /* Dark theme for the vehicle section */
        .vehicle_section {
            padding: 10px 0;
           
            color: #ffffff; /* Light text for contrast */
            position: relative;
            overflow: hidden;
        }

        /* Vehicle card styling with dark theme */
        .vehicle-card {
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

        .vehicle-card.show {
            animation: slideUp .5s ease-out forwards; /* Apply animation on scroll */
        }

        .vehicle-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.7); /* Stronger shadow on hover */
        }

        .vehicle-card .img-box {
            position: relative;
            height: 200px;
            overflow: hidden;
            margin-bottom: 15px;
            border-bottom: 2px solid #000; /* Neon blue line separating image */
        }

        .vehicle-card .img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .vehicle-card .detail-box {
            text-align: left;
        }

        .vehicle-card .detail-box h6 {
            margin: 10px 0;
            font-size: 18px;
            font-weight: 600;
            color: #000; /* Neon blue text for names */
        }

        .vehicle-card .detail-box .info {
            margin-top: 5px;
            font-size: 14px;
            color: #000; /* Light gray text for details */
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
            margin-top: 10px;
        }

        .vehicle_section form {
    margin-top: 10px;
    margin-bottom: 20px; /* Space below the search form */
    display: flex;
    justify-content: center;
}

.vehicle_section form input[type="search"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 25px; /* Rounded corners */
    font-size: 16px;
    width: 100%; /* Full width */
    max-width: 300px; /* Limit width */
    margin-right: 10px; /* Space between inputs */
}

.vehicle_section form input[type="submit"] {
    background-color: grey; /* Accent color */
    color: #ffffff; /* White text */
    border: none; /* Remove border */
    padding: 13px 20px; /* Padding */
    border-radius: 25px; /* Rounded corners */
    font-size: 16px;
    cursor: pointer; /* Pointer cursor on hover */
}

.vehicle_section form input[type="submit"]:hover {
    background-color: black; /* Darker shade on hover */
}

.sorting-form {
    text-align: center;
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.sorting-form select {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 25px;
    width: 100%;
    max-width: 160px;
    color: #333;
    background-color: #fff;
    transition: border-color 0.3s, background-color 0.3s;
}

.sorting-form select:hover,
.sorting-form select:focus {
    border-color: #007bff; /* Accent color on hover */
    background-color: #f0f8ff; /* Slightly lighter background on focus */
}

.sorting-form select option {
    color: #333; /* Text color for options */
}

    </style>
</head>
<body>
    <section class="vehicle_section layout_padding">
        <div class="container">
            <div style="padding-bottom: 10px;" class="heading_container heading_center">
                <a class="top-title" style="color: #000;">
                    <span>Vehicle Information</span> <!-- Neon blue for the heading -->
                </a>
            </div>

            <form action="{{ url('search_vehicle') }}" method="get">
            @csrf
            <input type="search" name="search" placeholder="Search vehicles">
            <input type="submit" class="btn btn-secondary" value="Search">
        </form>

        <form action="{{ url('/vehicle') }}" method="GET" class="sorting-form">
    <select name="status" onchange="this.form.submit()">
        <option value="" disabled selected>Filter by Status</option>
        <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>Available</option>
        <option value="Not Available" {{ request('status') == 'Not Available' ? 'selected' : '' }}>Not Available</option>
    </select>
</form>




            <div class="row">
                @foreach($vehicles as $vehicle)
                <div class="col-sm-6 col-md-4">
                    <div class="box vehicle-card">
                        <div class="img-box">
                            <img src="{{ asset('vehicles/' . $vehicle->image) }}" alt="{{ $vehicle->type }}">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $vehicle->type }}</h6>
                            <p class="info"><strong>Size:</strong> @if(is_array($vehicle->sizes))
        {{-- If sizes is an array, join it directly --}}
        {{ implode(', ', $vehicle->sizes) }}
    @else
        {{-- If sizes is a string, decode it --}}
        @php
            $sizes = json_decode($vehicle->sizes, true);
        @endphp
        {{ implode(', ', $sizes) }}
    @endif</p>
                            <p class="info"><strong>Status:</strong> {{ $vehicle->status ? 'Available' : 'Not Available' }}</p>
                            <!-- Additional vehicle information can be added here if needed -->
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
            const cards = document.querySelectorAll('.vehicle-card');
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
