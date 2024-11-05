    <!DOCTYPE html>
    <html>

    <head>
    
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style type="text/css">

        .div_deg
        {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        table
        {
            border: 2px solid black;
            text-align: center;
            width: 800px;
        }

        th
        {
            border: 2px solid gray;
            text-align: center;
            color: white;
            font-size: 20px;
            font-weight: bold;
            background-color: grey;
        }

        td
        {
            border: 2px solid gray;
            color: black;
            font-size: large;
            font-weight: bold;
        }

        .cart_value
        {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

        .order_deg
        {
            padding-right: 100px;
            margin-top: -50px;
        }
        
        label
        {
            display: inline-block;
            width: 150px;
        }

        .div_gap
        {
            padding: 20px;
        }

        /* Additional Styles for the Card */
        .card {
            border: 2px solid #000;
            border-radius: 10px;
            padding: 20px;
            background-color: #f9f9f9;
        }

        
        /* Style for pagination links */
        .pagination li a {
            color: red; /* Change to your desired color */
            /* Add any additional styles here */
        }

        /* Style for active pagination link */
        .pagination li.active a {
            color: red; /* Change to your desired active color */
            /* Add any additional styles here */
        }
        h3
        {
            border: 2px solid black;
            text-align: center;
            color: white;
            font-size: 20px;
            font-weight: bold;
            background-color: grey;
        }
        .form-group{
            color: #000;
        }
        .cardy {
    border: 2px solid #000;
    border-radius: 10px;
    padding: 20px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow */
    width: fit-content;
    margin: 20px; /* Add some spacing around the card */
}
.container {
            padding-left: 15px;
            padding-right: 15px;
        }
    </style>



    </head>

    <body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        @include('home.css')
      
       

    </div>
    

    <div class="div_deg">
    <!-- Wrap the table in a card -->
    <div class="cardy">
        <table>
            <tr>
                <th>Service Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Delete</th>
            </tr>

            <?php
            $totalValue = 0; // Initialize total value variable
            ?>

            @foreach($cart as $carts)
            <tr>
                <td>{{$carts->product->title}}</td>
                <td>{{$carts->product->price}}</td>
                <td>
                    <img width="150" height="150" src="/products/{{$carts->product->image}}">
                </td>
                <td>
                    <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_cart',$carts->id)}}">Remove</a>
                </td>
            </tr>

            @php
                $totalValue += $carts->product->price;
            @endphp

            @endforeach
        </table>
    </div>
</div>

    <div class="div_deg">

    {{$cart->onEachSide(1)->links()}}

    </div>


    <!-- Place the order_deg card here -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form  action="{{url('confirm_order')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Client Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}">
                        </div>
                        <div class="form-group">
                            <label for="address">Client Address</label>
                            <textarea name="address" id="address" class="form-control">{{Auth::user()->address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="phone">Client Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{Auth::user()->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="staff_id">Select Staff</label>
                            <select name="staff_id" id="staff_id" class="form-control" required>
                                <option value="">Select Staff</option>
                                @foreach($staff as $staffMember)
                                    <option value="{{ $staffMember->id }}">{{ $staffMember->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
        <label for="vehicle">Select Vehicle</label>
        <select name="vehicle_id" id="vehicle" class="form-control" onchange="updateSizes()" required>
        <option value="">Select Vehicle</option>
        @foreach($vehicles as $vehicle)
        <option value="{{ $vehicle->id }}" data-sizes="{{ json_encode($vehicle->sizes) }}">{{ $vehicle->type }}</option>
        @endforeach
    </select>

    </div>


    <div class="form-group">
        <label for="size">Select Size</label>
        <select name="size" id="size" class="form-control">
        <option value="">Select Size</option>
        @foreach($vehicles as $vehicle)
        <option value="{{ $vehicle->id }}" data-sizes="{{ json_encode($vehicle->sizes) }}">{{ $vehicle->type }}</option>
    @endforeach


        </select>
    </div>


    <div class="form-group">
                <label for="service_datetime">Preferred Date & Time</label>
                <input type="datetime-local" name="service_datetime" id="service_datetime" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="fetchServiceDatetimes()">View All Taken Datetimes</button>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Place Order</button>
            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End order_deg card -->

    

    <div class="modal fade" id="allDatetimesModal" tabindex="-1" aria-labelledby="allDatetimesModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="text-dark modal-title" id="allDatetimesModalLabel">All Unavailable Datetimes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul id="datetimeList" class="text-dark list-group"></ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are You Sure You Want To Delete This Order?",
                text: "This Delete Will Be Permanent",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willCancel)=>{
                if(willCancel) {
                    window.location.href=urlToRedirect;
                }
            });
        }

        function updateSizes() {
        const vehicleSelect = document.getElementById('vehicle');
        const sizeSelect = document.getElementById('size');
        const selectedVehicle = vehicleSelect.options[vehicleSelect.selectedIndex];
        
        // Get the sizes from the data attribute
        const sizes = JSON.parse(selectedVehicle.getAttribute('data-sizes'));

        // Clear existing options
        sizeSelect.innerHTML = '<option value="">Select Size</option>';

        // Populate size options based on selected vehicle
        sizes.forEach(size => {
            // Ensure size is a simple letter and not an object or special character
            const sizeLetter = size.trim(); // Clean any extra whitespace
            if (sizeLetter.length > 0) {
                sizeSelect.innerHTML += `<option value="${sizeLetter}">${sizeLetter}</option>`;
            }
        });
    }





    </script>

    <script>
        (function() {
            history.pushState(null, null, location.href);
            window.onpopstate = function() {
                history.go(1);
            };
        })();
    </script>

<script>
        let unavailableDatetimes = [];

        // Fetch unavailable datetimes on page load
        function loadUnavailableDatetimes() {
            $.ajax({
                url: "{{ url('/fetch-unavailable-datetimes') }}",
                method: "GET",
                success: function(data) {
                    unavailableDatetimes = data;
                },
                error: function() {
                    toastr.error("Error loading unavailable datetimes.");
                }
            });
        }

        // Call this function to populate the modal with the latest unavailable datetimes
        function fetchServiceDatetimes() {
            $.ajax({
                url: "{{ route('fetchServiceDatetimes') }}",
                method: "GET",
                success: function(data) {
                    const datetimeList = $('#datetimeList');
                    datetimeList.empty();
                    data.forEach(order => {
                        datetimeList.append(`<li class="list-group-item">Taken: ${order.service_datetime}</li>`);
                    });
                    $('#allDatetimesModal').modal('show');  // Show modal with updated data
                },
                error: function() {
                    toastr.error("Failed to fetch datetimes.");
                }
            });
        }

        // Attach modal loading to button
        $(document).ready(function() {
    loadUnavailableDatetimes();

    $('#viewDatetimesBtn').on('click', function() {
        fetchServiceDatetimes();  // Load data when button is clicked
    });

    $('#orderForm').on('submit', function(event) {
        event.preventDefault();
        const chosenDateTime = $('#service_datetime').val();

        // Check if selected datetime is unavailable
        if (unavailableDatetimes.includes(chosenDateTime)) {
            toastr.error("The selected date and time is taken. Choose another.");
        } else {
            // AJAX order placement
            $.ajax({
                url: "{{ url('confirm_order') }}",
                method: "POST",
                data: $(this).serialize(),
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                success: function() {
                    toastr.success("Order placed successfully.");
                    loadUnavailableDatetimes();  // Reload unavailable datetimes after order

                    // Full page reload after successful order
                    location.reload();  // Refreshes the page to show updated state
                },
                error: function() {
                    toastr.error("Error placing order.");
                }
            });
        }
    });
});
    </script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const dateTimeInput = document.getElementById('service_datetime');

    // Set min attribute to current date and time in the format "YYYY-MM-DDTHH:MM"
    function setMinDateTime() {
      const now = new Date();
      const year = now.getFullYear();
      const month = String(now.getMonth() + 1).padStart(2, '0'); // Months are 0-based
      const day = String(now.getDate()).padStart(2, '0');
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');

      // Format: "YYYY-MM-DDTHH:MM"
      const minDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
      dateTimeInput.min = minDateTime;
    }

    // Restrict selection to times between 8 AM and 5 PM
    function restrictTimeRange() {
      const selectedDateTime = new Date(dateTimeInput.value);
      const selectedHours = selectedDateTime.getHours();

      // Check if the selected time is outside 8 AM - 5 PM
      if (selectedHours < 8 || selectedHours > 17 || (selectedHours === 17 && selectedDateTime.getMinutes() > 0)) {
        alert("Working hours are 8:00 AM to 5:00 PM. Please select a time between 8:00 AM and 5:00 PM.");
        dateTimeInput.value = ""; // Clear the input if invalid
      }
    }

    // Initial set of min date-time
    setMinDateTime();

    // Update the min date-time every minute in case the user opens the form later
    setInterval(setMinDateTime, 60000); // Update every 60 seconds

    // Add event listener to validate time range on change
    dateTimeInput.addEventListener('change', restrictTimeRange);
  });
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <section class="info_section  layout_padding2-top">
    
        
        @include('home.footer')

    </section>

    </body>

    </html>