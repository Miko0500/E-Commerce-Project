<style>
  .product-card {
    position: relative;
    border: 3px solid #000; /* Neon blue border */
    border-radius: 15px;
            background: rgb(8, 91, 109);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* Soft shadow */
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 420px; /* Fixed height */
    margin-bottom: 30px; /* Space between cards */
  }

  .product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
  }

  .product-card .img-box {
    position: relative;
    height: 250px; /* Fixed height for image box */
    overflow: hidden;
    
  }

  .product-card .img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Cover the box while maintaining aspect ratio */
    transition: transform 0.3s ease;
  }

  .product-card:hover .img-box img {
    transform: scale(1.1); /* Zoom effect on hover */
  }

  .product-card .overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5); /* Dark overlay */
    color: #ffffff;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
    text-align: center;
    padding: 20px;
  }

  .product-card:hover .overlay {
    opacity: 1; /* Show overlay on hover */
  }

  .product-card .detail-box {
    padding: 20px;
    text-align: left;
  }

  .product-card .detail-box h6 {
    margin: 10px 0;
    font-size: 18px; /* Font size for title */
    font-weight: 600; /* Bold text */
    color: #000; /* Dark text color */
  }

  .product-card .detail-box .price {
    display: block;
    margin-top: 10px;
    font-size: 20px; /* Larger font size */
    color: #ff5722; /* Accent color */
    font-weight: 700; /* Bold text */
  }

  .product-card .btn {
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
    margin-top: 60px;
}

.product-card .btn:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: translateY(-1px); /* Gentle lift effect */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15); /* Slightly deeper shadow */
}

  .shop_section {
    padding: 100px 0; /* Padding around the section */
    position: relative;
    overflow: hidden;
  }

  .shop_section .heading_container {
    margin-bottom: 50px; /* Margin for heading */
  }

  .shop_section .box {
    transition: transform .5s ease-out, opacity .5s ease-out;
    opacity: 0;
    transform: translateY(150px);
  }

  .shop_section .box.in-view {
    opacity: 1;
    transform: translateY(0);
  }


  .average-rating {
    display: inline-flex;
    align-items: center;
    padding: 5px 10px;
    border: 2px solid #FFD700;
    background-color: rgba(255, 215, 0, 0.3); /* 0.8 is the opacity level */
 /* Yellow background */
    color: #333; /* Dark text color for contrast */
    font-weight: bold;
    font-size: 1.2rem;
    border-radius: 5px;
    margin-top: 10px;
}

.star-icon {
    color: #FF9800; /* Orange color for the star */
    font-size: 1.2rem;
    margin-right: 5px;
}

.rating-value {
    color: #333; /* Dark text color */
}

.no-rating {
    background-color: #f0f0f0; /* Light gray for no rating */
    color: #888;
    padding: 5px 10px;
    font-weight: normal;
}


/* General Styles for the heading */
.heading_container .navbar-brand span {
  font-size: 40px;
  font-weight: 600;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: #000;
  padding: 10px;
  margin-top: -60px;
}

/* Responsive adjustments for the shop section */
.shop_section .row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-around;
}

.product-card {
  margin-bottom: 30px; /* Add spacing between cards */
}

/* Make the images responsive */
.product-card .img-box img {
  width: 100%;
  height: auto;
  border-radius: 10px;
}

/* Mobile-responsive adjustments */
@media (max-width: 768px) {
  /* Adjust title font size */
  .heading_container .navbar-brand span {
    font-size: 32px;
  }

  /* Make the product cards stacked on small screens */
  .col-sm-6 {
    width: 100%; /* Full width for smaller screens */
    padding-left: 0;
    padding-right: 0;
  }

  /* Adjust spacing for product card */
  .product-card {
    padding: 10px;
    margin-bottom: 15px; /* Reduced margin */
  }

  /* Reduce button size for mobile */
  .btn {
    font-size: 14px;
    padding: 8px 16px;
  }

  /* Adjust the price and rating text size */
  .product-card .detail-box h6 {
    font-size: 18px;
  }

  .product-card .price {
    font-size: 16px;
  }

  .product-card .average-rating {
    font-size: 14px;
  }

  /* Adjust the "View All Services" button */
  .text-center .btn-dark {
    padding: 10px 20px;
    font-size: 16px;
  }
}

