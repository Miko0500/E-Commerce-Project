    <!DOCTYPE html>
    <html>

    <head>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <style type="text/css">
/* General Styles for the Table and Cart Section */
.div_deg {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 60px;
    flex-direction: column; /* Stack content vertically */
}

.cardy {
    overflow-x: auto; /* Allow horizontal scroll for tables on small screens */
    width: 100%; /* Ensure the card takes full width */
}

table {
    width: 100%; /* Full width of the container */
    border-collapse: collapse;
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

/* Button Styling */
.btn-danger {
    background-color: #ff5722;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 14px;
    text-transform: uppercase;
}

.btn-danger:hover {
    background-color: #e64a19;
}

/* Pagination Styling */
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination a {
    padding: 8px 12px;
    margin: 0 5px;
    background-color: #3498db;
    color: white;
    border-radius: 5px;
    text-decoration: none;
}

.pagination a:hover {
    background-color: #2980b9;
}

/* Order Form Styles */
.card {
    padding: 20px;
    color: #000;
}

.form-group {
    margin-bottom: 20px;
    color: #000;
}

.form-control {
    font-size: 14px;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    /* Adjust table padding and text size for medium screens */
    table, th, td {
        font-size: 14px;
    }

    th, td {
        padding: 10px;
    }

    td img {
        width: 100px; /* Resize images on medium screens */
        height: 100px;
    }
}

@media (max-width: 768px) {
    /* Make the table scrollable horizontally on small screens */
    .cardy table {
        font-size: 12px;
        width: 100%;
    }

    .pagination {
        flex-wrap: wrap;
        justify-content: center;
    }

    /* Make the images and text smaller */
    td img {
        width: 80px;
        height: 80px;
    }

    /* Reduce form input and button size for smaller screens */
    .form-group label {
        font-size: 14px;
    }

    .form-control {
        font-size: 14px;
    }

    .btn-danger {
        font-size: 12px;
        padding: 6px 10px;
    }
}

@media (max-width: 480px) {
    /* On very small screens */
    table {
        font-size: 10px;
    }

    td img {
        width: 70px;
        height: 70px;
    }

    .pagination a {
        font-size: 10px;
        padding: 6px 8px;
    }

    .btn-danger {
        font-size: 10px;
        padding: 5px 8px;
    }

    /* Make the pagination links adjust for small screens */
    .pagination {
        font-size: 12px;
        flex-wrap: wrap;
    }
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

        /* General Styles for the Form and Order Card */
.container {
    padding-left: 15px;
    padding-right: 15px;
}

.card {
    padding: 20px;
    border: 2px solid #000;
    border-radius: 10px;
    background-color: #f9f9f9;
    margin-top: 50px;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    font-size: 14px;
    padding: 12px;
}

button {
    font-size: 14px;
    padding: 10px 20px;
    border-radius: 5px;
}

.btn2 {
    width: 100%; /* Make buttons full width on small screens */
}

/* Button Styling */
.btn-warning {
    background-color: #ff9800;
    color: #fff;
}

.btn-warning:hover {
    background-color: #e68900;
}

.btn-primary {
    background-color: #3498db;
    color: #fff;
}

.btn-primary:hover {
    background-color: #2980b9;
}

/* Responsive Adjustments */
@media (max-width: 992px) {
    /* Adjust form padding and font size for medium screens */
    .form-group {
        margin-bottom: 15px;
    }

    .form-control {
        font-size: 16px; /* Slightly larger font size on smaller screens */
    }

    button {
        font-size: 16px;
    }

    /* Ensure buttons take full width */
    .btn2 {
        width: 100%;
    }
}

@media (max-width: 768px) {
    /* On small screens, make the form card take full width */
    .container {
        padding-left: 10px;
        padding-right: 10px;
    }

    .card {
        padding: 15px;
    }

    .form-group label {
        font-size: 14px; /* Smaller font size for labels */
    }

    .form-control {
        font-size: 15px; /* Adjust form input size */
    }

    button {
        font-size: 14px; /* Smaller button size */
        padding: 10px 20px;
    }

    /* Full width buttons on smaller screens */
    .btn2 {
        width: 100%;
    }
}

@media (max-width: 480px) {
    /* On very small screens */
    .form-group label {
        font-size: 12px; /* Further reduce font size for labels */
    }

    .form-control {
        font-size: 12px; /* Smaller form control inputs */
    }

    .btn2 {
        font-size: 12px; /* Smaller buttons */
    }

    button {
        font-size: 12px; /* Even smaller button text */
    }
}

/* Custom Cancel button color */
.swal-button--cancel {
    background-color: #f44336 !important; /* Red color */
    color: white !important;
    border: none !important;
    padding: 10px 20px !important;
    font-size: 16px !important;
    transition: background-color 0.3s ease !important; /* Smooth transition */
}

/* Hover effect for Cancel button */
.swal-button--cancel:hover {
    background-color: #d32f2f !important; /* Darker red on hover */
}

/* Custom Confirm button color */
.swal-button--confirm {
    background-color: #4caf50 !important; /* Green color */
    color: white !important;
    border: none !important;
    padding: 10px 20px !important;
    font-size: 16px !important;
    transition: background-color 0.3s ease !important;  /* Smooth transition */
}

/* Hover effect for Confirm button */
.swal-button--confirm:hover {
    background-color: #388e3c !important; /* Darker green on hover */
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
    {{$cart->onEachSide(1)->links()}} <!-- Pagination -->
</div>



  <!-- Order Form Card -->
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


                    <!-- <div class="form-group">
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
                     -->

                     <div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Flatpickr input for selecting date and time -->
            <div class="form-group">
            <label for="service_datetime" style="display: block; text-align: center; font-size: 1.1rem; margin-bottom: 10px;">Preferred Date & Time (30mins interval)</label>

                <input type="text" name="service_datetime" id="service_datetime" class="form-control" placeholder="Select Date & Time" required>
            </div>
        </div>

        

        <div class="col-md-6">
            <!-- Display booked times for the selected day -->
            <h5 style="font-size: medium; text-align: center; margin-bottom: 20px;">Choose on this Times Available for Selected Day</h5>

            <!-- Container to display booked times in 3 columns -->
            <div id="bookedTimesList" class="times-grid">
                <!-- Booked times will be dynamically inserted here -->
            </div>
        </div>
    </div>
</div>


    <style>
        /* Style for the 3-column grid layout */
.times-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* 3 equal columns */
    gap: 10px; /* Space between items */
    padding: 10px;
}

/* Styling for the times */
.times-grid .list-group-item {
    padding: 10px 10px;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    text-align: center;
    font-size: 16px;
    border-radius: 50px;
}

/* Styling for available times */
.times-grid .available {
    background-color: #d4edda; /* Light green */
    color: #155724;
}

/* Styling for booked times */
.times-grid .booked {
    background-color: #f8d7da; /* Light red */
    color: #721c24;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .times-grid {
        grid-template-columns: repeat(2, 1fr); /* 2 columns on smaller screens */
    }
}

@media (max-width: 480px) {
    .times-grid {
        grid-template-columns: 1fr; /* 1 column on very small screens */
    }
}


        .container {
            padding-top: 40px;
        }
        .col-md-6 {
            padding: 15px;
        }
        .form-control {
            font-size: 16px;
            padding: 12px;
        }
        .list-group-item {
            padding: 10px 15px;
            margin-bottom: 5px;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .list-group-item.booked {
            background-color: #e74c3c;
            color: white;
        }
        .list-group-item.available {
            background-color: #2ecc71;
            color: white;
        }
        h5 {
            font-size: 20px;
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
        }
        label {
            font-size: 18px;
            margin-bottom: 8px;
            font-weight: 600;
        }
        .flatpickr-calendar {
            z-index: 9999;
        }
        .btn-primary {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
        }

        /* Add styling for booked times */
.booked {
    background-color: red; /* Red color for booked times */
    color: white;
    font-weight: bold;
}

/* Optional: Add a style for available times */
.available {
    background-color: green; /* Green color for available times */
    color: white;
    font-weight: bold;
}

    </style>

    <div class="row">
        <div class="col-md-12">
            <!-- Button to show all occupied datetimes -->
            <div class="form-group">
                <button type="button" class="btn2 btn-warning" onclick="fetchServiceDatetimes()">Virtual Queue</button>
            </div>

            <!-- Button to book the appointment -->
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
                        <h5 class="text-dark modal-title" id="allDatetimesModalLabel">All Bookings Datetimes</h5>
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
    ev.preventDefault();  // Prevent the default link click action
    var urlToRedirect = ev.currentTarget.getAttribute('href');
    
    // Show the confirmation popup using SweetAlert
    swal({
        title: "Are You Sure You Want To Delete This Order?",
        text: "This Delete Will Be Permanent",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancel",
                value: null,
                visible: true,
                className: "swal-button--cancel",  // Custom class for Cancel button
                closeModal: true
            },
            confirm: {
                text: "Confirm",
                value: true,
                visible: true,
                className: "swal-button--confirm",  // Custom class for Confirm button
                closeModal: true
            }
        },
        dangerMode: true, // Optional: makes the confirm button red
    }).then((willAdd) => {
        if (willAdd) {
            // Redirect to the 'add_cart' URL
            window.location.href = urlToRedirect;
        }
    });
}


        

    //     function updateSizes() {
    //     const vehicleSelect = document.getElementById('vehicle');
    //     const sizeSelect = document.getElementById('size');
    //     const selectedVehicle = vehicleSelect.options[vehicleSelect.selectedIndex];
        
        
    //     const sizes = JSON.parse(selectedVehicle.getAttribute('data-sizes'));

       
    //     sizeSelect.innerHTML = '<option value="">Select Size</option>';

        
    //     sizes.forEach(size => {
            
    //         const sizeLetter = size.trim(); 
    //         if (sizeLetter.length > 0) {
    //             sizeSelect.innerHTML += `<option value="${sizeLetter}">${sizeLetter}</option>`;
    //         }
    //     });
    // }





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
                            Booked: ${order.service_datetime} - 
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
    const bookedTimesList = document.getElementById('bookedTimesList');  // Element to display booked times
    let bookedTimes = [];  // Store booked times for the selected date

    // Initialize the Flatpickr instance
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
        minuteIncrement: 30,  // Set interval to 30 minutes
        onChange: function(selectedDates, dateStr, instance) {
            const selectedDate = selectedDates[0];

            // Adjust time to nearest 30-minute interval
            adjustTimeToNearestInterval(selectedDate);

            // Fetch and display the booked times for the selected day
            fetchBookedTimes(selectedDate);
        }
    });

    // Function to generate all 30-minute intervals between 8:00 AM and 5:00 PM
    function generateAvailableTimes() {
        const availableTimes = [];
        const start = 8;  // Start from 8:00 AM
        const end = 17;   // End at 5:00 PM (17:00)

        for (let hour = start; hour < end; hour++) {
            for (let minute = 0; minute < 60; minute += 30) {
                const time = new Date();
                time.setHours(hour, minute, 0, 0); // Set hour and minute
                const timeString = time.toTimeString().substr(0, 5); // Format as "HH:mm"
                availableTimes.push(timeString);
            }
        }

        return availableTimes;
    }

    // Function to fetch and display the booked times for a selected day
