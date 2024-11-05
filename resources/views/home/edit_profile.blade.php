<!DOCTYPE html>
<html>

<head>
  
@include('home.css')

<style type="text/css">
  /* footer section */
  .footer_section {
    margin-top: 45px;
    font-weight: 500;
  }

  .footer_section p {
    padding: 20px 0;
    margin: 0 auto;
    text-align: center;
    border-top: 1.5px solid #eeeeee;
    width: 80%;
  }

  .footer_section a {
    color: #cbc9c9;
  }
  /* end footer section */
</style>

</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3>Edit Account Information</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ url('/edit_profile') }}">
              @csrf
              @method('PUT')

              <!-- Name -->
              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                <div class="col-md-6">
                  <input type="text" id="name" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                </div>
              </div>

              <!-- Phone -->
              <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                <div class="col-md-6">
                  <input type="text" id="phone" class="form-control" name="phone" value="{{ Auth::user()->phone }}" required>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Update Profile
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end shop section -->

  <!-- info section -->
  <section class="info_section layout_padding2-top">
    <!-- footer section -->
    <footer class="footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> Shee Auto Polish & Ceramic Coating
        </p>
      </div>
    </footer>
    <!-- footer section -->
  </section>
  <!-- end info section -->

  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>