@media (max-width: 480px) {
  .heading_container .navbar-brand span {
    font-size: 28px; /* Even smaller title font size on very small screens */
  }

  .product-card .detail-box h6 {
    font-size: 16px; /* Smaller product title */
  }

  .product-card .price {
    font-size: 14px; /* Smaller price font */
  }

  .product-card .average-rating {
    font-size: 12px; /* Smaller rating font */
  }

  /* Adjust "Add Service" button */
  .btn {
    font-size: 12px;
    padding: 6px 12px; /* Smaller button padding */
  }
}

/* Custom Cancel button color */
.swal-button--cancel {
    background-color: #f44336 !important; /* Red color */
    color: white !important;
    border: none !important;
    padding: 10px 20px !important;
    font-size: 16px !important;
    transition: background-color 0.3s ease !important; /* Smooth transition */
}

/* Hover effect for Cancel button */
.swal-button--cancel:hover {
    background-color: #d32f2f !important; /* Darker red on hover */
}

/* Custom Confirm button color */
.swal-button--confirm {
    background-color: #4caf50 !important; /* Green color */
    color: white !important;
    border: none !important;
    padding: 10px 20px !important;
    font-size: 16px !important;
    transition: background-color 0.3s ease !important;  /* Smooth transition */
}

/* Hover effect for Confirm button */
.swal-button--confirm:hover {
    background-color: #388e3c !important; /* Darker green on hover */
}

</style>

<section class="shop_section layout_padding">
  <div class="container">
    <div style="padding-bottom: 60px;" class="heading_container heading_center">
      <a class="navbar-brand" href="index.html">
        <span>LATEST SERVICES</span>
      </a>
    </div>
    <div class="row">
      @foreach($product as $products)
      <div class="col-sm-6 col-md-6">
        <a href="{{url('product_details',$products->id)}}">
          <div class="box product-card">
            <div class="img-box">
              <img src="products/{{$products->image}}" alt="">
              <div class="overlay">
                <p>Click to learn more about this service</p>
              </div>
            </div>
            <div class="detail-box">
              <h6>{!!Str::limit($products->title,20)!!}</h6>
              <span class="price">{{$products->price}}</span>

              @if ($products->average_rating !== null)
              <div class="average-rating">
                  <span class="star-icon">★</span>
                  <span class="rating-value">{{ number_format($products->average_rating, 1) }}</span>
              </div>
              @else
              <div class="average-rating no-rating">No ratings yet</div>
              @endif

              @if(Auth::check())
                <a class="btn" onclick="confirmation(event)" href="{{ url('add_cart', $products->id) }}">Book Service</a>
              @else
                <a class="btn" href="{{ route('login') }}">Book Service</a>
              @endif
            </div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>

<div class="text-center">
  <a class="btn btn-dark" href="{{url('/product')}}">View All Services</a>
</div>


<script>
  function handleScroll() {
    const boxes = document.querySelectorAll('.shop_section .box');
    const triggerBottom = window.innerHeight;

    boxes.forEach(box => {
      const boxTop = box.getBoundingClientRect().top;

      if (boxTop < triggerBottom) {
        box.classList.add('in-view');
      } else {
        box.classList.remove('in-view');
      }
    });
  }

  window.addEventListener('scroll', handleScroll);
  window.addEventListener('load', handleScroll);
</script>

<script>
   function confirmation(ev) {
    ev.preventDefault();  // Prevent the default link click action
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    
    // Show the confirmation popup using SweetAlert
    swal({
        title: "Are You Sure You Want To Add This Service?",
        text: "This Will Be Added To The Pending Page",
        icon: "info",
        buttons: {
            cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "swal-button--cancel",  // Custom class for Cancel button
                closeModal: true
            },
            confirm: {
                text: "Confirm",
                value: true,
                visible: true,
                className: "swal-button--confirm",  // Custom class for Confirm button
                closeModal: true
            }
        },
        dangerMode: true, // Optional: makes the confirm button red
    }).then((willAdd) => {
        if (willAdd) {
            // Redirect to the 'add_cart' URL
            window.location.href = urlToRedirect;
        }
    });
}
  </script>
