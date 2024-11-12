<!DOCTYPE html>
<html>

<head>
  


<style type="text/css">

    .div_center
    {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    /* Container for the main content */
   
    body.no-scroll {
        overflow: hidden;
    }
        /* Service Details Box */
        .box {
            background-color: #ffffff;
            border: 2px solid #007bff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        /* Centered image with subtle shadow */
        .div_center img {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Styling for details inside the box */
        .detail-box {
            margin-top: 15px;
            color: #333;
        }

        .detail-box h6 {
            font-size: 1.2rem;
            color: #007bff;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .detail-box p {
            font-size: 1rem;
            color: #555;
            line-height: 1.5;
        }

        /* Add Service button with hover effect */
        .btn-primary {
            margin-top: 10px;
    background-color: #007BFF; /* Accent color */
    color: #ffffff; /* White text */
    border: none; /* Remove border */
    padding: 6px 12px; /* Smaller padding */
    border-radius: 5px; /* Slightly rounded corners */
    font-size: 13px; /* Smaller font size */
    font-weight: bold;
    text-transform: uppercase; /* Uppercase text */
    letter-spacing: 0.5px;
    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 50px;
    
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
    transform: translateY(-1px); /* Gentle lift effect */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15); /* Slightly deeper shadow */
        }

        .btn-warning {
            margin-top: 10px;
    background-color: #007BFF; /* Accent color */
    color: #ffffff; /* White text */
    border: none; /* Remove border */
    padding: 6px 12px; /* Smaller padding */
    border-radius: 5px; /* Slightly rounded corners */
    font-size: 13px; /* Smaller font size */
    font-weight: bold;
    text-transform: uppercase; /* Uppercase text */
    letter-spacing: 0.5px;
    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 50px;
    
        }

        .btn-warning:hover {
            background-color: #0056b3; /* Darker blue on hover */
    transform: translateY(-1px); /* Gentle lift effect */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15); /* Slightly deeper shadow */
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
            margin-top: -80px;
        }

        /* Modal styling */
        .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow-y: auto; /* Allow scrolling on the modal background */
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 600px;
        max-height: 80vh; /* Set a maximum height */
        overflow-y: auto; /* Enable scrolling within the modal content */
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* Fixed header inside the modal */
    .modal-header {
    position: sticky;
    top: 0;
    width: 100%;
    color: #000; /* White text */
    background-color: #fff; /* Black background */
    padding: 20px;
    border: 1px solid #ddd;
    z-index: 10;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-sizing: border-box; /* Ensures padding doesn't affect width */
}

.modal-header h2 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: bold;
    color: #000; /* White color for text */
    flex-grow: 1; /* Ensures the h2 takes up remaining space */
}

.close {
    font-size: 24px;
    cursor: pointer;
    color: #fff; /* White color for close button */
    font-weight: bold;
}


    .close:hover {
        color: black;
    }

    .review {
        margin-bottom: 15px;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .review .rating {
        font-size: 1.2rem;
        color: #FFD700;
    }

    .review .comment {
        font-size: 1rem;
        color: #333;
    }

    .review .user-name {
        font-weight: bold;
        color: #007bff;
    }

    .review .date {
        font-size: 0.9rem;
        color: #888;
    }

    .btn-back {
            background-color: #6c757d;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-right: 1000px;
        }

        .btn-back:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        .btn-back:active {
            background-color: #495057;
        }
</style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
 
  </div>



<!-- product details start -->


<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <a class="top-title" style="color: #000;">
                <span>Service Details</span>
            </a>
            <button onclick="history.back()" class="btn-back">Back</button>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box">
                    <div class="div_center">
                        <img width="300" src="/products/{{$data->image}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h6>Name: {{$data->title}}</h6>
                        <h6>Price: <span>${{$data->price}}</span></h6>
                    </div>
                    <div class="detail-box">
                        <h6>Category: {{$data->category}}</h6>
                    </div>
                    <div class="detail-box">
                        <p>{{$data->description}}</p>
                    </div>
                    <div class="detail-box">
                    <button id="openModalBtn" class="btn2 btn-warning">Ratings & Reviews</button>   
                    </div>
                    <a class="btn2 btn-primary" onclick="confirmation(event)" href="{{ url('add_cart', $data->id) }}">Add Service</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ratings & Reviews Modal -->
<div id="reviewsModal" class="modal">
    <div class="modal-content">
    <div class="modal-header">
            <h2>Ratings & Reviews</h2>
            <span class="close">&times;</span>
        </div>

        <!-- Display each rating if available -->
        @forelse ($ratings as $rating)
            <div class="review">
                <div class="user-name">{{ $rating->order->user->name }}</div>
                <div class="rating">
                    @for ($i = 0; $i < $rating->rating; $i++)
                        &#9733; <!-- Filled star -->
                    @endfor
                    @for ($i = $rating->rating; $i < 5; $i++)
                        &#9734; <!-- Empty star -->
                    @endfor
                </div>
                <div class="comment">{{ $rating->comment }}</div>
                <div class="date">{{ $rating->created_at->format('F j, Y') }}</div>
            </div>
        @empty
            <p>No reviews yet for this service.</p>
        @endforelse
    </div>
</div>

  @include('home.css')


<!-- product details end -->




   <!-- JavaScript for Modal -->
   <script>
    var modal = document.getElementById("reviewsModal");
    var openModalBtn = document.getElementById("openModalBtn");
    var closeModal = document.querySelector(".close");

    openModalBtn.onclick = function() {
        modal.style.display = "block";
        document.body.classList.add("no-scroll");
    }

    closeModal.onclick = function() {
        modal.style.display = "none";
        document.body.classList.remove("no-scroll");
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
            document.body.classList.remove("no-scroll");
        }
    }
</script>

<script>
    function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are You Sure You Want To Add This Service?",
                text: "This Will Be Added To The Pending Page",
                icon: "info",
                buttons: true,
                dangerMode: true,
            }).then((willCancel)=>{
                if(willCancel) {
                    window.location.href=urlToRedirect;
                }
            });
        }
  </script>

  <!-- info section -->
@include('home.footer')

</body>

</html>