<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


        @include('admin.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <style type="text/css">
         .report-header {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .filter-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 20px;
        }

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
            padding: 15px;
            text-align: center;
            vertical-align: middle;
            font-size: 0.95rem;
            color: #333;
        }

        .custom-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .btn-print, .btn-download {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin: 5px;
        }

        .btn-print:hover, .btn-download:hover {
            background-color: #218838;
        }

        /* @media print {
            body * {
                visibility: hidden;
            }
            .printable-content, .printable-content * {
                visibility: visible;
            }
            .printable-content {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                max-width: 100%;
            }
        }

        h1 {
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        } */

       /* Sorting and Filter Section */
.filter-container {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 20px;
}

.filter-container form {
    display: flex;
    gap: 15px;
    align-items: center;
}

.form-group {
    margin-bottom: 0;
}

.form-label {
    font-weight: bold;
    color: #333;
    font-size: 14px;
}

/* Style for the sorting and filter select dropdown */
.form-select {
    padding: 8px 15px;
    font-size: 14px;
    color: #333;
    background-color: #fff;
    border: 1px solid #007bff;
    border-radius: 5px;
    outline: none;
    cursor: pointer;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-select:hover,
.form-select:focus {
    border-color: #0056b3;
    box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);
}

/* Style for the Print and Download buttons */
.btn-print, .btn-download {
    background-color: #28a745;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    font-size: 1rem;
    margin-right: 10px; /* Space between buttons */
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: background-color 0.3s, transform 0.2s;
}

/* Print button hover effect */
.btn-print:hover, .btn-download:hover {
    background-color: #218838;
    transform: translateY(-2px);
}

/* Print button specific styles */
.btn-print {
    background-color: #007bff;
    color: white;
}

.btn-print:hover {
    background-color: #0056b3;
}

/* For pagination controls */
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

@media print {
    body * {
        visibility: hidden; /* Hide everything */
    }

    .printable-content, .printable-content * {
        visibility: visible; /* Make content inside printable-content visible */
    }

    .printable-content {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        max-width: 100%;
    }

    /* Image at the top-left of the printed page with max width and height */
    .print-image {
        position: fixed;
        top: 50px;
        left: 20px;
        display: block;
        z-index: 9999; /* Ensure it stays above other content */
    }

    .print-image img {
        visibility: visible;
        max-width: 150px; /* Prevent the image from being larger than 150px */
        max-height: 100px; /* Prevent the image from being taller than 100px */
        width: auto; /* Maintain aspect ratio */
        height: auto; /* Maintain aspect ratio */
    }

    .btn-print, .btn-download, .pagination {
        display: none; /* Hide buttons during print */
    }

    /* Table Styling */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 80px; /* Push the table below the image */
    }

    .custom-table thead th {
        background-color: #007bff;
        color: white;
        padding: 10px;
        text-align: center;
        font-weight: bold;
    }

    .custom-table tbody td {
        padding: 8px;
        text-align: center;
        font-size: 0.9rem;
        color: #333;
    }

    .custom-table tfoot td {
        font-weight: bold;
        font-size: 1rem;
        text-align: right;
    }

    .custom-table th, .custom-table td {
        border: 1px solid #ddd;
    }

    .report-header {
        margin-bottom: 20px;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

    .total-price td:last-child {
        color: green;
        font-weight: bold;
    }

    .custom-table tbody tr {
        height: 40px;
    }

    h1 {
        font-size: 24px;
    }
}

        </style>

    </head>
    <body>
        @include('admin.header')
        @include('admin.sidebar')

        <div class="page-content">
        <div class="page-header">
            <h1>Report of Customer Orders</h1>
            <div class="container-fluid">
                <div class="filter-container">
                <form method="GET" action="{{ route('reports') }}">
    @csrf
    <div class="form-group">
        <label for="date_filter" class="form-label">Filter By Date:</label>
        <select name="date_filter" class="form-select" onchange="this.form.submit()">
            <option value="today" {{ request('date_filter') == 'today' ? 'selected' : '' }}>Today</option>
            <option value="week" {{ request('date_filter') == 'week' ? 'selected' : '' }}>This Week</option>
            <option value="month" {{ request('date_filter') == 'month' ? 'selected' : '' }}>This Month</option>
            
        </select>
    </div>

    <div class="form-group">
    <label for="date_filter" class="form-label">Filter By Date(s):</label>
    <!-- Flatpickr Input -->
    <input type="text" name="date_filter" id="date_filter" class="form-select" value="{{ request('date_filter') }}" placeholder="Select multiple dates" onchange="this.form.submit()">
</div>


<div class="form-group">
    <label for="staff_filter" class="form-label">Filter By Staff:</label>
    <select name="staff_filter" class="form-select" onchange="this.form.submit()">
        <option value="">Select Staff</option>
        @foreach($staffList as $staff)
            <option value="{{ $staff->id }}" {{ request('staff_filter') == $staff->id ? 'selected' : '' }}>{{ $staff->name }}</option>
        @endforeach
    </select>
</div>


</form>

                </div>

                <div class="print-image">
    <img style="visibility: visible;
        max-width: 150px; /* Prevent the image from being larger than 150px */
        max-height: 100px; /* Prevent the image from being taller than 100px */
        width: auto; /* Maintain aspect ratio */
        height: auto; /* Maintain aspect ratio */" src="{{asset('/images/logo.jpg')}}" alt="Report Logo" class="report-logo">
</div>

<div class="report-header">
    <h3>Orders Report</h3>
    <a href="javascript:void(0)" onclick="printReport()" class="btn-print">Print Report</a>
</div>

<div class="table-container printable-content">
    <table class="custom-table">
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Product Title</th>
                <th>Status</th>
                <th>Service Date</th>
                <th>Staff Assigned</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->rec_address }}</td>
                    <td>{{ $order->product->title }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ \Carbon\Carbon::parse($order->service_datetime)->format('F j, Y \a\t g:i A') }}</td>
                    <td>{{ $order->staff ? $order->staff->name : 'N/A' }}</td>
                    <td>P{{ number_format($order->finalization ? $order->finalization->total_price : 0, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: right; font-weight: bold;">Total Price</td>
                <td style="font-weight: bold; color: green;">P{{ number_format($totalPrice, 2) }}</td>
            </tr>
        </tfoot>
    </table>
</div>



                <div class="pagination">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function printReport() {
            window.print(); // Trigger print dialog
        }
    </script>

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

<script>
    flatpickr("#date_filter", {
        mode: "multiple", // Enable multiple date selection
        dateFormat: "Y-m-d", // Set the date format (e.g. 2024-11-04)
        onChange: function(selectedDates) {
            // Automatically submit the form when dates are selected
            document.querySelector("form").submit();
        }
    });
</script>



<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>




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