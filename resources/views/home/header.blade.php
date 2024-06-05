<style>
  .nav-link {
    display: block;
    padding: 5px 10px; /* Adjust padding as needed */
    border-radius: 5px; /* Adjust border radius as needed */
    font-size: 14px; /* Adjust font size as needed */
  }
  .nav-item {
    padding: -5px -5px; /* This seems incorrect, remove it */
  }
</style>

<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <a class="navbar-brand" href="index.html">
      <span style="color: #7b1717;">Crochet With Me</span>
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
            <i class="bi bi-cart-fill"></i> Shop <span class="sr-only">(current)</span>
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
        <li class="nav-item">
          <a class="nav-link{{ request()->is('privacy') ? ' active' : '' }}" href="{{ url('/privacy') }}">
            <i class="bi bi-shield-fill-exclamation"></i>Privacy Policy<span class="sr-only">(current)</span>
          </a>
        </li>
      </ul>
      <div class="user_option">
  @if (Route::has('login'))
    @auth
      <a class="nav-link{{ request()->is('myorders') ? ' active' : '' }}" href="{{url('myorders')}}">
        <i class="bi bi-cart-check-fill"></i> [{{$counts}}]My Orders <span class="sr-only">(current)</span>
      </a>
      <a class="nav-link{{ request()->is('mycart') ? ' active' : '' }}" href="{{url('mycart')}}">
        <i class="fa fa-shopping-bag" aria-hidden="true"></i> [{{$count}}]Add To Orders
      </a>
      <!-- Profile section -->
      <div class="nav-item">
    <span class="profile">
        <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
    </span>
</div>



      <!-- Logout button -->
      <form style="padding: 15px;" id="logoutForm" method="POST" action="{{ route('logout') }}">
        @csrf
        <input class="btn btn-dark" type="submit" value="Logout">
      </form>
    @else
      <a href="{{url('/login')}}">
        <i class="fa fa-user" aria-hidden="true"></i> <span>Login</span>
      </a>
      <a href="{{url('/register')}}">
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
      link.style.backgroundColor = 'white';
    }

    link.addEventListener('click', function() {
      document.querySelectorAll('.nav-link').forEach(otherLink => {
        otherLink.style.backgroundColor = ''; // Reset other links
      });
      this.style.backgroundColor = 'white';
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