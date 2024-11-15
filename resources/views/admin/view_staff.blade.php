<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">
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

        /* Table Styling */
        .table-container {
            margin: 40px auto;
            max-width: 1000px;
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
            border-bottom: 2px solid #ddd; /* Adds a bottom border */
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

        /* Pagination */
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

    </style>

</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <h1 style="margin-bottom: 30px;">All Staff</h1>
            <div class="container-fluid">

                <form action="{{ url('search_staff') }}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Search staff">
                    <input type="submit" class="btn btn-secondary" value="Search">
                </form>

                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <th>Staff Image</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Birthday</th>
                                <th>Sex</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staff as $member)
                            <tr>
                                <td><img src="{{ $member->image ? asset('staff/' . $member->image) : asset('staff/default.png') }}" alt="Staff Image" class="img-fluid" style="max-width: 100px; border-radius: 5px;"></td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->age }}</td>
                                <td>{{ $member->birthday }}</td>
                                <td>{{ $member->sex }}</td>
                                <td>{{ $member->contact }}</td>
                                <td>{{ Str::limit($member->address, 50) }}</td>
                                <td>
                                    <a class="btn btn-success" href="{{ url('update_staff', $member->id) }}">Edit</a>
                                    <a class="btn btn-danger" onclick="confirmation(event, {{ $member->id }})" href="{{ url('delete_staff', $member->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="pagination">
                        {{ $staff->onEachSide(1)->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- JavaScript files-->
    <script type="text/javascript">
    function confirmation(ev, staffId) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');

        // AJAX request to check if the staff can be deleted
        fetch(`/checkStaffUsage/${staffId}`)
            .then(response => response.json())
            .then(data => {
                if (data.canDelete) {
                    swal({
                        title: "Are You Sure You Want To Delete This Staff?",
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
                        title: "Cannot Delete Staff",
                        text: "This staff is currently assigned to an ongoing order. Please complete all orders before deleting.",
                        icon: "error",
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swal({
                    title: "Error",
                    text: "An error occurred while checking the staff. Please try again.",
                    icon: "error",
                });
            });
    }
</script>

<script>
    function checkEditCondition(event, staffId) {
        event.preventDefault();
        const urlToRedirect = event.currentTarget.getAttribute('href');

        // Make an AJAX call to check if the staff member is in use
        fetch(`/checkStaffUsage/${staffId}`)
            .then(response => response.json())
            .then(data => {
                if (data.canDelete) {
                    // If not in use, allow editing
                    window.location.href = urlToRedirect;
                } else {
                    // Show error if the staff member is in use
                    swal({
                        title: "Cannot Edit Staff",
                        text: "This staff member is currently in use and cannot be edited.",
                        icon: "error",
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swal({
                    title: "Error",
                    text: "An error occurred while checking the staff status. Please try again.",
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
