<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #f5f5f5;
            color: #333;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        h1 {
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        input[type='search'] {
            width: 500px;
            height: 50px;
            padding: 10px;
            border: 2px solid #333;
            border-radius: 8px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
        }

        /* Card layout for vehicles */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .vehicle-card {
            background-color: #fff;
            color: #333;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #000;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .vehicle-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
        }

        .vehicle-image {
            height: 120px;
            width: 120px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #333;
            margin-bottom: 15px;
        }

        .vehicle-info {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .vehicle-info span {
            font-weight: bold;
        }

        .card-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn-success,
        .btn-danger {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #333;
            border: none;
        }

        .btn-success:hover {
            background-color: #555;
        }

        .btn-danger {
            background-color: #333;
            border: none;
        }

        .btn-danger:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <h1 style="margin-bottom: 30px;">All Vehicles</h1>
            <div class="container-fluid">

                <form action="{{ url('search_vehicles') }}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Search vehicles">
                    <input type="submit" class="btn btn-secondary" value="Search">
                </form>

                <div class="card-container">
                    @foreach($vehicles as $vehicle)
                    <div class="vehicle-card">
                        <img class="vehicle-image" src="{{ $vehicle->image ? asset('vehicles/' . $vehicle->image) : asset('vehicles/default.png') }}" alt="Vehicle Image">
                        
                        <div class="vehicle-info">
                            <span>Type:</span> {{ $vehicle->type }}
                        </div>
                        <div class="vehicle-info">
                            <span>Size:</span> 
                            @if(is_array($vehicle->sizes))
                                {{ implode(', ', $vehicle->sizes) }}
                            @else
                                @php
                                    $sizes = json_decode($vehicle->sizes, true);
                                @endphp
                                {{ implode(', ', $sizes) }}
                            @endif
                        </div>
                        <div class="vehicle-info">
                            <span>Status:</span> {{ $vehicle->status ? 'Available' : 'Not Available' }}
                        </div>
                        
                        <div class="card-actions">
                        <a class="btn btn-success" onclick="checkEditCondition(event, {{ $vehicle->id }})" href="{{ url('update_vehicle', $vehicle->id) }}">Edit</a>

                            <a class="btn btn-danger" onclick="confirmation(event, {{ $vehicle->id }})" href="{{ url('delete_vehicle', $vehicle->id) }}">Delete</a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="div_deg">
                    {{ $vehicles->onEachSide(1)->links() }}
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script type="text/javascript">
        function confirmation(ev, vehicleId) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');

            fetch(`/checkVehicleUsage/${vehicleId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.canDelete) {
                        swal({
                            title: "Are You Sure You Want To Delete This Vehicle?",
                            text: "This Delete Will Be Permanent",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                window.location.href = urlToRedirect;
                            }
                        });
                    } else {
                        swal({
                            title: "Cannot Delete Vehicle",
                            text: "This vehicle is currently being used in an ongoing order. Please complete all orders before deleting.",
                            icon: "error",
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    swal({
                        title: "Error",
                        text: "An error occurred while checking the vehicle. Please try again.",
                        icon: "error",
                    });
                });
        }
    </script>

<script>
    function checkEditCondition(event, vehicleId) {
        event.preventDefault();
        const urlToRedirect = event.currentTarget.getAttribute('href');

        // AJAX call to check if the vehicle is in use
        fetch(`/checkVehicleUsage/${vehicleId}`)
            .then(response => response.json())
            .then(data => {
                if (data.canDelete) {
                    // If not in use, proceed to edit page
                    window.location.href = urlToRedirect;
                } else {
                    // Show error if the vehicle is in use
                    swal({
                        title: "Cannot Edit Vehicle",
                        text: "This vehicle is currently in use and cannot be edited.",
                        icon: "error",
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swal({
                    title: "Error",
                    text: "An error occurred while checking the vehicle status. Please try again.",
                    icon: "error",
                });
            });
    }
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('/admincss/js/front.js') }}"></script>
</body>
</html>
