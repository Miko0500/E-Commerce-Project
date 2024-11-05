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
    
    font-weight: bold;
    
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
  padding-top: -100px;
  margin-top: -60px;
  
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

</style>

<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
  
    <a  class="navbar-brand" style="text-decoration: none;">
      <span style="  font-size: 40px;
    font-weight: 900;
    margin: 0;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #000; /* Change text color to white */
    
    padding: 10px;
    padding-top: -100px;
    margin-top: -60px;
  ">
       titi ni shahaff maliit   Shee Auto Polish & Ceramic Coating
      </span>
  </a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class=""></span>
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
        <li class="nav-item">
          <a class="nav-link{{ request()->is('staffs') ? ' active' : '' }}" href="{{ url('/staffs') }}">
            <i class="bi bi-person-fill-check"></i> Staffs <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link{{ request()->is('why') ? ' active' : '' }}" href="{{ url('/why') }}">
            <i class="bi bi-patch-question-fill"></i> Why Us <span class="sr-only">(current)</span>
          </a>
        </li>
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
      <a style="color: #000; font-weight: bold;" class="nav-link{{ request()->is('myorders') ? ' active' : '' }}" href="{{url('myorders')}}">
        <i class="bi bi-cart-check-fill" ></i> [{{$counts}}]Booked  <span class="sr-only">(current)</span>
      </a>
      <a style="color: #000; font-weight: bold;" class="nav-link{{ request()->is('mycart') ? ' active' : '' }}" href="{{url('mycart')}}">
        <i class="fa fa-shopping-bag" aria-hidden="true" ></i> [{{$count}}]Pending 
      </a>
      <!-- Profile section -->
      <div class="nav-item">
    <a href="{{url('profile_app')}}" class="profile" style="color: #000; font-weight: bold; text-decoration: none;">
        <i class="fa fa-user" aria-hidden="true" style="font-size: 24px;"></i>
    </a>
</div>






      <!-- Logout button -->
      <form style="padding: 15px;" id="logoutForm" method="POST" action="{{ route('logout') }}">
        @csrf
        <input class="btn btn-dark" type="submit" value="Logout">
      </form>
    @else
      <a style="color: #000; font-weight: bold;" href="{{url('/login')}}">
        <i class="fa fa-user" aria-hidden="true"></i> <span>Login</span>
      </a>
      <a style="color: #000; font-weight: bold;" href="{{url('/register')}}">
        <i class="fa fa-vcard" aria-hidden="true"></i> <span>Register</span>
      </a>
    @endauth
  @endif
</div>

    </div>
  </nav>  
</header>
<script>
  document.querySelectorAll('.nav-link').forEach(link => {
    if (link.classList.contains('active')) {
      link.style.backgroundColor = '#000';
      link.style.color = '#fff'; // Set text color to white
    }

    link.addEventListener('click', function() {
      document.querySelectorAll('.nav-link').forEach(otherLink => {
        otherLink.style.backgroundColor = ''; // Reset background color of other links
        otherLink.style.color = ''; // Reset text color of other links
      });
      this.style.backgroundColor = '#000'; // Set active link background to black
      this.style.color = '#fff'; // Set active link text color to white
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>