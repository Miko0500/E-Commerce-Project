<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
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
            font-size: 18px; /* Larger font size */
            color: black; /* Changed to black for visibility */
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type='text'],
        input[type='number'],
        input[type='file'],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px; /* Increased font size */
            color: black; /* Black text color for inputs */
            background-color: #f9f9f9;
            transition: border 0.3s ease;
        }

        input[type='text']:focus,
        input[type='number']:focus,
        input[type='file']:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            background-color: #fff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.3);
        }

        textarea {
            height: 120px; /* Taller textarea */
            resize: none;
        }

        .btn-success {
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 6px;
            font-size: 18px; /* Larger font size */
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
            input[type='number'],
            input[type='file'],
            select,
            textarea {
                height: 40px;
            }

            .btn-success {
                padding: 12px;
                font-size: 16px;
            }
        }

        .input_deg label {
    display: block;
            font-size: 18px; /* Increased font size for better readability */
            color: black; /* Black text color for maximum visibility */
            margin-bottom: 10px;
            font-weight: bold;
}
    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 >Add Service</h1>
                
                <div class="div_deg">
                    <div class="form-container">
                        <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="input_deg">
                                <label for="title">Service Title</label>
                                <input type="text" name="title" required placeholder="Enter service title">
                            </div>

                            <div class="input_deg">
                                <label for="description">Description</label>
                                <textarea name="description" required placeholder="Enter service description"></textarea>
                            </div>

                            <div class="input_deg">
                                <label for="price">Price</label>
                                <input type="text" name="price" placeholder="Enter price">
                            </div>

                            <!-- <div class="input_deg">
                                <label for="qty">Quantity</label>
                                <input type="number" name="qty" placeholder="Enter quantity">
                            </div> -->

                            <div class="input_deg">
                                <label for="category">Service Category</label>
                                <select name="category" required>
                                    <option value="">Select a Category</option>
                                    @foreach($category as $category)
                                    <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="input_deg">
                                <label for="image">Service Image</label>
                                <input type="file" name="image">
                            </div>

                            <div class="input_deg">
                                <input class="btn btn-success" type="submit" value="Add Service">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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
