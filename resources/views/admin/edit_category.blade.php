<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')

    <style type="text/css">
        /* Page Background */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        /* Page Header */
        h1 {
            color: #333;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
        }

        /* Form Container */
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 500px; /* Fixed width for centered form */
        }

        /* Input Field */
        input[type='text'] {
            width: 100%;
            max-width: 400px;
            height: 50px;
            padding: 10px;
            margin-right: 15px;
            border: 2px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background-color: #fafafa;
            color: #333;
            transition: border-color 0.3s ease;
        }

        input[type='text']:focus {
            border-color: #007bff;
        }

        /* Submit Button */
        .btn-primary {
            height: 50px;
            padding: 0 20px;
            border: none;
            border-radius: 8px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    @include('admin.header')
    @include('admin.sidebar')

    <!-- Main Content -->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h1>Update Category</h1>

                <div class="div_deg">
                    <form action="{{ url('update_category', $data->id) }}" method="post">
                        @csrf
                        <input type="text" name="category" value="{{ $data->category_name }}" placeholder="Enter category name">
                        <input class="btn btn-primary" type="submit" value="Update Category">
                    </form>
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
