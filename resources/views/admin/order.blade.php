<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    @include('admin.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style type="text/css">
        /* Container and Card Layout */
        .filter-sort-container {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 10px 20px;
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
            max-width: 1000px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .custom-table {
            width: 1000px;
            border-collapse: collapse;
            max-width: 12000px;
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
    padding: 15px;
    text-align: center;         /* Centers content horizontally */
    vertical-align: middle;     /* Centers content vertically */
    font-size: 0.95rem;
    color: #333;
    background-color: #ffffff;
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
            background-color: #ffffff;
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

        /* Product Image */
        .product-image {
            max-width: 100%;
            max-height: 250px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin: 10px auto;
            display: block;
        }

        /* Rating Display */
        .rating-display {
            margin-top: 10px;
            font-size: 1rem;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        .rating-display span {
            font-size: 1.5rem;
            color: #FFD700;
        }
        h1{
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px; 
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

        .div_center {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: flex-start;
            gap: 20px;
        }

        .button-group {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px; /* Space between buttons */
}

.button-group .btn {
    width: 100%; /* Full width of the column */
    padding: 4px 8px; /* Adjust padding for smaller buttons */
    font-size: 0.85rem; /* Smaller font size */
}

    </style>

</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <h1 style="margin-bottom: 30px;">Customer Bookings</h1>
            <div class="container-fluid">
                <div class="filter-sort-container">
                    <form method="GET" action="{{ route('view_orders') }}" style="display: flex; align-items: center; gap: 15px;">
                        <div class="form-group">
                            <label for="status" class="form-label">Filter by Status:</label>
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="" disabled {{ request('status') == '' ? 'selected' : '' }}>Select Status</option>
                                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All</option>
                                <option value="In Queue" {{ request('status') == 'In Queue' ? 'selected' : '' }}>In Queue</option>
                                <option value="Ongoing Service" {{ request('status') == 'Ongoing Service' ? 'selected' : '' }}>Ongoing Service</option>
                                <option value="Finished" {{ request('status') == 'Finished' ? 'selected' : '' }}>Finished</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sort" class="form-label">Sort By:</label>
                            <select name="sort" class="form-select" onchange="this.form.submit()">
                                <option value="" disabled {{ request('sort') == '' ? 'selected' : '' }}>Sort By</option>
                                <option value="status" {{ request('sort') == 'status' ? 'selected' : '' }}>Status</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest Orders</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest Orders</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date_filter" class="form-label">Filter By Date:</label>
                            <select name="date_filter" class="form-select" onchange="this.form.submit()">
                                <option value="" disabled {{ request('date_filter') == '' ? 'selected' : '' }}>Select Date Range</option>
                                <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Today</option>
                                <option value="week" {{ request('date_filter') == 'week' ? 'selected' : '' }}>Last 7 Days</option>
                                <option value="month" {{ request('date_filter') == 'month' ? 'selected' : '' }}>Last 30 Days</option>
                            </select>
                        </div>
                    </form>
                </div>

                <div class="table-container">
                    <table class="table table-striped table-hover table-responsive-lg custom-table w-100">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Address</th>
                                <th>Product Title</th>
                                <th>Status</th>
                                <th>Service Date & Time</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $datas)
                            <tr id="orderRow-{{ $datas->id }}">
                                <td>{{ $datas->name }}</td>
                                <td>{{ $datas->rec_address }}</td>
                                <td>{{ $datas->product->title }}</td>
                                <td>
                                    <span id="orderStatus-{{ $datas->id }}" class="status-badge {{ strtolower(str_replace(' ', '-', $datas->status)) }}">
                                        {{ $datas->status }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($datas->service_datetime)->format('F j, Y \a\t g:i A') }}</td>
                                <td>
    <div class="button-group">
        <!-- Only show "Details" and "Print PDF" buttons if the status is "Finished" -->
        @if($datas->status == 'Finished')
            <a href="{{ url('print_pdf', $datas->id) }}" class="btn btn-secondary btn-sm mb-1">Print PDF</a>
            <button class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#detailsModal-{{ $datas->id }}">Details</button>
        @endif

        <!-- Show "Modify" button only if the status is not "Finished" -->
        @if($datas->status != 'Finished')
            <button class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#modifyModal-{{ $datas->id }}">Modify</button>
        @endif

        <!-- Show "View Finalized" button if finalization exists and status is not "Finished" -->
        @if($datas->finalization && $datas->status != 'Finished')
            <button class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#viewFinalizedModal-{{ $datas->id }}">View Finalized</button>
        @endif

        <!-- Show "Finalize" button only if there is no finalization record -->
        @if(!$datas->finalization && $datas->status != 'Finished')
            <button class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#finalizeModal-{{ $datas->id }}">Finalize</button>
        @endif
    </div>
</td>



                            </tr>

                            <!-- Details Modal -->
                            <div class="modal fade" id="detailsModal-{{ $datas->id }}" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-dark" id="detailsModalLabel">Order Details</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <h6 class="text-primary">Customer Information</h6>
                                                        <p><strong>Name:</strong> {{ $datas->name }}</p>
                                                        <p><strong>Address:</strong> {{ $datas->rec_address }}</p>
                                                        <p><strong>Phone:</strong> {{ $datas->phone }}</p>
                                                    </div>
                                                </div>

                                                <!-- Product Information -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <h6 class="text-primary">Product Information</h6>
                                                        <p><strong>Title:</strong> {{ $datas->product->title }}</p>
                                                        <p><strong>Price:</strong> ${{ $datas->product->price }}</p>
                                                        <p><strong>Status:</strong>
                                                            @if($datas->status == 'In Queue')
                                                                <span class="badge badge-warning">{{ $datas->status }}</span>
                                                            @elseif($datas->status == 'Ongoing Service')
                                                                <span class="badge badge-info">{{ $datas->status }}</span>
                                                            @else
                                                                <span class="badge badge-success">{{ $datas->status }}</span>
                                                            @endif
                                                        </p>
                                                    </div>
                                                    <div class="col-md-6 text-center">
                                                        <h6 class="text-primary">Product Image</h6>
                                                        <img src="products/{{ $datas->product->image }}" alt="Product Image" class="img-fluid rounded product-image">
                                                    </div>
                                                </div>

                                                <!-- Service Information -->
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <h6 class="text-primary">Service Information</h6>
                                                        <p><strong>Assigned Staff:</strong> {{ $datas->staff_id ? $datas->staff->name : 'N/A' }}</p>
                                                        <p><strong>Vehicle Type:</strong> {{ $datas->vehicle ? $datas->vehicle->type : 'N/A' }}</p>
                                                        <p><strong>Size:</strong> {{ $datas->size ? $datas->size : 'N/A' }}</p>
                                                        <p><strong>Service Date & Time:</strong> {{ \Carbon\Carbon::parse($datas->service_datetime)->format('F j, Y \a\t g:i A') }}</p>
                                                    </div>
                                                </div>

                                                <!-- Finalized Order Information -->
                                                @if($datas->finalization)
                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <h6 class="text-primary">Finalized Order Information</h6>
                                                        <p><strong>Total Price:</strong> {{ $datas->finalization->total_price }}</p>
                                                        <p><strong>Description:</strong> {{ $datas->finalization->description }}</p>
                                                    </div>
                                                </div>
                                                @endif

                                                <!-- Rating and Comment -->
                                                @if($datas->rating)
                                                <div class="row mb-3">
                                                    <div class="col-md-12 rating-display">
                                                        <h6 class="text-primary">Customer Feedback</h6>
                                                        <p><strong>Rating:</strong>
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <span style="color: {{ $i <= $datas->rating->rating ? '#FFD700' : '#ddd' }};">&#9733;</span>
                                                            @endfor
                                                        </p>
                                                        <p><strong>Comment:</strong> {{ $datas->rating->comment }}</p>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           <!-- Modify Modal -->
<div class="modal fade" id="modifyModal-{{ $datas->id }}" tabindex="-1" role="dialog" aria-labelledby="modifyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modify Order Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-group">
                    <!-- Display "Ongoing Service" button only if the current status is "In Queue" -->
                    @if($datas->status == 'In Queue')
                        <form method="POST" action="{{ route('update_status', $datas->id) }}">
                            @csrf
                            <input type="hidden" name="status" value="Ongoing Service">
                            <button type="submit" class="btn btn-info">Ongoing Service</button>
                        </form>
                    @endif

                    <!-- Display "Finished" button only if the current status is "Ongoing Service" -->
                    @if($datas->status == 'Ongoing Service')
                        <form method="POST" action="{{ route('update_status', $datas->id) }}">
                            @csrf
                            <input type="hidden" name="status" value="Finished">
                            <button type="submit" class="btn btn-success">Finished</button>
                        </form>
                    @endif

                    <!-- Display "Print PDF" button only if the current status is "Finished" -->
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- edit and view finalization -->
@if($datas->finalization)
<div class="modal fade" id="viewFinalizedModal-{{ $datas->id }}" tabindex="-1" role="dialog" aria-labelledby="viewFinalizedModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Finalized Order Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('update_order_finalization', $datas->id) }}">
                @csrf
                @method('PATCH') <!-- Use PATCH method for updating -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="total_price">Total Price</label>
                        <input type="text" name="total_price" class="form-control" value="{{ $datas->finalization->total_price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $datas->finalization->description }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif





                             <!-- Finalize Order Modal -->
                <div class="modal fade" id="finalizeModal-{{ $datas->id }}" tabindex="-1" role="dialog" aria-labelledby="finalizeModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Finalize Order</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form class="finalizeForm" method="POST" action="{{ route('finalize_order', $datas->id) }}">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="total_price">Total Price</label>
                                        <input type="text" name="total_price" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        



                                        <!-- <form id="finalizeForm-{{ $datas->id }}" method="POST" action="{{ route('finalize_order', $datas->id) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="total_price">Total Price</label>
                                                    <input type="text" name="total_price" class="form-control" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form> -->
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </tbody>
                    </table>

                    <div class="div_deg">
                        {{ $data->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are You Sure You Want To Change The Status?",
                text: "This Will Change The Status Of The Service",
                icon: "info",
                buttons: true,
                dangerMode: true,
            }).then((willCancel)=> {
                if(willCancel) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>







    <!-- JavaScript files -->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>
</html>
