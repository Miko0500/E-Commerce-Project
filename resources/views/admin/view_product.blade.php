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
        flex-wrap: wrap;
        gap: 20px;
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

    /* Card layout for services */
    .service-card {
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

    .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
        }

    .service-image {
        height: 120px;
        width: 120px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 15px;
    }

    .service-info {
        margin-bottom: 10px;
        font-size: 16px;
        color: black;
    }

    .service-info span {
        font-weight: bold;
    }

    .card-actions {
        display: flex;
        gap: 10px;
        margin-top: 10px;
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
            <h1 style="margin-bottom: 30px;">All Services</h1>
            <div class="container-fluid">

                <form action="{{url('product_search')}}" method="get">
                    @csrf
                    <input type="search" name="search" placeholder="Search service">
                    <input type="submit" class="btn btn-secondary" value="Search">
                </form>

                <div class="div_deg">
                    @foreach($product as $products)
                    <div class="service-card">
                        <img class="service-image" src="{{ asset('products/' . $products->image) }}" alt="{{ $products->name }}">

                        <div class="service-info">
                            <span>Title:</span> {{ $products->title }}
                        </div>

                        <div class="service-info">
                            <span>Description:</span> {!! Str::limit($products->description, 50) !!}
                        </div>

                        <div class="service-info">
                            <span>Category:</span> {{ $products->category }}
                        </div>

                        <div class="service-info">
                            <span>Price:</span> ${{ $products->price }}
                        </div>

                        <div class="service-info">
                            <span>Quantity:</span> {{ $products->quantity }}
                        </div>

                        <div class="card-actions">
                        <a class="btn btn-success" onclick="checkEditCondition(event, {{ $products->id }})" href="{{ url('update_product', $products->id) }}">Edit</a>

                            <a class="btn btn-danger" onclick="confirmation(event, {{ $products->id }})" href="{{url('delete_product', $products->id)}}">Delete</a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="div_deg">
                    {{$product->onEachSide(1)->links()}}
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script type="text/javascript">
        function confirmation(ev, productId) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');

            // AJAX request to check if the product can be deleted
            fetch(`/checkProductUsage/${productId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.canDelete) {
                        swal({
                            title: "Are You Sure You Want To Delete This Service?",
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
                            title: "Cannot Delete Service",
                            text: "This service is currently being used. Please complete all ongoing orders before deleting.",
                            icon: "error",
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    swal({
                        title: "Error",
                        text: "An error occurred while checking the service. Please try again.",
                        icon: "error",
                    });
                });
        }
    </script>

<script>
    function checkEditCondition(event, productId) {
        event.preventDefault();
        const urlToRedirect = event.currentTarget.getAttribute('href');

        // AJAX call to check if the product is in use
        fetch(`/checkProductUsage/${productId}`)
            .then(response => response.json())
            .then(data => {
                if (data.canDelete) {
                    // If not in use, proceed to edit page
                    window.location.href = urlToRedirect;
                } else {
                    // Show error if the product is in use
                    swal({
                        title: "Cannot Edit Product",
                        text: "This product is currently in use and cannot be edited.",
                        icon: "error",
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swal({
                    title: "Error",
                    text: "An error occurred while checking the product status. Please try again.",
                    icon: "error",
                });
            });
    }
</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