function fetchBookedTimes(date) {
    const formattedDate = date.toISOString().split('T')[0]; // Format the date as "YYYY-MM-DD"

    // Fetch the booked times for the selected day
    $.ajax({
        url: "/fetch-booked-times",  // Backend route to fetch booked times
        method: "GET",
        data: { date: formattedDate },
        success: function(data) {
            // Store the booked times
            bookedTimes = data.bookedTimes;

            // Generate all available times (8:00 AM to 5:00 PM in 30-minute intervals)
            const allAvailableTimes = generateAvailableTimes();

            // Clear the existing list of booked times
            bookedTimesList.innerHTML = '';

            // Loop through all times and display them, mark booked ones in red
            allAvailableTimes.forEach(time => {
                const listItem = document.createElement('div');
                listItem.textContent = time;

                // Check if the time is booked
                if (bookedTimes.includes(time)) {
                    listItem.classList.add('list-group-item', 'booked'); // Add class for booked times (red)
                } else {
                    listItem.classList.add('list-group-item', 'available'); // Add class for available times
                }

                bookedTimesList.appendChild(listItem);
            });
        },
        error: function() {
            toastr.error("Error fetching booked times.");
        }
    });
}


    // Function to adjust the selected time to the nearest 30-minute interval
    function adjustTimeToNearestInterval(date) {
        const minutes = date.getMinutes();

        // If minutes are between 0-14, set to the hour (e.g. 8:14 becomes 8:00)
        if (minutes >= 0 && minutes < 15) {
            date.setMinutes(0); // Set minutes to 0
        }
        // If minutes are between 15-29, set to 30 (e.g. 8:16 becomes 8:30)
        else if (minutes >= 15 && minutes < 45) {
            date.setMinutes(30); // Set minutes to 30
        }
        // If minutes are between 45-59, set to the next hour (e.g. 8:46 becomes 9:00)
        else {
            date.setMinutes(0); // Set minutes to 0
            date.setHours(date.getHours() + 1); // Increment the hour by 1
        }

        // Ensure that Flatpickr updates correctly after adjustment
        dateTimeInput._flatpickr.setDate(date);  // This will update the Flatpickr input
    }

    // Handle the "All Occupied Datetimes" button click
    function fetchServiceDatetimes() {
        const selectedDate = dateTimeInput.value;
        if (selectedDate) {
            const dateObj = new Date(selectedDate);
            fetchBookedTimes(dateObj);  // Fetch the booked times for the selected date
        } else {
            // toastr.error("Please select a valid date.");
        }
    }

    // Handle the "Book Now" button click
    function confirmation2(event) {
        event.preventDefault();
        const selectedTime = dateTimeInput.value;

        // Check if the selected time is already booked
        if (bookedTimes.includes(selectedTime)) {
            toastr.error("The selected time is already booked. Please choose a different time.");
        } else {
            // Proceed with booking the appointment (submit form or make AJAX request)
            $.ajax({
                url: '/book-appointment',  // Your route for booking the appointment
                method: 'POST',
                data: {
                    service_datetime: selectedTime,
                    _token: $('meta[name="csrf-token"]').attr('content')  // Include CSRF token for security
                },
                success: function(response) {
                    toastr.success("Appointment successfully booked!");
                }
            });
        }
    }

    // Attach functions to buttons
    document.querySelector('.btn-warning').addEventListener('click', fetchServiceDatetimes);
    document.querySelector('.btn-primary').addEventListener('click', confirmation2);
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
        // const staffId = document.getElementById('staff_id').value;
        // const vehicleId = document.getElementById('vehicle').value;
        // const size = document.getElementById('size').value;
        const serviceDatetime = document.getElementById('service_datetime').value;

        // Check if any of the required fields are empty
        if (!name || !address || !phone || !serviceDatetime) {

            // !staffId || !vehicleId || !size ||
            toastr.error("Please fill out all the required fields before proceeding.");
            return;  // Stop the function if the form is not complete
        }

        // Show the confirmation popup using SweetAlert
        swal({
            title: "Are You Sure You Want To Book This Service?",
            text: "After booking a service, wait for our call for the finalization of your booking/s which we asks about your vehicle and its size. After finalizing, you must be on the site before the 20 minutes countdown runs out.",
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
