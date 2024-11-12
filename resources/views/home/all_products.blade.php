@include('home.css')
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
    bottom: 140px;
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
    margin-top: 75px;
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

  .shop_section form {
    margin-top: 10px;
    margin-bottom: -45px; /* Space below the search form */
    display: flex;
    justify-content: center;
  }

  .shop_section form input[type="search"] {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 25px; /* Rounded corners */
    font-size: 16px;
    width: 100%; /* Full width */
    max-width: 300px; /* Limit width */
    margin-right: 10px; /* Space between inputs */
  }

  .shop_section form input[type="submit"] {
    background-color: grey; /* Accent color */
    color: #ffffff; /* White text */
    border: none; /* Remove border */
    padding: 13px 20px; /* Padding */
    border-radius: 25px; /* Rounded corners */
    font-size: 16px;
    cursor: pointer; /* Pointer cursor on hover */
  }

  .shop_section form input[type="submit"]:hover {
    background-color: black; /* Darker shade on hover */
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

</style>


<section class="shop_section layout_padding">
  <div class="container">
    

    <div style="padding-bottom: 10px;" class="heading_container heading_center">
    <a class="top-title" style="color: #000;">
                    <span>All Services</span> <!-- Neon blue for the heading -->
                </a>

    <form action="{{url('search_product')}}" method="get">
      @csrf
      <input type="search" name="search" placeholder="Search products">
      <input type="submit" class="btn btn-secondary" value="Search">
    </form>
      </div>
    
    <div class="row">
      @foreach($product as $products)
      <div class="col-sm-6 col-md-6">
        <a href="{{url('product_details',$products->id)}}">
          <div class="box product-card">
            <div class="img-box">
              <img src="products/{{$products->image}}" alt="{{$products->title}}">
            </div>
            <div class="overlay">
              <p>Click to learn more about this service</p>
            </div>
            <div class="detail-box">
              <h6>{!!Str::limit($products->title,15)!!}</h6>
              <span class="price">${{$products->price}}</span>

              @if ($products->average_rating !== null)
    <div class="average-rating">
        <span class="star-icon">★</span>
        <span class="rating-value">{{ number_format($products->average_rating, 1) }}</span>
    </div>
@else
    <div class="average-rating no-rating">No ratings yet</div>
@endif

              @if(Auth::check())
                        <!-- If the user is logged in, allow adding to cart -->
                        <a class="btn" onclick="confirmation(event)" href="{{ url('add_cart', $products->id) }}">Add Service</a>
                    @else
                        <!-- If the user is not logged in, direct them to the login page -->
                        <a class="btn" href="{{ route('login') }}">Add Service</a>
                    @endif</div>
          </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
</section>



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

  window.addEventListener('scroll', handleScroll);
  window.addEventListener('load', handleScroll);
</script>
