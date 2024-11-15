    <!DOCTYPE html>
    <html>

    <head>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style type="text/css">

.div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
    }

    /* Table Styling */
    table {
        border-collapse: collapse;
        width: 100%; /* Full width */
        max-width: 100%; /* Max width set to 100% to make it as wide as the container */
        margin: 20px auto;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background-color: #333333;
        color: #ffffff;
        font-size: 20px;
        font-weight: bold;
        padding: 15px;
        text-align: center;
        text-transform: uppercase;
    }

    td {
        padding: 15px;
        text-align: center;
        font-size: 16px;
        color: #333333;
        font-weight: 500;
        border-bottom: 1px solid #ddd;
    }

    /* Remove border on the last row */
    tr:last-child td {
        border-bottom: none;
    }

    /* Hover effect on table rows */
    tr:hover {
        background-color: #f2f2f2;
        transition: background-color 0.3s ease;
    }

    /* Responsive styling */
    @media (max-width: 768px) {
        table, th, td {
            font-size: 14px;
        }

        th, td {
            padding: 10px;
        }
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
    margin: -40px; /* Add some spacing around the card */
}
.container {
            padding-left: 15px;
            padding-right: 15px;
        }

        /* Custom Flatpickr styling */
.flatpickr-calendar {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.flatpickr-time input, .flatpickr-time .flatpickr-time-separator {
    font-size: 16px;
    color: #333;
}

.flatpickr-calendar .flatpickr-day {
    font-weight: bold;
    color: #333;
}

.flatpickr-calendar .flatpickr-day.today {
    background-color: #007bff;
    color: #fff;
}

.flatpickr-calendar .flatpickr-day:hover, .flatpickr-calendar .flatpickr-day.selected {
    background-color: #0056b3;
    color: #fff;
}


.btn-primary {
            
    background-color: #007BFF; /* Accent color */
    color: #ffffff; /* White text */
    border: none; /* Remove border */
    padding: 6px 12px; /* Smaller padding */
    border-radius: 5px; /* Slightly rounded corners */
    font-size: 13px; /* Smaller font size */
    font-weight: bold;
    text-transform: uppercase; /* Uppercase text */
    letter-spacing: 0.5px;
    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 50px;
    
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
    transform: translateY(-1px); /* Gentle lift effect */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15); /* Slightly deeper shadow */
        }

        .btn-warning {
            
    background-color: #007BFF; /* Accent color */
    color: #ffffff; /* White text */
    border: none; /* Remove border */
    padding: 6px 12px; /* Smaller padding */
    border-radius: 5px; /* Slightly rounded corners */
    font-size: 13px; /* Smaller font size */
    font-weight: bold;
    text-transform: uppercase; /* Uppercase text */
    letter-spacing: 0.5px;
    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 50px;
    
        }

        .btn-warning:hover {
            background-color: #0056b3; /* Darker blue on hover */
    transform: translateY(-1px); /* Gentle lift effect */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15); /* Slightly deeper shadow */
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
                   <!-- Form containing the button -->
