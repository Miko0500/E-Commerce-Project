<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">

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
         /* Container and Card Layout */
        .filter-sort-container {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 25px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-width: 750px;
        }

        .form-group {
            display: flex;
            align-items: center;
            gap: 5px;
            margin: 0;
        }

        .form-label {
            font-weight: bold;
            color: #333;
            font-size: 14px;
        }

        .form-select {
            width: 150px;
            padding: 8px;
            font-size: 14px;
            color: #333;
            background-color: #ffffff;
            border: 1px solid #007bff;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            appearance: none;
            background-image: url('data:image/svg+xml;base64,PHN2ZyBmaWxsPSIjMDA3YmZmIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDE2IDE2Ij48cGF0aCBkPSJNNC41IDE0bDcuNS03LjUgNy41IDcuNUwxNCA1LjVsLTcgLTcgLTcgNy41eiIgLz48L3N2Zz4=');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 10px;
        }

        .form-select:hover, .form-select:focus {
            border-color: #0056b3;
            box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);
        }

        /* Table Styling */
        .table-container {
            margin: 40px auto;
            max-width: 1200px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table thead th {
            background-color: #007bff;
            color: #ffffff;
            font-size: 1rem;
            font-weight: bold;
            padding: 15px;
            text-align: center;
        }

        .custom-table tbody td {
            padding: 12px;
            text-align: center;
            vertical-align: middle;
            font-size: 0.95rem;
            color: #333;
            background-color: #ffffff;
            border-bottom: 2px solid #ddd; /* Adds a light gray bottom border */
        }

        .custom-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        /* Status Badge Styling */
        .status-badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: bold;
            color: #fff;
        }

        .status-badge.in-queue { background-color: #ffc107; }
        .status-badge.ongoing-service { background-color: #17a2b8; }
        .status-badge.finished { background-color: #28a745; }

        /* Button Styling */
        .btn {
            font-size: 0.85rem;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: bold;
            color: #ffffff;
            margin: 0 3px;
        }

        .btn-primary { background-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; }
        .btn-warning { background-color: #ffc107; color: #333; }
        .btn-warning:hover { background-color: #e0a800; }

        /* Modal Styling */
        .modal-content {
            border-radius: 8px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background-color: #007bff;
            color: #ffffff;
            border-bottom: none;
            padding: 15px 20px;
        }

        .modal-body {
            padding: 20px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .pagination li a {
            padding: 10px 15px;
            color: #007bff;
            text-decoration: none;
            border: 1px solid #ddd;
            margin: 0 5px;
            border-radius: 5px;
        }

        .pagination li.active a {
            background-color: #007bff;
            color: white;
        }

        .pagination li a:hover {
            background-color: #ddd;
        }


        /* Modal Styling */
        .modal-content {
            border-radius: 8px;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .modal-header {
            background-color: #007bff;
            color: #ffffff;
            border-bottom: none;
            padding: 15px 20px;
        }

        .modal-body {
            padding: 20px;
        }
    </style>
</head>
<body>

    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <h1 style="margin-bottom: 30px; text-align: center;">All Vehicles</h1>
            <div class="container-fluid">
                <form action="{{ url('search_vehicles') }}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Search vehicles">
                    <input type="submit" class="btn btn-secondary" value="Search">
                </form>

                <!-- Table Container -->
                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Vehicle Image</th>
                                <th>Vehicle Type</th>
                                <th>Sizes</th>
                                
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vehicles as $vehicle)
                            <tr>
                                <td>
                                    <img src="{{ $vehicle->image ? asset('vehicles/' . $vehicle->image) : asset('vehicles/default.png') }}" alt="Vehicle Image" class="img-fluid" style="max-width: 100px; border-radius: 5px;">
                                </td>
                                <td>{{ $vehicle->type }}</td>
                                <td>
                                    @if(is_array($vehicle->sizes))
                                        {{ implode(', ', $vehicle->sizes) }}
                                    @else
                                        @php
                                            $sizes = json_decode($vehicle->sizes, true);
                                        @endphp
                                        {{ implode(', ', $sizes) }}
                                    @endif
                                </td>
                                
                                <td>
                                    <a class="btn btn-success" href="{{ url('update_vehicle', $vehicle->id) }}">Edit</a>
                                    <a class="btn btn-danger" onclick="confirmation(event, {{ $vehicle->id }})" href="{{ url('delete_vehicle', $vehicle->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="pagination">
                        {{ $vehicles->onEachSide(1)->links() }}
                    </div>
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
