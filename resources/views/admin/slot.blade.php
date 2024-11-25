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

<form action="{{ url('update_slot_availability') }}" method="POST">
    @csrf
    <label for="status">Slot Availability</label>
    <select name="status" id="status">
        <option value="all_available" {{ $slotAvailability->status == 'all_available' ? 'selected' : '' }}>All Slots Available</option>
        <option value="one_available" {{ $slotAvailability->status == 'one_available' ? 'selected' : '' }}>Only One Slot Available</option>
        <option value="no_available" {{ $slotAvailability->status == 'no_available' ? 'selected' : '' }}>No Slot Available</option>
    </select>
    <button type="submit">Update Availability</button>
</form>

<h2>Current Availability Status: {{ ucfirst($slotAvailability->status) }}</h2>


 

<script>
        (function() {
            history.pushState(null, null, location.href);
            window.onpopstate = function() {
                history.go(1);
            };
        })();
    </script>



<script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateTimeInput = document.getElementById('service_datetime');
            const bookedTimesList = document.getElementById('bookedTimesList');
            let selectedTime = null;
            let selectedDate = null;

            // Initialize Flatpickr for date selection
            flatpickr(dateTimeInput, {
                enableTime: false,
                dateFormat: "Y-m-d",
                minDate: "today", 
                onChange: function (selectedDates) {
                    selectedDate = selectedDates[0];
                    fetchBookedTimes(selectedDate);
                }
            });

            function generateAvailableTimes() {
                const availableTimes = [];
                const start = 8;  
                const end = 17;

                for (let hour = start; hour < end; hour++) {
                    for (let minute = 0; minute < 60; minute += 30) {
                        const time = `${hour}:${minute < 10 ? '0' + minute : minute}`;
                        availableTimes.push(time);
                    }
                }

                return availableTimes;
            }

            // Fetch booked times for the selected date
            function fetchBookedTimes(date) {
                const formattedDate = date.toISOString().split('T')[0];

                $.ajax({
                    url: "/fetch-booked-times",
                    method: "GET",
                    data: { date: formattedDate },
                    success: function (data) {
                        const bookedTimes = data.bookedTimes;
                        const allAvailableTimes = generateAvailableTimes();

                        bookedTimesList.innerHTML = '';

                        allAvailableTimes.forEach(time => {
                            const listItem = document.createElement('div');
                            listItem.textContent = time;

                            if (bookedTimes.includes(time)) {
                                listItem.classList.add('list-group-item', 'booked');
                                listItem.style.pointerEvents = 'none'; 
                            } else {
                                listItem.classList.add('list-group-item', 'available');
                                listItem.addEventListener('click', function () {
                                    selectedTime = time;
                                    dateTimeInput.value = `${formattedDate} ${time}`;
                                    document.getElementById('disableTimeBtn').style.display = 'inline-block';
                                    document.getElementById('enableTimeBtn').style.display = 'none';
                                });
                            }

                            bookedTimesList.appendChild(listItem);
                        });
                    },
                    error: function () {
                        toastr.error("Error fetching booked times.");
                    }
                });
            }

            
            
        });
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


       

    </body>
    </html>