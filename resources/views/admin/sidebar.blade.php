@include('admin.css')
<Style>

/* Hover effect for the sidebar links */
#sidebar ul li a:hover {
    background-color: #000; /* Darker blue background */
    color: #fff; /* White text */
    
}

/* Active link styling when the page is selected */
#sidebar ul li a.active {
    background-color: #000; /* Blue background for the active link */
    color: #fff; /* White text */
    font-weight: bold; /* Make the text bold for active link */
}

/* Optional: Active link for the dropdown links */
#sidebar ul li .collapse.show li a.active {
    background-color: #000;
    color: #fff;
}


  
</Style>
<div class="d-flex align-items-stretch">
  
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          
          <div class="avatar"><img src="{{asset('/images/bg3.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 style="color: #007bff;" class="h5">Admin</h1>
            <p style="color: #007bff;">The Owner</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span style="color: white;" class="heading">Main</span>
        <ul class="list-unstyled">
                <li style="color: white;"><a href="{{url('admin/dashboard')}}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}"> <i style="color: #007bff;" class="bi bi-house-fill"></i>Home </a></li>

                <li style="color: white;">
                    <a href="{{url('view_category')}}" class="{{ request()->is('view_category') ? 'active' : '' }}"> <i style="color: #007bff;" class="icon-grid"></i>Category 
                </a>
                
                </li>

                <li style="color: white;"><a href="#vehicleDropdown" class="{{ request()->is('add_vehicle') || request()->is('view_vehicle') ? 'active' : '' }}" aria-expanded="false" data-toggle="collapse"> <i style="color: #007bff;" class="bi bi-car-front-fill"></i>Vehicles </a>
                  <ul id="vehicleDropdown" class="collapse list-unstyled ">
                    <li style="color: white;"><a href="{{url('add_vehicle')}}" class="{{ request()->is('add_vehicle') ? 'active' : '' }}">Add Vehicle</a></li>
                    <li style="color: white;"><a href="{{url('view_vehicle')}}" class="{{ request()->is('view_vehicle') ? 'active' : '' }}">View Vehicle</a></li>
                    
                  </ul>
                </li>
                
                <li style="color: white;"><a href="#staffDropdown" class="{{ request()->is('add_staff') || request()->is('view_staff') ? 'active' : '' }}" aria-expanded="false" data-toggle="collapse"> <i style="color: #007bff;" class="bi bi-person-fill-check"></i>Staff </a>
                  <ul id="staffDropdown" class="collapse list-unstyled ">
                    <li style="color: white;"><a href="{{url('add_staff')}}" class="{{ request()->is('add_staff') ? 'active' : '' }}">Add Staff</a></li>
                    <li style="color: white;"><a href="{{url('view_staff')}}" class="{{ request()->is('view_staff') ? 'active' : '' }}">View Staff</a></li>
                    
                  </ul>
                </li>


                <li style="color: white;"><a href="#serviceDropdown" class="{{ request()->is('add_product') || request()->is('view_product') ? 'active' : '' }}" aria-expanded="false" data-toggle="collapse"> <i style="color: #007bff;" class="bi bi-calendar2-plus icon"></i>Services </a>
                  <ul id="serviceDropdown" class="collapse list-unstyled ">
                    <li style="color: white;"><a href="{{url('add_product')}}" class="{{ request()->is('add_product') ? 'active' : '' }}">Add Service</a></li>
                    <li style="color: white;"><a href="{{url('view_product')}}" class="{{ request()->is('view_product') ? 'active' : '' }}">View Service</a></li>
                    
                  </ul>
                </li>


                <li style="color: white;">
                    <a href="{{url('view_orders')}}" class="{{ request()->is('view_orders') ? 'active' : '' }}"> <i style="color: #007bff;" class="bi bi-calendar2-check icon"></i>Bookings 
                </a>

                </li>

                <li style="color: white;">
                    <a href="{{url('reports')}}" class="{{ request()->is('reports') ? 'active' : '' }}"> <i style="color: #007bff;" class="bi bi-clipboard-data"></i>Reports 
                </a>

                </li>

                <li style="color: white;">
    <a href="{{ route('admin.users') }}" class="{{ request()->is('admin/users') ? 'active' : '' }}"> 
        <i style="color: #007bff;" class="fa fa-user"></i> User 
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
