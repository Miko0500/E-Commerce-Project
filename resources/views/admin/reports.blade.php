<!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


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

        @media print {
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
        }

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

/* Hide elements that should not be printed */
@media print {
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

    /* Print button should not appear when printing */
    .btn-print, .btn-download {
        display: none;
    }
}

h1 {
    color: #333;
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
}

.report-header {
    text-align: center;
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 1.5rem;
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
                                <option value="year" {{ request('date_filter') == 'year' ? 'selected' : '' }}>This Year</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sort" class="form-label">Sort By:</label>
                            <select name="sort" class="form-select" onchange="this.form.submit()">
                                <option value="customer_name" {{ request('sort') == 'customer_name' ? 'selected' : '' }}>Customer Name</option>
                                <option value="service_date" {{ request('sort') == 'service_date' ? 'selected' : '' }}>Service Date</option>
                            </select>
                        </div>
                    </form>
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
                                </tr>
                            @endforeach
                        </tbody>
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