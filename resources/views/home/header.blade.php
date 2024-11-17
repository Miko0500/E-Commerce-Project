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
    z-index: 1050 !important; /* Ensure the modal stays above everything */
    
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
    <a class="navbar-brand" style="text-decoration: none;">
      <span class="brand-text" style="
        font-size: 2rem; /* Default font size */
        font-weight: 900;
        margin: 0;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #000;
        padding: 10px;
        display: inline-block; /* Ensure it behaves properly with wrapping */
        word-wrap: break-word; /* Breaks long words when needed */
        white-space: normal; /* Allows text to wrap */
      ">
        Shee Auto Polish & Ceramic Coating
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">&#9776;</span> <!-- Unicode hamburger icon -->
    </button>

  <!-- Navbar Code -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a style="margin-right: -20px" class="nav-link{{ request()->is('/') ? ' active' : '' }}" href="{{ url('/') }}">
                <i class="bi bi-house-fill"></i> Home <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a style="margin-right: -20px" class="nav-link{{ request()->is('product') ? ' active' : '' }}" href="{{ url('/product') }}">
                <i class="bi bi-clipboard-check-fill"></i> Services <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a style="margin-right: -20px" class="nav-link{{ request()->is('vehicle') ? ' active' : '' }}" href="{{ url('/vehicle') }}">
                <i class="bi bi-car-front-fill"></i> Vehicles <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a style="margin-right: -20px" class="nav-link{{ request()->is('about_us') ? ' active' : '' }}" href="{{ url('/about_us') }}">
                <i class="bi bi-file-person-fill"></i> About Us <span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a style="margin-right: -20px" class="nav-link{{ request()->is('contact_us') ? ' active' : '' }}" href="{{ url('/contact_us') }}">
                <i class="bi bi-person-lines-fill"></i> Contact Us <span class="sr-only">(current)</span>
            </a>
        </li>

        @if (Route::has('login'))
        @auth
        <li class="nav_item">
            <a style="color: #000; margin-right: 20px" class="nav-link{{ request()->is('mycart') ? ' active' : '' }}" href="{{url('mycart')}}">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i> [{{$count}}]Pending 
            </a>
        </li>

        <li class="nav_item">
            <a style="color: #000; margin-right: 20px" class="nav-link{{ request()->is('myorders') ? ' active' : '' }}" href="{{url('myorders')}}">
                <i class="bi bi-cart-check-fill"></i> [{{$counts}}]Booked <span class="sr-only">(current)</span>
            </a>
        </li>

        <li class="nav_item">
            <a href="{{url('profile_app')}}" class="nav-link{{ request()->is('profile_app') ? ' active' : '' }}" style="color: #000; font-weight: bold; margin-right: 20px">
                <i class="fa fa-user" aria-hidden="true" style="font-size: 24px;"></i>
            </a>
        </li>

        <li class="nav_item">
            <form style="padding: 15px; margin-right: 20px" id="logoutForm" method="POST" action="{{ route('logout') }}">
                @csrf
                <input class="btn btn-dark" type="submit" value="Logout">
            </form>
        </li>

        @else
        <li class="nav_item">
            <a style="color: #000; font-weight: bold; margin-right: 50px" href="{{url('/login')}}">
                <i style="margin-right: 50px" class="fa fa-user" aria-hidden="true"></i> Login
            </a>
        </li>

        <li class="nav_item">
            <a style="color: #000; font-weight: bold; margin-right: 50px" href="{{url('/register')}}">
                <i style="margin-right: 50px" class="fa fa-vcard" aria-hidden="true"></i> Register
            </a>
        </li>
        @endauth
        @endif
    </ul>
</div>

<style>
    /* Center the content when the navbar is expanded on small screens */
    .navbar-collapse {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        text-align: center;
    }

    /* Style the nav items when in mobile view */
    .navbar-nav {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }

    .navbar-nav .nav-item {
        width: 100%;
        text-align: center;
        margin-bottom: 5px; /* Reduced space between items */
    }

    .navbar-toggler {
        display: block; /* Ensure the toggle button is shown on small screens */
    }

    /* Mobile Navbar Styling */
    @media (max-width: 768px) {
        .navbar-nav {
            flex-direction: column;
            align-items: center;
        }

        .navbar-nav .nav-item {
            width: 100%;
            padding-left: 15px;
            margin-bottom: 5px; /* Adjusted margin for less space between items */
        }

        .navbar-collapse {
            flex-grow: 1;
            display: flex;
            justify-content: space-between;
        }

        .user_option {
            margin-top: 20px;
        }

        .user_option a {
            width: 100%;
            text-align: left;
            padding-left: 15px;
        }

        .navbar-toggler {
            margin-right: 15px;
        }
    }

    /* Desktop Navbar Styling */
    @media (min-width: 769px) {
        /* Center the navbar on desktop screens */
        .navbar-collapse {
            flex-direction: row;
            justify-content: center; /* Center all items horizontally */
            align-items: center; /* Align items vertically */
        }

        .navbar-nav {
            flex-direction: row;
            align-items: center;
        }

        .navbar-nav .nav-item {
            padding-left: 0;
            margin-right: 40px; /* Reduced space between items */
        }

        /* User Options */
        .user_option {
            display: flex;
            justify-content: center; /* Center user options */
        }
    }
</style>



  </nav>
</header>

<!-- Add this to adjust the brand text size on smaller screens -->
<style>
  @media (max-width: 768px) {
    .brand-text {
      font-size: 1.5rem; /* Smaller font size on medium screens */
      letter-spacing: 1px;
    }
  }

  @media (max-width: 480px) {
    .brand-text {
      font-size: 1rem; /* Even smaller font size on mobile screens */
      letter-spacing: 0.5px; /* Slightly reduced spacing */
    }
  }
</style>

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