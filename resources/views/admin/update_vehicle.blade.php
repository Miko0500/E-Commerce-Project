<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #f9f9f9;
            color: #333;
            font-family: Arial, sans-serif;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 40px;
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 40px auto;
        }

        h2 {
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        label {
            display: inline-block;
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
            font-weight: 500;
        }

        input[type='text'],
        input[type='number'],
        input[type='file'],
        select {
            width: 100%;
            height: 45px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            background-color: #f9f9f9;
            color: #333;
            margin-top: 5px;
            margin-bottom: 15px;
            transition: border-color 0.3s;
        }

        input[type='text']:focus,
        input[type='number']:focus,
        input[type='file']:focus,
        select:focus {
            border-color: #007bff;
            outline: none;
        }

        .input_deg {
            margin-bottom: 20px;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 5px;
        }

        .checkbox-group label {
            font-size: 14px;
            font-weight: 500;
            color: #555;
        }

        .vehicle-image-preview {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .vehicle-image-preview img {
            width: 120px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .btn-success {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .btn-success:hover {
            background-color: #0056b3;
        }


        .btn-back {
            background-color: #6c757d;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s, transform 0.2s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-back:hover {
            background-color: #5a6268;
            transform: scale(1.05);
        }

        .btn-back:active {
            background-color: #495057;
        }
    </style>
</head>
<body>

    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">

        
            <div class="container-fluid">
                <h2>Update Vehicle</h2>
                <button onclick="history.back()" class="btn-back">Back</button>
                <div class="div_deg">

                

                    <form action="{{ url('edit_vehicle', $vehicle->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="input_deg">
                            <label for="type">Vehicle Type</label>
                            <input type="text" id="type" name="type" value="{{ $vehicle->type }}" required>
                        </div>

                        <div class="input_deg">
                            <label for="sizes">Size</label>
                            @php
                                $sizes = $vehicle->sizes;
                            @endphp
                            <div class="checkbox-group">
                                <label><input type="checkbox" name="sizes[]" value="S" {{ in_array('S', $sizes) ? 'checked' : '' }}> Small (S)</label>
                                <label><input type="checkbox" name="sizes[]" value="M" {{ in_array('M', $sizes) ? 'checked' : '' }}> Medium (M)</label>
                                <label><input type="checkbox" name="sizes[]" value="L" {{ in_array('L', $sizes) ? 'checked' : '' }}> Large (L)</label>
                                <label><input type="checkbox" name="sizes[]" value="XL" {{ in_array('XL', $sizes) ? 'checked' : '' }}> Extra Large (XL)</label>
                                <label><input type="checkbox" name="sizes[]" value="XXL" {{ in_array('XXL', $sizes) ? 'checked' : '' }}> Extra Extra Large (XXL)</label>
                            </div>
                        </div>

                        <div class="input_deg">
                            <label for="status">Status</label>
                            <select id="status" name="status" required>
                                <option value="1" {{ $vehicle->status ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ !$vehicle->status ? 'selected' : '' }}>Not Available</option>
                            </select>
                        </div>

                        <div class="input_deg vehicle-image-preview">
                            <label for="current_image">Current Image</label><br>
                            @if($vehicle->image)
                                <img src="{{ asset('vehicles/' . $vehicle->image) }}" alt="Current Vehicle Image">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>

                        <div class="input_deg">
                            <label for="image">New Image</label>
                            <input type="file" name="image" id="image">
                        </div>

                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Update Vehicle">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