<form action="{{ url('confirm_order') }}" method="POST" id="orderForm">
    @csrf
    <div class="form-group">
        <label for="name">Client Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
    </div>
    <div class="form-group">
        <label for="address">Client Address</label>
        <textarea name="address" id="address" class="form-control">{{ Auth::user()->address }}</textarea>
    </div>
    <div class="form-group">
        <label for="phone">Client Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ Auth::user()->phone }}">
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
        </select>
    </div>

    <div class="form-group">
        <label for="service_datetime">Preferred Date & Time</label>
        <input type="text" name="service_datetime" id="service_datetime" class="form-control" placeholder="Select Date & Time" required>
    </div>

    <div class="form-group">
        <button type="button" class="btn2 btn-warning" onclick="fetchServiceDatetimes()">All Occupied Datetimes</button>
    </div>

    <div class="form-group">
        <button type="button" class="btn2 btn-primary" onclick="confirmation2(event)">Book Now</button>
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

   // Function to fetch unavailable datetimes and show them in the modal
   function fetchServiceDatetimes() {
        $.ajax({
            url: "{{ route('fetchServiceDatetimes') }}",
            method: "GET",
            success: function(data) {
                const datetimeList = $('#datetimeList');
                datetimeList.empty();
                data.forEach(order => {
                    datetimeList.append(`
                        <li class="list-group-item">
                            Occupied: ${order.service_datetime} - 
                            Status: <span style="color: ${order.status === 'Ongoing Service' ? 'skyblue' : order.status === 'In Queue' ? 'orange' : 'black'}; font-weight: bold;">
                                        ${order.status}
                                    </span>
                        </li>
                    `);
                });

                // After a short delay, show the modal
                setTimeout(function() {
                    $('#allDatetimesModal').modal('show');  // Show the modal with updated data
                }, 500);  // Delay time (in milliseconds), adjust if necessary
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

       // Submit the order form and show the modal after order confirmation
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
                    success: function(response) {
                        // Ensure the toastr success message is shown before modal
                        toastr.success("Order placed successfully.");
                        toastr.success('Your service has been booked successfully! You will be notified once it is processed.');

                        // Reload unavailable datetimes after the order is placed
                        loadUnavailableDatetimes();

                        // After a short delay, show the modal with updated data
                        setTimeout(function() {
                            $('#allDatetimesModal').modal('show');  // Show the modal with updated data
                        }, 1000); // Short delay to ensure toastr is visible before modal appears
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

    flatpickr(dateTimeInput, {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",  // Set minimum date to today
        defaultHour: 8,  // Default to 8 AM
        defaultMinute: 0,
        time_24hr: true,
        disableMobile: true,
        minTime: "08:00",  // Set minimum time to 8 AM
        maxTime: "17:00",  // Set maximum time to 5 PM

        onChange: function(selectedDates, dateStr, instance) {
            const selectedDate = selectedDates[0];
            const currentDate = new Date();
            
            // Check if selected date is today
            if (selectedDate.toDateString() === currentDate.toDateString()) {
                // Check if selected time is before the current time
                if (selectedDate.getTime() < currentDate.getTime()) {
                    alert("You cannot book a time earlier than the current time.");
                    
                    // Reset to the current time or the next available time
                    const nextAvailableTime = new Date(currentDate);
                    nextAvailableTime.setMinutes(Math.ceil(currentDate.getMinutes() / 15) * 15); // Round up to the next quarter hour

                    if (nextAvailableTime.getHours() < 8) {
                        nextAvailableTime.setHours(8, 0); // Set to 8 AM if before opening hours
                    } else if (nextAvailableTime.getHours() >= 17) {
                        nextAvailableTime.setDate(nextAvailableTime.getDate() + 1); // Move to the next day if past closing
                        nextAvailableTime.setHours(8, 0); // Set to 8 AM
                    }

                    instance.setDate(nextAvailableTime);
                }
            }
        }
    });
});
</script>

<script>
    // Pass the cart count from Blade to JavaScript
    let cartItemCount = {{ $count }};
</script>

<script>
   // Function to handle form submission after confirmation
   function confirmation2(ev) {
        ev.preventDefault();  // Prevent the form submission initially

        // Check if there are items in the cart
        if (cartItemCount <= 0) {
            toastr.error("Your cart is empty. Please add services to your cart before proceeding.");
            return;  // Stop the function if the cart is empty
        }

        // Check if all required fields are filled
        const name = document.getElementById('name').value;
        const address = document.getElementById('address').value;
        const phone = document.getElementById('phone').value;
        const staffId = document.getElementById('staff_id').value;
        const vehicleId = document.getElementById('vehicle').value;
        const size = document.getElementById('size').value;
        const serviceDatetime = document.getElementById('service_datetime').value;

        // Check if any of the required fields are empty
        if (!name || !address || !phone || !staffId || !vehicleId || !size || !serviceDatetime) {
            toastr.error("Please fill out all the required fields before proceeding.");
            return;  // Stop the function if the form is not complete
        }

        // Show the confirmation popup using SweetAlert
        swal({
            title: "Are You Sure You Want To Book This Service?",
            text: "After booking a service, you must be on the site before the 20 minutes countdown runs out. Please wait for the finalization by the admin.",
            icon: "info",
            buttons: true,
            dangerMode: true,
        }).then((willAdd) => {
            if (willAdd) {
                // After confirmation, submit the form
                document.getElementById("orderForm").submit(); // Submit the form
            }
        });
    }

   // Function to show modal after form submission and toastr notification
   function showModalAfterAction() {
        setTimeout(function() {
            $('#allDatetimesModal').modal('show');  // Show the modal with the unavailable dates
        }, 1000);  // Delay in milliseconds (1 second)
    }

    // Initialize the modal and ensure it's working even after actions like submitting the form or showing a toastr
    $(document).ready(function() {
        // Show unavailable datetimes when button is clicked
        $('#viewDatetimesBtn').on('click', function() {
            fetchServiceDatetimes();  // Load data when button is clicked
        });
    });
</script>






<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <section class="info_section  layout_padding2-top">
    
        
        

    </section>

    </body>

    </html>
