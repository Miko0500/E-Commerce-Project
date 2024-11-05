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
            font-size: 18px; /* Larger font size */
            color: black; /* Changed to black for visibility */
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type='text'],
        input[type='number'],
        input[type='date'],
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
        input[type='date']:focus,
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
            input[type='date'],
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
    </style>
</head>
<body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1>Add Staff</h1>
                <div class="div_deg">
                    <div class="form-container">
                        <form action="{{ url('add_staff') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="input_deg">
                                <label for="image">Staff Image</label>
                                <input type="file" name="image">
                            </div>

                            <div class="input_deg">
                                <label for="name">Name</label>
                                <input type="text" name="name" required placeholder="Enter staff name">
                            </div>

                            <div class="input_deg">
                                <label for="age">Age</label>
                                <input type="number" name="age" required placeholder="Enter age">
                            </div>

                            <div class="input_deg">
                                <label for="birthday">Birthday</label>
                                <input type="date" name="birthday" required>
                            </div>

                            <div class="input_deg">
                                <label for="sex">Sex</label>
                                <select name="sex" required>
                                    <option value="">Select an Option</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="input_deg">
                                <label for="contact">Contact</label>
                                <input type="text" name="contact" required placeholder="Enter contact number">
                            </div>

                            <div class="input_deg">
                                <label for="address">Address</label>
                                <textarea name="address" required placeholder="Enter staff address"></textarea>
                            </div>

                            <div class="input_deg">
                                <input class="btn btn-success" type="submit" value="Add Staff">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
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
