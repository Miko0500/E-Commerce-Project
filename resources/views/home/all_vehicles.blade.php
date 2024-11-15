<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Title Section */
        .top-title {
            font-size: 40px;
            font-weight: 600;
            margin: 0;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #000;
            padding: 10px;
            padding-top: -100px;
            margin-top: -30px;
            margin-bottom: 10px;
            text-align: center;
        }

        /* Vehicle Section */
        .vehicle_section {
            padding: 50px 0;
            margin: 0 auto;
            max-width: 1200px;
        }

        /* Vehicle Item Styles */
        .vehicle-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            margin-bottom: 40px;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .vehicle-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        /* Image Style */
        .vehicle-item .vehicle-image {
            flex: 1;
            max-width: 45%;
            margin-right: 30px;
        }

        .vehicle-item .vehicle-image img {
            width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Text Style */
        .vehicle-item .vehicle-details {
            flex: 1;
            text-align: left;
            padding-left: 30px;
        }

        .vehicle-item .vehicle-details h3 {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        .vehicle-item .vehicle-details p {
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        /* "P" Style (Image on Left, Text on Right) */
        .p-style {
            flex-direction: row;
        }

        /* "J" Style (Image on Right, Text on Left) */
        .j-style {
            flex-direction: row-reverse;
        }

        /* Search and Sorting */
        .search-sort {
            text-align: center;
            margin-bottom: 50px;
        }

        .search-sort input[type="search"],
        .search-sort select {
            padding: 14px;
            border-radius: 25px;
            border: 2px solid #3498db;
            font-size: 16px;
            width: 100%;
            max-width: 230px;
            margin: 10px;
            background-color: #fff;
            color: #333;
        }

        .search-sort input[type="search"]:focus,
        .search-sort select:focus {
            outline: none;
            border-color: #2980b9;
        }

        .search-sort input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 12px 25px;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            height: 60px;
            margin-top: -20px;
            margin-bottom: -20px;
        }

        .search-sort input[type="submit"]:hover {
            background-color: #2980b9;
        }

        /* Sorting Dropdown */
        .sorting-form select {
            padding: 10px;
            font-size: 16px;
            border-radius: 25px;
            border: 1px solid #ecf0f1;
            color: #333;
            background-color: #fff;
            width: 100%;
            max-width: 180px;
            transition: border-color 0.3s, background-color 0.3s;
        }

        .sorting-form select:hover,
        .sorting-form select:focus {
            border-color: #00bcd4;
            background-color: #f0f8ff;
        }

        .sorting-form select option {
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .vehicle-item {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .vehicle-item .vehicle-image,
            .vehicle-item .vehicle-details {
                max-width: 100%;
                padding-right: 0;
                padding-left: 0;
            }

            .vehicle-item .vehicle-details h3 {
                font-size: 28px;
            }

            .vehicle-item .vehicle-details p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <section class="vehicle_section">
        <div class="container">
            <div class="top-title">
                <span>Vehicle Accommodated</span>
            </div>

            <!-- Search and Sort -->
            <div class="search-sort">
                <form action="{{ url('search_vehicle') }}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Search vehicles" />
                    <input type="submit" class="btn btn-secondary" value="Search" />
                </form>

                <form action="{{ url('/vehicle') }}" method="GET" class="sorting-form">
                    <select name="status" onchange="this.form.submit()">
                        <option value="" disabled selected>Filter by Status</option>
                        <option value="Available" {{ request('status') == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Not Available" {{ request('status') == 'Not Available' ? 'selected' : '' }}>Not Available</option>
                    </select>
                </form>
            </div>

            <!-- Vehicle Items Section -->
            <div class="vehicle-list">
                @foreach($vehicles as $index => $vehicle)
                    <div class="vehicle-item {{ $index % 2 == 0 ? 'p-style' : 'j-style' }}">
                        <div class="vehicle-image">
                            <img src="{{ asset('vehicles/' . $vehicle->image) }}" alt="{{ $vehicle->type }}">
                        </div>
                        <div class="vehicle-details">
                            <h3>{{ $vehicle->type }}</h3>
                            <p><strong>Size:</strong> 
                                @if(is_array($vehicle->sizes))
                                    {{ implode(', ', $vehicle->sizes) }}
                                @else
                                    @php
                                        $sizes = json_decode($vehicle->sizes, true);
                                    @endphp
                                    {{ implode(', ', $sizes) }}
                                @endif
                            </p>
                            <p><strong>Status:</strong> {{ $vehicle->status ? 'Available' : 'Not Available' }}</p>
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
            const items = document.querySelectorAll('.vehicle-item');
            const triggerBottom = window.innerHeight;

            items.forEach(item => {
                const itemTop = item.getBoundingClientRect().top;

                if (itemTop < triggerBottom) {
                    item.classList.add('show');
                } else {
                    item.classList.remove('show');
                }
            });
        }

        window.addEventListener('scroll', handleScroll);
        window.addEventListener('load', handleScroll);
    </script>
</body>

</html>
