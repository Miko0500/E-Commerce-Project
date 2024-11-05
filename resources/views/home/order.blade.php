<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Services</title>

    <style type="text/css">
        body {
            font-family: "Poppins", sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 20px;
        }

        .div_center {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
        }

        .card {
            border: 3px solid #000; /* Neon blue border */
            border-radius: 15px;
            background: #fff; /* Dark background for cards */    
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            width: 350px;
            padding: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 15px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card img {
            width: 100%;
            height: 180px;
            border-radius: 15px;
            object-fit: cover;
        }

        .card-content {
           
            margin-top: 20px;
        }

        .card-content h3 {
            text-align: center;
            font-size: 35px;
            margin-bottom: 25px;
            color: #000;
            font-weight: 600;
        }

        .card-content p {
            font-size: 15px;
            margin: 15px 0;
            color: #000;
        }

        .status-btn {
            justify-content: center;
            display: inline-block;
            padding: 8px 15px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: bold;
            color: white;
            margin-top: 10px;
            
        }

        .btn-warning {
            background-color: #f0ad4e;
        }

        .btn-info {
            background-color: #5bc0de;
        }

        .btn-success {
            background-color: #5cb85c;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .pagination li a {
            padding: 10px 15px;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 5px;
            border-radius: 5px;
        }

        .pagination li.active a {
            background-color: #007bff;
            color: white;
        }

        .pagination li a:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>

<div class="hero_area">
    <!-- header section starts -->
    @include('home.header')

    @include('home.css')

    <div class="div_center">
    @foreach($order as $orders)
    <div class="card" style="border: 3px solid #000; border-radius: 15px; background: #fff; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); width: 350px; padding: 25px; transition: transform 0.3s ease, box-shadow 0.3s ease; margin: 15px;">
        <img src="/products/{{$orders->product->image}}" alt="Service Image">
        <div class="card-content">
            <h3>{{$orders->product->title}}</h3>
            <p>Price: ${{$orders->product->price}}</p>
            <p>Staff Assigned: {{ $orders->staff ? $orders->staff->name : 'Not assigned' }}</p>
            <p>Vehicle Type: {{ $orders->vehicle ? $orders->vehicle->type : 'N/A' }}</p>
            <p>Vehicle Size: {{ $orders->size ? $orders->size : 'N/A' }}</p>
            <p>Service Date & Time: {{ $orders->service_datetime ? \Carbon\Carbon::parse($orders->service_datetime)->format('F j, Y \a\t g:i A') : 'Not scheduled' }}</p>
            <span class="status-btn @if($orders->status == 'In Queue') btn-warning @elseif($orders->status == 'Ongoing Service') btn-info @else btn-success @endif" style="display: flex; justify-content: center;">
                {{$orders->status}}
            </span>

            <!-- Rating and Comment Form for Finished Orders -->
            @if($orders->status === 'Finished' && !$orders->rating)
                <div class="rating-comment-section" style="margin-top: 20px;">
                    <form action="{{ route('orders.rate', $orders->id) }}" method="POST">
                        @csrf
                        <div class="rating-stars" style="display: flex; gap: 5px; align-items: center;">
                            <label for="rating" style="font-weight: bold; color:#000">Rating:</label>
                            <div id="star-rating-{{ $orders->id }}" class="star-rating" style="display: flex; gap: 10px; cursor: pointer; margin-bottom: 10px;">
                                @for($i = 1; $i <= 5; $i++)
                                    <span class="star" data-value="{{ $i }}" style="font-size: 30px; color: #ddd;">&#9733;</span>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="rating-input-{{ $orders->id }}" required>
                        </div>

                        <label for="comment" style="font-weight: bold; display: block; margin-top: 10px; color:#000">Comment:</label>
                        <textarea name="comment" id="comment" rows="3" placeholder="Write your comment here..." style="width: 100%; padding: 8px; border-radius: 10px; border: 1px solid #ddd; margin-top: 5px;"></textarea>

                        <button type="submit" class="btn btn-primary" style="margin-top: 10px; padding: 8px 15px; border-radius: 20px; background-color: #007bff; color: #fff; font-weight: bold; cursor: pointer;">Submit</button>
                    </form>
                </div>
            @elseif($orders->status === 'Finished' && $orders->rating)
                <!-- Display saved rating and comment if already submitted -->
                <div class="rating-display" style="margin-top: 20px;">
                    <p><strong>Rating:</strong> 
                        @for($i = 1; $i <= 5; $i++)
                            <span style="font-size: 20px; color: {{ $i <= $orders->rating->rating ? '#FFD700' : '#ddd' }};">&#9733;</span>
                        @endfor
                    </p>
                    <p><strong>Comment:</strong> {{ $orders->rating->comment }}</p>
                </div>
            @endif
        </div>
    </div>
    @endforeach
</div>

    <div class="div_center">
        {{$order->onEachSide(1)->links()}}
    </div>

</div>

  <!-- info section -->
  <section class="info_section layout_padding2-top">
    @include('home.footer')
  </section>

  @yield('content')

<script>
    (function() {
        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.go(1);
        };
    })();
</script>

<script>
    document.querySelectorAll('.star-rating').forEach(starRating => {
        const stars = starRating.querySelectorAll('.star');
        const hiddenInput = starRating.nextElementSibling; // The hidden input for rating

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const ratingValue = star.getAttribute('data-value');
                
                // Set the hidden input value
                hiddenInput.value = ratingValue;

                // Update the star colors
                stars.forEach(s => {
                    s.style.color = s.getAttribute('data-value') <= ratingValue ? '#FFD700' : '#ddd';
                });
            });
        });
    });
</script>

</body>
</html>
