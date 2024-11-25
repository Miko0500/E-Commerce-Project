<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #f0f2f5;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }

        .page-content {
            padding: 40px 20px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
        }

        h1 {
            color: black;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;    
            font-weight: bold;
        }

        .input_deg {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 18px; /* Increased font size for better readability */
            color: black; /* Black text color for maximum visibility */
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type='text'],
        input[type='file'],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px; /* Increased font size */
            color: black;
            background-color: #f9f9f9;
            transition: border 0.3s ease;
        }

        input[type='text']:focus,
        input[type='file']:focus,
        select:focus {
            border-color: #007bff;
            background-color: #fff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        .checkbox-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 10px;
        }

        .checkbox-container label {
            font-size: 16px; /* Increased font size */
            color: black;
        }

        input[type='checkbox'] {
            margin-right: 5px;
        }

        .btn-success {
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 6px;
            font-size: 18px; /* Larger font size for button */
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #218838;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 600px) {
            .form-container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            input[type='text'],
            input[type='file'],
            select {
                height: 40px;
            }

            .btn-success {
                padding: 12px;
                font-size: 16px;
            }
        }

        /* Styling the textarea */
.input_deg textarea {
    width: 100%; /* Make textarea fill the width of its container */
    padding: 12px; /* Add padding inside the textarea */
    font-size: 14px; /* Set font size */
    border: 1px solid #ddd; /* Light gray border */
    border-radius: 5px; /* Rounded corners */
    resize: vertical; /* Allow vertical resizing */
    min-height: 120px; /* Set minimum height */
    outline: none; /* Remove outline on focus */
    transition: all 0.3s ease; /* Smooth transition for focus effects */
}

.input_deg textarea:focus {
    border-color: #3498db; /* Blue border when focused */
    box-shadow: 0 0 5px rgba(52, 152, 219, 0.5); /* Light blue shadow */
}

.input_deg label {
    display: block;
            font-size: 18px; /* Increased font size for better readability */
            color: black; /* Black text color for maximum visibility */
            margin-bottom: 10px;
            font-weight: bold;
}

.input_deg {
    margin-bottom: 15px; /* Add space between input fields */
}

    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Add Vehicle</h1>
                <div class="div_deg">
                    <div class="form-container">
                    <form action="{{ url('add_vehicle') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="input_deg">
        <label for="type">Vehicle Type</label>
        <input type="text" name="type" required placeholder="Enter vehicle type">
    </div>

    <div class="input_deg">
        <label for="image">Vehicle Image</label>
        <input type="file" name="image">
    </div>

    <div class="input_deg">
        <label for="sizes">Sizes</label>
        <div class="checkbox-container">
            <label><input type="checkbox" name="sizes[]" value="S"> Small (S)</label>
            <label><input type="checkbox" name="sizes[]" value="M"> Medium (M)</label>
            <label><input type="checkbox" name="sizes[]" value="L"> Large (L)</label>
            <label><input type="checkbox" name="sizes[]" value="XL"> Extra Large (XL)</label>
            <label><input type="checkbox" name="sizes[]" value="XXL"> Extra Extra Large (XXL)</label>
        </div>
    </div>

    <div class="input_deg">
        <label for="description">Description</label>
        <textarea name="description" required placeholder="Enter vehicle description"></textarea>
    </div>

    <div class="input_deg">
        <input class="btn btn-success" type="submit" value="Add Vehicle">
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files -->
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
