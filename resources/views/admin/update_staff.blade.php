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
        input[type='date'],
        input[type='file'],
        select,
        textarea {
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

        textarea {
            height: 80px;
            resize: vertical;
        }

        input[type='text']:focus,
        input[type='number']:focus,
        input[type='date']:focus,
        input[type='file']:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .input_deg {
            margin-bottom: 20px;
        }

        .staff-image-preview {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .staff-image-preview img {
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
                <h2>Update Staff</h2>
                <button onclick="history.back()" class="btn-back">Back</button>
                <div class="div_deg">

                    <form action="{{ url('edit_staff', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="input_deg">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $data->name }}" required>
                        </div>

                        <div class="input_deg">
                            <label for="age">Age</label>
                            <input type="number" name="age" id="age" value="{{ $data->age }}" required>
                        </div>

                        <div class="input_deg">
                            <label for="birthday">Birthday</label>
                            <input type="date" name="birthday" id="birthday" value="{{ $data->birthday }}" required>
                        </div>

                        <div class="input_deg">
                            <label for="sex">Sex</label>
                            <select name="sex" id="sex" required>
                                <option value="male" {{ $data->sex == 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female" {{ $data->sex == 'female' ? 'selected' : '' }}>Female</option>
                                <option value="other" {{ $data->sex == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="input_deg">
                            <label for="contact">Contact</label>
                            <input type="text" name="contact" id="contact" value="{{ $data->contact }}" required>
                        </div>

                        <div class="input_deg">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" required>{{ $data->address }}</textarea>
                        </div>

                        <div class="input_deg staff-image-preview">
                            <label for="current_image">Current Image</label><br>
                            @if($data->image)
                                <img src="{{ asset('staff/' . $data->image) }}" alt="Current Staff Image">
                            @else
                                <p>No image available</p>
                            @endif
                        </div>

                        <div class="input_deg">
                            <label for="image">New Image</label>
                            <input type="file" name="image" id="image">
                        </div>

                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Update Staff">
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
