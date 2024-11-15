<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booked Services</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style type="text/css">
        body {
            font-family: "Poppins", sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 20px;
            position: relative;
            z-index: 1; /* Set a baseline z-index for page content */
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
            margin-top: 10px;
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

         /* Existing and additional CSS */
         .filter-sort-container {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-width: 750px;
            margin: 0 auto;
        }
        .form-label {
            font-weight: bold;
            color: #333;
            font-size: 14px;
        }
        .form-select {
            width: 170px;
            padding: 8px;
            font-size: 14px;
            color: #333;
            border: 1px solid #007bff;
            border-radius: 5px;
            background: #ffffff;
            outline: none;
        }


        .modal {
    z-index: 1050 !important; /* Ensure the modal is above the header */
}
.modal-dialog {
    margin-top: 50px; /* Add space to the top to avoid overlap */
}

          /* Modal Styling */
          .modal-content {
                border-radius: 8px;
                background-color: #fff;
                padding: 20px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            }

            .modal-header {
                background-color: #007bff;
                color: #ffffff;
                border-bottom: none;
                padding: 15px 20px;
            }

            .modal-body {
                padding: 20px;
            }

            /* Product Image */
            .product-image {
                max-width: 100%;
                max-height: 250px;
                border: 1px solid #ddd;
                border-radius: 8px;
                margin: 10px auto;
                display: block;
            }

            /* Rating Display */
            .rating-display {
                margin-top: 10px;
                font-size: 1rem;
                border-top: 1px solid #ddd;
                padding-top: 10px;
            }

            .rating-display span {
                font-size: 1.5rem;
                color: #FFD700;
            }
    </style>
</head>

<body>

<div class="hero_area">
    <!-- header section starts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<style>
  .nav-link {
    display: block;
    padding: 5px 10px; /* Adjust padding as needed */
    border-radius: 5px; /* Adjust border radius as needed */
    font-size: 14px; /* Adjust font size as needed */
    position: relative;
    
    
  }
  .nav-link.active::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px; /* Adjust thickness */
    background-color: #000; /* Underline color */
  }
  .nav-item {
    padding: -5px -5px; /* This seems incorrect, remove it */
  }
  .navbar-brand {
    font-size: 40px;
    font-weight: 900;
    margin: 0;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #000;
    padding: 10px;
    padding-top: 10px; /* Adjust top padding to prevent overlap */
    margin-top: 10px; /* Adjust margin-top if necessary */
}


.brand-text {
    font-size: 1.5rem;
    font-weight: 900;
    margin: 0;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #007bff; /* Adjust color as needed */
  }

  /* Responsive adjustments */
  @media (min-width: 992px) {
    .brand-text {
      font-size: 2rem;
      letter-spacing: 2px;
    }
  }
  
  @media (min-width: 1200px) {
    .brand-text {
      font-size: 2.5rem;
      letter-spacing: 3px;
    }
  }
  body {
    padding-top: 70px; /* Add space for header */
    z-index: 1; /* Ensure body is below the modal */
}

header {
    position: relative;
    z-index: 1; /* Ensure header is below the modal */
}

.modal-backdrop {
    z-index: 1040 !important; /* Ensure the backdrop is behind the modal */
}

.modal {
    z-index: 1050 !important; /* Ensure the modal is above the backdrop */
}


.modal-dialog {
    z-index: 1050 !important;
    position: relative;
}

.modal-content {
    position: relative;
    z-index: 1060; /* Ensure the modal content is above the backdrop */
}


.modal-header .close {
    z-index: 1060; /* Ensure close button is above everything else */
}

</style>

