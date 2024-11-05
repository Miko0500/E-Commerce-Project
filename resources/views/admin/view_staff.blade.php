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

        /* Card layout for staff */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .staff-card {
            background-color: #fff;
            width: 300px;
            padding: 20px;
            border: 2px solid #000;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .staff-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
        }

        .staff-image {
            height: 120px;
            width: 120px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .staff-info {
            margin-bottom: 10px;
            font-size: 16px;
            color: black;
        }

        .staff-info span {
            font-weight: bold;
        }

        .card-actions {
            display: flex;
            gap: 10px;
        }

        .btn-success,
        .btn-danger {
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
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

                <div class="card-container">
                    @foreach($staff as $member)
                    <div class="staff-card">
                        <img class="staff-image" src="{{ $member->image ? asset('staff/' . $member->image) : asset('staff/default.png') }}" alt="Staff Image">
                        
                        <div class="staff-info">
                            <span>Name:</span> {{ $member->name }}
                        </div>
                        <div class="staff-info">
                            <span>Age:</span> {{ $member->age }}
                        </div>
                        <div class="staff-info">
                            <span>Birthday:</span> {{ $member->birthday }}
                        </div>
                        <div class="staff-info">
                            <span>Sex:</span> {{ $member->sex }}
                        </div>
                        <div class="staff-info">
                            <span>Contact:</span> {{ $member->contact }}
                        </div>
                        <div class="staff-info">
                            <span>Address:</span> {{ Str::limit($member->address, 50) }}
                        </div>
                        
                        <div class="card-actions">
                        <a class="btn btn-success" onclick="checkEditCondition(event, {{ $member->id }})" href="{{ url('update_staff', $member->id) }}">Edit</a>

                            <a class="btn btn-danger" onclick="confirmation(event, {{ $member->id }})" href="{{ url('delete_staff', $member->id) }}">Delete</a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="div_deg">
                    {{ $staff->onEachSide(1)->links() }}
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
