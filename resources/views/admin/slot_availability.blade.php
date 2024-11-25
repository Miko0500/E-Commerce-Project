<!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Time Slot Management</title>
    <!-- Include Flatpickr Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Include Bootstrap for styling (optional) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        @include('admin.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style type="text/css">

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


    </style>
    
    
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
.toastr {
    z-index: 9999 !important; /* Ensures the toastr stays above other elements */
}

.past-time {
    background-color: #e0e0e0; /* Gray color for past times */
    color: #9e9e9e;
}
/* Add hover effect for the clickable times */
.list-group-item {
    cursor: pointer; /* Indicate that the item is clickable */
    padding: 10px 15px;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    text-align: center;
    font-size: 16px;
    border-radius: 5px;
    margin-bottom: 5px;
    transition: background-color 0.3s, transform 0.3s;
}

/* Hover effect */
.available:hover {
    background-color: #007bff; /* Blue background on hover */
    color: white; /* Change text color to white */
    transform: scale(1.05); /* Slightly enlarge the item */
}

.available {
    background-color: #d4edda; /* Light green for available */
    color: #155724;
}

.booked {
    background-color: #f8d7da; /* Light red for booked */
    color: #721c24;
}

.selected {
    background-color: #007bff !important; /* Highlight color for selected time */
    color: #fff;
    font-weight: bold;
}
    </style>

    </head>
    <body>
        @include('admin.header')
        @include('admin.sidebar')

        <div class="container mt-5">
    <h3>Select a Time Slot</h3>

    <div class="container">
    <div class="row">
        <div class="col-md-6">
            <!-- Flatpickr input for selecting date and time -->
            <div class="form-group">
            <label for="service_datetime" style="display: block; text-align: center; font-size: 1.1rem; margin-bottom: 10px;">Select a Date to View Available Slot</label>

                <input style="background-color: #fff;" type="text" name="service_datetime" id="service_datetime" class="form-control" placeholder="Select Date & Time" required>
            </div>
        </div>

        

        <div class="col-md-6">
            <!-- Display booked times for the selected day -->
            <h5 style="font-size: medium; text-align: center; margin-bottom: 20px;">Times Available for Selected Day</h5>

            <!-- Container to display booked times in 3 columns -->
            <div id="bookedTimesList" class="times-grid">
                <!-- Booked times will be dynamically inserted here -->
            </div>
        </div>
    </div>
</div>

<!-- resources/views/admin/slot_availability.blade.php -->

<h1>Slot Availability</h1>

<!-- Include Toastr CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<style>
    /* Custom Styling for the Form */
    #slotAvailabilityForm {
        max-width: 500px;
        margin: auto;
        border-radius: 10px;
        background-color: #f8f9fa;
    }

    #slotAvailabilityForm .form-control {
        border-radius: 5px;
        box-shadow: none;
    }

    #slotAvailabilityForm button {
        border-radius: 25px;
        font-size: 16px;
        font-weight: bold;
        padding: 12px;
        background-color: #007bff;
        color: white;
        transition: background-color 0.3s ease;
    }

    #slotAvailabilityForm button:hover {
        background-color: #0056b3;
    }

    h2 {
        color: #333;
        font-size: 1.5rem;
        font-weight: bold;
    }

    /* Styling for Toastr */
    .toast-success {
        background-color: #28a745;
    }

    .toast-error {
        background-color: #dc3545;
    }
</style>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<form id="slotAvailabilityForm" action="{{ url('update_slot_availability') }}" method="POST" class="card shadow-sm p-4 mb-5">
    @csrf
    <div class="form-group">
        <label for="status" class="font-weight-bold">Slot Availability</label>
        <select name="status" id="status" class="form-control">
            <option value="all_available" {{ $slotAvailability->status == 'all_available' ? 'selected' : '' }}>All Slots Available</option>
            <option value="one_available" {{ $slotAvailability->status == 'one_available' ? 'selected' : '' }}>Only One Slot Available</option>
            <option value="no_available" {{ $slotAvailability->status == 'no_available' ? 'selected' : '' }}>No Slot Available</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary btn-block">Update Availability</button>
</form>

<h2 class="text-center mt-4">Current Availability Status: {{ ucfirst($slotAvailability->status) }}</h2>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle form submission with AJAX
        $('#slotAvailabilityForm').on('submit', function(event) {
            event.preventDefault();  // Prevent the default form submission

            // Get the selected slot availability status
            var status = $('#status').val();

            // Send an AJAX POST request to update slot availability
            $.ajax({
                url: "{{ url('update_slot_availability') }}",  // Ensure this URL matches your route
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",  // CSRF token for security
                    status: status  // Slot availability status
                },
                success: function(response) {
                    // If successful, show a success toastr message
                    toastr.success(response.message);  // Use the message returned from the backend
                    // Update the displayed status on the page
                    $('h2').text('Current Availability Status: ' + response.newStatus);
                },
                error: function() {
                    toastr.error('Failed to update slot availability. Please try again.');
                }
            });
        });
    });
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
document.addEventListener('DOMContentLoaded', function() {
    const dateTimeInput = document.getElementById('service_datetime');
    const bookedTimesList = document.getElementById('bookedTimesList');  // Element to display booked times
    let bookedTimes = [];  // Store booked times for the selected date

    // Initialize the Flatpickr instance
    flatpickr(dateTimeInput, {
        enableTime: true,
        dateFormat: "Y-m-d H:i",  // Ensure the format includes both date and time
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
                const time = `${hour}:${minute < 10 ? '0' + minute : minute}`;
                availableTimes.push(time);
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

                    const currentTime = new Date();
                    const timeSlot = new Date();
                    const [hour, minute] = time.split(':');
                    const selectedDateTime = new Date(formattedDate + ' ' + time); // Combine date and time for comparison

                    // Check if the selected time has passed compared to current time
                    if (selectedDateTime < currentTime) {
                        listItem.classList.add('list-group-item', 'past-time'); // Add class for past times (gray)
                        listItem.style.pointerEvents = 'none'; // Disable click for past times
                    }
                    // Check if the time is booked for the selected day
                    else if (bookedTimes.includes(time)) {
                        listItem.classList.add('list-group-item', 'booked'); // Add class for booked times (red)
                        listItem.style.pointerEvents = 'none'; // Disable click for booked times
                    } else {
                        listItem.classList.add('list-group-item', 'available'); // Add class for available times (green)
                        // Add event listener to make the time clickable
                        listItem.addEventListener('click', function() {
                            // Set the value of the input field
                            dateTimeInput.value = formattedDate + " " + time;

                            // Remove the selected class from all time slots
                            const allTimeSlots = document.querySelectorAll('.available');
                            allTimeSlots.forEach(slot => slot.classList.remove('selected'));

                            // Add the selected class to the clicked time slot
                            listItem.classList.add('selected');
                        });
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
    
<!-- Include Toastr CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
    // Make an AJAX request to update slot availability
    function updateSlotAvailability(status) {
        $.ajax({
            url: "{{ url('update-slot-availability') }}", // Make sure the URL matches your route
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}", // CSRF token for security
                status: status
            },
            success: function(response) {
                if(response.status == 'success') {
                    // Show success message with toastr
                    toastr.success(response.message);
                }
            },
            error: function() {
                toastr.error('Failed to update slot availability. Please try again.');
            }
        });
    }

    // Example: Call the function with a selected status
    // You can use this for buttons or form submissions
    updateSlotAvailability('all_available');  // Example status
</script>



<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Flatpickr Script -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    </body>
    </html>