<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand"  style="text-decoration: none;">
      <span class="brand-text" style="
        font-size: 40px;
        font-weight: 900;
        margin: 0;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #000;
        padding: 10px;">
          Shee Auto Polish & Ceramic Coating
      </span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">&#9776;</span> <!-- Unicode hamburger icon -->
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link{{ request()->is('/') ? ' active' : '' }}" href="{{ url('/') }}">
            <i class="bi bi-house-fill"></i> Home <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ request()->is('product') ? ' active' : '' }}" href="{{ url('/product') }}">
            <i class="bi bi-clipboard-check-fill"></i> Services <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ request()->is('vehicle') ? ' active' : '' }}" href="{{ url('/vehicle') }}">
            <i class="bi bi-car-front-fill"></i> Vehicles <span class="sr-only">(current)</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link{{ request()->is('staffs') ? ' active' : '' }}" href="{{ url('/staffs') }}">
            <i class="bi bi-person-fill-check"></i> Staffs <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ request()->is('why') ? ' active' : '' }}" href="{{ url('/why') }}">
            <i class="bi bi-patch-question-fill"></i> Why Us <span class="sr-only">(current)</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link{{ request()->is('about_us') ? ' active' : '' }}" href="{{ url('/about_us') }}">
            <i class="bi bi-file-person-fill"></i> About Us <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ request()->is('contact_us') ? ' active' : '' }}" href="{{ url('/contact_us') }}">
            <i class="bi bi-person-lines-fill"></i> Contact Us <span class="sr-only">(current)</span>
          </a>
        </li>
      </ul>

      <div class="user_option">
        @if (Route::has('login'))
          @auth

          <a style="color: #000;" class="nav-link{{ request()->is('mycart') ? ' active' : '' }}" href="{{url('mycart')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i> [{{$count}}]Pending 
            </a>
            <a style="color: #000;" class="nav-link{{ request()->is('myorders') ? ' active' : '' }}" href="{{url('myorders')}}">
              <i class="bi bi-cart-check-fill"></i> [{{$counts}}]Booked <span class="sr-only">(current)</span>
            </a>
            
            <a href="{{url('profile_app')}}" class="nav-link{{ request()->is('profile_app') ? ' active' : '' }}" style="color: #000; font-weight: bold;">
              <i class="fa fa-user" aria-hidden="true" style="font-size: 24px;"></i>
            </a>
            <form style="padding: 15px;" id="logoutForm" method="POST" action="{{ route('logout') }}">
              @csrf
              <input class="btn btn-dark" type="submit" value="Logout">
            </form>
          @else
            <a style="color: #000; font-weight: bold;" href="{{url('/login')}}">
              <i class="fa fa-user" aria-hidden="true"></i> Login
            </a>
            <a style="color: #000; font-weight: bold;" href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i> Register
            </a>
          @endauth
        @endif
      </div>
    </div>
  </nav>
</header>

<script>
  // Toggle icon between hamburger and X on mobile toggle
  document.querySelector('.navbar-toggler').addEventListener('click', function() {
    const navbarCollapse = document.getElementById('navbarSupportedContent');
    const togglerIcon = this.querySelector('.navbar-toggler-icon');

    // Toggle the icon based on the collapse state
    if (navbarCollapse.classList.contains('show')) {
      togglerIcon.innerHTML = '&#9776;'; // Set to hamburger icon
    } else {
      togglerIcon.innerHTML = '&#10005;'; // Set to X icon
    }
  });

  // Ensure the icon resets when resizing the window
  window.addEventListener('resize', function() {
    const navbarCollapse = document.getElementById('navbarSupportedContent');
    const togglerIcon = document.querySelector('.navbar-toggler-icon');

    if (window.innerWidth >= 992) {
      // Reset to hamburger icon on larger screens
      togglerIcon.innerHTML = '&#9776;';
      navbarCollapse.classList.remove('show');
    }
  });
</script>

<style>
  /* Responsive Brand Text */
  .brand-text {
    font-size: 24px;
  }

  @media (min-width: 768px) {
    .brand-text {
      font-size: 32px;
    }
  }

  @media (min-width: 992px) {
    .brand-text {
      font-size: 36px;
    }
  }

  @media (min-width: 1200px) {
    .brand-text {
      font-size: 40px;
    }
  }
</style>


<script>
  document.querySelectorAll('.nav-link').forEach(link => {
    if (link.classList.contains('active')) {
      link.classList.add('active'); // Add active class on page load
    }

    link.addEventListener('click', function() {
      document.querySelectorAll('.nav-link').forEach(otherLink => {
        otherLink.classList.remove('active'); // Remove underline from other links
      });
      this.classList.add('active'); // Add underline to clicked link
    });
  });
