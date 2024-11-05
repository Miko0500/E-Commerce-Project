<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
    /* Container and Card Layout */
    .div_deg {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        border: 2px solid #007bff;
        border-radius: 12px;
        background: linear-gradient(135deg, #f9f9f9, #eaeaea);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px;
        width: 500px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    /* Text Styles */
    .card h5 {
        font-size: 28px;
        font-weight: bold;
        color: #007bff;
        margin-bottom: 15px;
        text-align: center;
    }

    .card p {
        font-size: 16px;
        line-height: 1.6;
        color: #444;
        margin-bottom: 10px;
        text-align: left;
    }

    /* Image Styling */
    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
        border: 1px solid #ddd;
    }

    /* Status Badge Styles */
    .status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 5px;
        font-weight: bold;
        color: #fff;
        margin: 10px 0;
        text-align: center;
    }

    .status.in-queue {
        background-color: #ffc107;
    }

    .status.ongoing {
        background-color: #17a2b8;
    }

    .status.finished {
        background-color: #28a745;
    }

    /* Button Styles */
    .btn-group {
        display: flex;
        justify-content: space-around;
        gap: 10px;
        margin-top: 20px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        text-align: center;
        text-decoration: none;
        color: #fff;
        transition: background-color 0.3s, box-shadow 0.3s;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-info {
        background-color: #007bff;
    }

    .btn-info:hover {
        background-color: #0056b3;
    }

    .btn-success {
        background-color: #28a745;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    /* Rating Styling */
    .rating-display {
        margin-top: 20px;
        border-top: 1px solid #ddd;
        padding-top: 10px;
        font-size: 16px;
    }

    .rating-display span {
        font-size: 20px;
        color: #FFD700;
    }


       /* Filter and Sort Container Styling */
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
            max-width: 450px; 
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

        .form-select:hover,
        .form-select:focus {
            border-color: #0056b3;
            box-shadow: 0 2px 5px rgba(0, 123, 255, 0.2);
        }
        h1{
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px; 
        }
        h5{
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px; 
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
                    </form>
                </div>

                <div class="div_deg">
                    @foreach($data as $datas)
                    <div class="card">
                        <h5 style=" color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px; ">Customer Name: {{$datas->name}}</h5>
                        <p><strong>Address:</strong> {{$datas->rec_address}}</p>
                        <p><strong>Phone:</strong> {{$datas->phone}}</p>
                        <p><strong>Product Title:</strong> {{$datas->product->title}}</p>
                        <p><strong>Price:</strong> ${{$datas->product->price}}</p>
                        <img src="products/{{$datas->product->image}}" alt="Product Image">
                        <p><strong>Status:</strong>
                            @if($datas->status == 'In Queue')
                                <span class="status in-queue">{{$datas->status}}</span>
                            @elseif($datas->status == 'Ongoing Service')
                                <span class="status ongoing">{{$datas->status}}</span>
                            @else
                                <span class="status finished">{{$datas->status}}</span>
                            @endif
                        </p>
                        <p><strong>Assigned Staff:</strong>
                            {{ $datas->staff_id ? $datas->staff->name : 'N/A' }}
                        </p>
                        <p><strong>Vehicle Type:</strong> {{ $datas->vehicle ? $datas->vehicle->type : 'N/A' }}</p>
                        <p><strong>Size:</strong> {{ $datas->size ? $datas->size : 'N/A' }}</p>
                        <p><strong>Service Date & Time:</strong> {{ $datas->service_datetime ? \Carbon\Carbon::parse($datas->service_datetime)->format('F j, Y \a\t g:i A') : 'Not scheduled' }}</p>
                        
                        @if($datas->rating)
            <div class="rating-display">
                <p><strong>Customer Rating:</strong> 
                    @for($i = 1; $i <= 5; $i++)
                        <span style="color: {{ $i <= $datas->rating->rating ? '#FFD700' : '#ddd' }};">&#9733;</span>
                    @endfor
                </p>
                <p><strong>Customer Comment:</strong> {{ $datas->rating->comment }}</p>
            </div>
        @endif

        <div class="btn-group">
    @if($datas->status == 'In Queue')
        <a class="btn btn-info" onclick="confirmation(event)" href="{{url('ongoing_service', $datas->id)}}">Ongoing Service</a>
        <a class="btn btn-success" onclick="confirmation(event)" href="{{url('finished', $datas->id)}}">Finished</a>
    @elseif($datas->status == 'Ongoing Service')
        <a class="btn btn-success" onclick="confirmation(event)" href="{{url('finished', $datas->id)}}">Finished</a>
    @elseif($datas->status == 'Finished')
        <a class="btn btn-secondary" href="{{url('print_pdf', $datas->id)}}">Print PDF</a>
    @endif
</div>

                    </div>
                    @endforeach
                </div>

                <div class="div_deg">
                    {{$data->onEachSide(1)->links()}}
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
            }).then((willCancel)=>{
                if(willCancel) {
                    window.location.href=urlToRedirect;
                }
            });
        }

    </script>

    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>
