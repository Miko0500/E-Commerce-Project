<!DOCTYPE html>
<html>

<head>
  


<style type="text/css">
  /* footer section*/
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

/* end footer section*/
</style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    <!-- slider section -->

    @include('home.css')

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>User Account Information</h3>
                    </div>
                    <div class="card-body">
                        <!-- Name -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" value="{{ Auth::user()->name }}" disabled>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                        </div>

                        <!-- Usertype -->
                        <div class="form-group row">
                            <label for="usertype" class="col-md-4 col-form-label text-md-right">User Type</label>
                            <div class="col-md-6">
                                <input type="text" id="usertype" class="form-control" value="{{ Auth::user()->usertype }}" disabled>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
                            <div class="col-md-6">
                                <input type="text" id="phone" class="form-control" value="{{ Auth::user()->phone }}" disabled>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>
                            <div class="col-md-6">
                                <input type="text" id="address" class="form-control" value="{{ Auth::user()->address }}" disabled>
                            </div>
                        </div>

                        <!-- Joined On -->
                        <div class="form-group row">
                            <label for="created_at" class="col-md-4 col-form-label text-md-right">Joined On</label>
                            <div class="col-md-6">
                                <input type="text" id="created_at" class="form-control" value="{{ Auth::user()->created_at->format('d M Y') }}" disabled>
                            </div>
                        </div>

                        <!-- Email Verified On -->
                        <div class="form-group row">
                            <label for="email_verified_at" class="col-md-4 col-form-label text-md-right">Email Verified On</label>
                            <div class="col-md-6">
                                <input type="text" id="email_verified_at" class="form-control" value="{{ optional(Auth::user()->email_verified_at)->format('d M Y') ?? 'Not Verified' }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
    <a href="{{ url('/edit_profile') }}" class="btn-get-started">Edit Profile</a>
    </div>
</div>


                    </div>
                </div>
            </div>
        </div>
    </div>


  <!-- end shop section -->







  <!-- contact section -->

 

  <!-- end contact section -->

   

  <!-- info section -->
  <section class="info_section  layout_padding2-top">
    
    
    <!-- footer section -->
    <footer class=" footer_section">
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>