</script>



<script type="text/javascript">

document.getElementById('logoutForm').addEventListener('submit', function(ev) {
  ev.preventDefault();

  swal({
    title: "Are You Sure You Want To Logout?",
    text: "You will be logged out",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then((willLogout) => {
    if (willLogout) {
      this.submit(); // Submit the form if user confirms
    }
  });
});

    </script>

<script>
  $(document).ready(function() {
    // Toggle the "toggled" class on the navbar-toggler and collapse menu when clicked
    $('.navbar-toggler').on('click', function() {
      const navbarCollapse = $('#navbarSupportedContent');
      const isExpanded = $(this).hasClass('toggled');

      if (isExpanded) {
        // If expanded, remove toggled class and collapse menu
        $(this).removeClass('toggled');
        navbarCollapse.collapse('hide');
      } else {
        // If not expanded, add toggled class and show menu
        $(this).addClass('toggled');
        navbarCollapse.collapse('show');
      }
    });

    // Close the menu and reset the icon when a link is clicked (for mobile)
    $('.navbar-nav .nav-link').on('click', function() {
      $('#navbarSupportedContent').collapse('hide'); // Collapse the navbar
      $('.navbar-toggler').removeClass('toggled'); // Reset the toggle icon
    });

    // Ensure the icon resets when resizing the window
    $(window).on('resize', function() {
      if ($(window).width() >= 992) {
        $('.navbar-toggler').removeClass('toggled'); // Reset to hamburger icon on larger screens
        $('#navbarSupportedContent').removeClass('show'); // Ensure the menu is collapsed
      }
    });
  });
</script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('home.css')

     <!-- Sorting and Filtering Form -->
     <div class="filter-sort-container">
    <form method="GET" action="{{ route('myorders') }}" style="display: flex; align-items: center; gap: 15px;">
        <div class="form-group">
            <label for="status" class="form-label">Filter by Status:</label>
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="all" {{ request('status', 'all') == 'all' ? 'selected' : '' }}>All</option>
                <option value="In Queue" {{ request('status') == 'In Queue' ? 'selected' : '' }}>In Queue</option>
                <option value="Ongoing Service" {{ request('status') == 'Ongoing Service' ? 'selected' : '' }}>Ongoing Service</option>
                <option value="Finished" {{ request('status') == 'Finished' ? 'selected' : '' }}>Finished</option>
            </select>
        </div>
        <div class="form-group">
            <label for="sort" class="form-label">Sort By:</label>
            <select name="sort" class="form-select" onchange="this.form.submit()">
                <option value="newest" {{ request('sort', 'newest') == 'newest' ? 'selected' : '' }}>Newest Orders</option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest Orders</option>
                
            </select>
        </div>
        <div class="form-group">
            <label for="date_filter" class="form-label">Filter By Date:</label>
            <select name="date_filter" class="form-select" onchange="this.form.submit()">
                <option value="" disabled {{ request('date_filter') == '' ? 'selected' : '' }}>Select Date Range</option>
                <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Today</option>
                <option value="week" {{ request('date_filter') == 'week' ? 'selected' : '' }}>Last 7 Days</option>
                <option value="month" {{ request('date_filter') == 'month' ? 'selected' : '' }}>Last 30 Days</option>
            </select>
        </div>
    </form>
</div>

<div class="div_center" style="display: flex; flex-wrap: wrap; justify-content: center;">
    @foreach($order as $index => $orders)
    <div class="card" style="border: none; border-radius: 15px; background: #fff; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); width: 1100px; margin: 30px 15px; transition: transform 0.3s ease, box-shadow 0.3s ease; display: flex; flex-direction: row; align-items: center; justify-content: space-between; padding: 25px; height: 400px;">

        <!-- Image Section -->
        <div class="card-image" style="width: 45%; height: 100%; overflow: hidden; border-radius: 10px; flex-shrink: 0; order: {{ $index % 2 == 0 ? 1 : 2 }};">
            <img src="/products/{{$orders->product->image}}" alt="Service Image" style="width: 100%; height: 100%; object-fit: cover; border-radius: 10px;">
        </div>

        <!-- Card Content Section -->
        <div class="card-content" style="padding-left: 30px; width: 50%; color: #333; display: flex; flex-direction: column; justify-content: space-between; order: {{ $index % 2 == 0 ? 2 : 1 }}; overflow: hidden;">

            <!-- Title -->
            <h3 style="font-size: 20px; font-weight: bold; margin-bottom: 10px; color: #333; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$orders->product->title}}</h3>

            <!-- Service Date & Time -->
            <p style="font-size: 14px; color: #333; margin-bottom: 10px; line-height: 1.4; font-weight: bold">Service Date & Time: 
                {{ $orders->service_datetime ? \Carbon\Carbon::parse($orders->service_datetime)->format('F j, Y \a\t g:i A') : 'Not scheduled' }}
            </p>

            <!-- Countdown or Service Status -->
            <div style="color: #333; font-weight: bold; margin-bottom: 10px;" id="countdown-{{ $orders->id }}">
                @if($orders->status === 'Ongoing Service')
                    Service Ongoing
                @elseif($orders->status === 'Finished')
                    Service Completed
                @elseif($orders->countdownTimer && $orders->countdownTimer->countdown_ends_at)
                    <span class="countdown-timer" data-countdown="{{ $orders->countdownTimer->countdown_ends_at }}">Loading...</span>
                @else
                    Not finalized
                @endif
            </div>

            <!-- Status Button -->
            <span class="status-btn 
                @if($orders->status == 'In Queue') 
                    btn-warning 
                @elseif($orders->status == 'Ongoing Service') 
                    btn-info 
                @elseif($orders->status == 'Finished') 
                    btn-success 
                @elseif($orders->status == 'Cancelled') 
                    btn-danger 
                @endif" 
                style="padding: 6px 12px; font-size: 14px; border-radius: 20px; display: inline-block; margin-bottom: 10px; text-transform: capitalize; text-align: center;">
                {{$orders->status}}
            </span>

            <!-- Details Button -->
            <button class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#detailsModal-{{ $orders->id }}" style="border-radius: 20px; font-weight: bold; font-size: 14px; padding: 6px 12px;">Details</button>
            
            <!-- Finalization Details -->
            @if($orders->finalization)
                <div class="finalization-details" style="text-align: left;">
                    <h4 style="font-size: 16px; font-weight: bold; margin-bottom: 10px;">Finalized Details</h4>
                    <p style="font-size: 14px; margin-bottom: 5px;"><strong>Total Price:</strong> ${{ $orders->finalization->total_price }}</p>
                    <p style="font-size: 14px;"><strong>Description:</strong> {{ $orders->finalization->description }}</p>
                </div>
            @endif

           <!-- Rate Now Button -->
@if($orders->status === 'Finished' && !$orders->rating)
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ratingModal{{ $orders->id }}" style="font-size: 14px; padding: 6px 12px; border-radius: 20px; background-color: #007bff; color: #fff; font-weight: bold;">
        Rate Now!
    </button>
@endif



        </div>
    </div>
    @endforeach
</div>

@foreach($order as $index => $orders)
<!-- Rating Modal -->
<div class="modal fade" id="ratingModal{{ $orders->id }}" tabindex="-1" role="dialog" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ratingModalLabel">Rate Your Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('orders.rate', $orders->id) }}" method="POST">
                    @csrf
                    <div class="rating-stars" style="display: flex; gap: 8px; align-items: center; margin-bottom: 10px;">
                        <label for="rating" style="font-weight: bold; color:#333; font-size: 14px;">Rating:</label>
                        <div id="star-rating-{{ $orders->id }}" class="star-rating" style="cursor: pointer;">
                            @for($i = 1; $i <= 5; $i++)
                                <span class="star" data-value="{{ $i }}" style="font-size: 24px; color: #ddd;">&#9733;</span>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="rating-input-{{ $orders->id }}" required>
                    </div>

                    <label for="comment" style="font-weight: bold; font-size: 14px; margin-top: 10px; color:#333;">Comment:</label>
                    <textarea name="comment" id="comment" rows="3" placeholder="Write your comment here..." style="width: 100%; padding: 8px; border-radius: 10px; border: 1px solid #ddd; margin-top: 5px;"></textarea>

                    <button type="submit" class="btn btn-primary" style="margin-top: 10px; padding: 6px 12px; border-radius: 20px; background-color: #007bff; color: #fff; font-weight: bold; font-size: 14px;">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($order as $orders)
<!-- Details Modal -->
<div class="modal fade" id="detailsModal-{{ $orders->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div style="color: #000;" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="detailsModalLabel">Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-primary">Customer Information</h6>
                            <p><strong>Name:</strong> {{ $orders->name }}</p>
                            <p><strong>Address:</strong> {{ $orders->rec_address }}</p>
                            <p><strong>Phone:</strong> {{ $orders->phone }}</p>
                        </div>
                    </div>

                    <!-- Product Information -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <h6 class="text-primary">Service Information</h6>
                            <p><strong>Title:</strong> {{ $orders->product->title }}</p>
                            <p><strong>Price:</strong> ${{ $orders->product->price }}</p>
                            
                            <p><strong>Assigned Staff:</strong> {{ $orders->staff_id ? $orders->staff->name : 'N/A' }}</p>
                            <p><strong>Vehicle Type:</strong> {{ $orders->vehicle ?: 'N/A' }}</p>
<p><strong>Size:</strong> {{ $orders->size ?: 'N/A' }}</p>

                            <p><strong>Service Date & Time:</strong> {{ \Carbon\Carbon::parse($orders->service_datetime)->format('F j, Y \a\t g:i A') }}</p>
                            <p><strong>Status:</strong>
                            @if($orders->status == 'In Queue')
    <span class="badge badge-warning" style="font-size: 18px; padding: 10px 20px; border-radius: 20px;">{{ $orders->status }}</span>
@elseif($orders->status == 'Ongoing Service')
    <span class="badge badge-info" style="font-size: 18px; padding: 10px 20px; border-radius: 20px;">{{ $orders->status }}</span>
@elseif($orders->status == 'Finished')
    <span class="badge badge-success" style="font-size: 18px; padding: 10px 20px; border-radius: 20px;">{{ $orders->status }}</span>
@elseif($orders->status == 'Cancelled')
    <span class="badge badge-danger" style="font-size: 18px; padding: 10px 20px; border-radius: 20px;">{{ $orders->status }}</span>
@endif

                            </p>
                        </div>
                        <div class="col-md-6 text-center">
                            <h6 class="text-primary">Product Image</h6>
                            <img src="products/{{ $orders->product->image }}" alt="Product Image" class="img-fluid rounded product-image">
                        </div>
                    </div>

                    

                    <!-- Finalized Order Information -->
                    @if($orders->finalization)
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6 class="text-primary">Finalized Order Information</h6>
                            <p><strong>Total Price:</strong> {{ $orders->finalization->total_price }}</p>
                            <p><strong>Description:</strong> {{ $orders->finalization->description }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Rating and Comment -->
                    @if($orders->rating)
                    <div class="row mb-3">
                        <div class="col-md-12 rating-display">
                            <h6 class="text-primary">Customer Feedback</h6>
                            <p><strong>Rating:</strong>
                                @for($i = 1; $i <= 5; $i++)
                                    <span style="color: {{ $i <= $orders->rating->rating ? '#FFD700' : '#ddd' }};">&#9733;</span>
                                @endfor
                            </p>
                            <p><strong>Comment:</strong> {{ $orders->rating->comment }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="pagination">
    {{ $order->links() }}
</div>

</div>

  

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Iterate over each countdown timer in the cards
        document.querySelectorAll('.countdown-timer').forEach(function(timerElement) {
            const countdownEndTime = new Date(timerElement.getAttribute('data-countdown')).getTime();
            const countdownDisplay = timerElement.parentElement;

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = countdownEndTime - now;

                // Check if the countdown has ended
                if (distance < 0) {
                    countdownDisplay.innerHTML = "Time Expired";
                    return;
                }

                // Calculate minutes and seconds remaining
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdownDisplay.innerHTML = `${minutes}m ${seconds}s`;

                // Refresh every second
                setTimeout(updateCountdown, 1000);
            }

            updateCountdown();
        });
    });
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>
</html>