<!DOCTYPE html>
<html>

<head>
  


<style type="text/css">
  /* Footer Section */
  .footer_section {
    background-color: #333;
    padding: 20px 0;
    color: #fff;
    text-align: center;
    font-weight: 500;
    margin-top: 45px;
  }

  .footer_section p {
    margin: 0;
    padding: 10px 0;
    border-top: 1px solid #555;
    font-size: 16px;
  }

  .footer_section a {
    color: #ccc;
    text-decoration: none;
  }

  .footer_section a:hover {
    color: #fff;
    text-decoration: underline;
  }

  /* Card Styling */
  .card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }

  .card-header {
    background-color: #333;
    color: #fff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    text-align: center;
    padding: 15px;
    font-size: 1.5rem;
    font-weight: 700;
  }

  .card-body {
    padding: 20px 30px;
    background-color: #f9f9f9;
  }

  .form-group label {
    font-weight: 600;
    color: #555;
  }

  .form-control {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
    color: #333;
  }

  .form-control:disabled {
    background-color: #f5f5f5;
    color: #888;
  }

  /* Edit Profile Button */
  .btn-get-started {
    display: inline-block;
    padding: 10px 20px;
    color: #fff;
    background-color: #007bff;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 600;
    transition: background-color 0.3s ease;
  }

  .btn-get-started:hover {
    background-color: #0056b3;
  }
</style>
</head>

<body>
  <div class="hero_area">
    @include('home.header')
    @include('home.css')
  </div>

  <!-- User Account Information Card -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div style="color: #000;" class="card-header">
            User Account Information
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

            <!-- Edit Profile Button -->
            <!-- Edit Profile Button to Open Modal -->
            <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="button" class="btn-get-started" data-toggle="modal" data-target="#editProfileModal">Edit Profile</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="text-dark modal-title" id="editProfileModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="POST" action="{{ route('profile_update') }}">
    @csrf
    @method('PATCH') <!-- Method spoofing to use PATCH -->
    
    <!-- Form fields -->
    <div class="form-group">
        <label for="edit-name">Name</label>
        <input type="text" id="edit-name" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
    </div>
    
    <div class="form-group">
        <label for="edit-email">Email</label>
        <input type="email" id="edit-email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
    </div>
    
    <div class="form-group">
        <label for="edit-phone">Phone</label>
        <input type="text" id="edit-phone" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
    </div>
    
    <div class="form-group">
        <label for="edit-address">Address</label>
        <input type="text" id="edit-address" class="form-control" name="address" value="{{ Auth::user()->address }}">
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </div>
</form>


      </div>
    </div>
  </div>

   

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

  <script>
    document.getElementById('displayYear').textContent = new Date().getFullYear();
  </script>

  <!-- end info section -->
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>
</body>

</html>