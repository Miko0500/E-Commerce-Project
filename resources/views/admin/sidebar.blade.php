@include('admin.css')

<div class="d-flex align-items-stretch">
  
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          
          <div class="avatar"><img src="{{asset('/images/bg3.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 style="color: #F88379;" class="h5">Admin</h1>
            <p style="color: #F88379;">The Owner</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span style="color: white;" class="heading">Main</span>
        <ul class="list-unstyled">
                <li style="color: white;"><a href="{{url('admin/dashboard')}}"> <i style="color: #F88379;" class="bi bi-house-fill"></i>Home </a></li>

                <li style="color: white;">
                    <a href="{{url('view_category')}}"> <i style="color: #F88379;" class="icon-grid"></i>Category 
                </a>
                
                </li>
                


                <li style="color: white;"><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i style="color: #F88379;" class="bi bi-cart-plus-fill"></i>Products </a>
                  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                    <li style="color: white;"><a href="{{url('add_product')}}">Add Product</a></li>
                    <li style="color: white;"><a href="{{url('view_product')}}">View Product</a></li>
                    
                  </ul>
                </li>


                <li style="color: white;">
                    <a href="{{url('view_orders')}}"> <i style="color: #F88379;" class="bi bi-bag-check-fill"></i>Orders 
                </a>

                </li>

                
                <li style="color: red;">
                    <a href="#" id="logout_button"> <i class="fa fa-sign-out"></i>Logout
                </a>
                </li>
                <form id="logout_form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                
                

        </ul>
      </nav>   
      
      <script type="text/javascript">
  // Listen for click on logout button
  document.getElementById('logout_button').addEventListener('click', function(ev) {
    ev.preventDefault();

    // Show SweetAlert dialog
    swal({
      title: "Are You Sure You Want To Logout?",
      text: "You will be logged out",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willLogout) => {
      if (willLogout) {
        // Submit the form using POST method
        var form = document.getElementById('logout_form');
        form.submit();
      }
    });
  });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
