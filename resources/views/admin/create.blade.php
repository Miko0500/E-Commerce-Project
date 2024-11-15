<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">
        
    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="container">
    <h2>Add Final Prize</h2>

    <form action="{{ route('final_prizes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="product_id">Product</label>
            <select name="product_id" id="product_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="vehicle_id">Vehicle</label>
            <select name="vehicle_id" id="vehicle_id" class="form-control" required>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" data-sizes="{{ json_encode($vehicle->sizes) }}">{{ $vehicle->type }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="vehicle_size">Vehicle Size</label>
            <select name="vehicle_size" id="vehicle_size" class="form-control" required>
                <!-- Vehicle sizes will be populated here -->
            </select>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <h3 class="mt-5">Final Prices</h3>

    <!-- Table to show the final prices -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Product</th>
                <th>Vehicle</th>
                <th>Size</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($finalPrizes as $finalPrize)
                <tr>
                    <td>{{ $finalPrize->product_title }}</td>
                    <td>{{ $finalPrize->vehicle_type }}</td>
                    <td>{{ implode(', ', json_decode($finalPrize->vehicle_sizes)) }}</td> <!-- Display vehicle sizes -->
                    <td>{{ $finalPrize->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    // When the vehicle is changed, update the vehicle sizes dropdown
    document.getElementById('vehicle_id').addEventListener('change', function() {
        var vehicleSelect = this;
        var vehicleSizeSelect = document.getElementById('vehicle_size');
        var sizes = JSON.parse(vehicleSelect.options[vehicleSelect.selectedIndex].getAttribute('data-sizes'));

        // Clear previous size options
        vehicleSizeSelect.innerHTML = '';

        // Add new size options
        sizes.forEach(function(size) {
            var option = document.createElement('option');
            option.value = size;
            option.text = size;
            vehicleSizeSelect.appendChild(option);
        });
    });

    // Trigger change event on page load to populate the sizes for the default selected vehicle
    document.getElementById('vehicle_id').dispatchEvent(new Event('change'));
</script>


    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
</body>
</html>
