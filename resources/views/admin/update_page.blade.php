<!DOCTYPE html>
<html>
<head> 
    @include('admin.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
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
            max-width: 700px;
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
        select,
        textarea {
            width: 100%;
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
        input[type='file']:focus,
        select:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .input_deg {
            margin-bottom: 15px;
        }

        .product-image-preview {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .product-image-preview img {
            width: 150px;
            height: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .btn-success {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 12px 20px;
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

                <h2>Update Service</h2>
                <button onclick="history.back()" class="btn-back">Back</button>
                <div class="div_deg">

                    <form action="{{ url('edit_product', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="input_deg">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" value="{{ $data->title }}" required>
                        </div>

                        <div class="input_deg">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" required>{{ $data->description }}</textarea>
                        </div>

                        <div class="input_deg">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" value="{{ $data->price }}" required>
                        </div>

                        <!-- <div class="input_deg">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" value="{{ $data->quantity }}" required>
                        </div> -->

                        <div class="input_deg">
                            <label for="category">Category</label>
                            <select name="category" id="category" required>
                                <option value="{{ $data->category }}">{{ $data->category }}</option>
                                @foreach($category as $categoryItem)
                                    <option value="{{ $categoryItem->category_name }}">{{ $categoryItem->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input_deg product-image-preview">
                            <label for="current_image">Current Image</label><br>
                            <img src="/products/{{ $data->image }}" alt="Current Product Image">
                        </div>

                        <div class="input_deg">
                            <label for="image">New Image</label>
                            <input type="file" name="image" id="image">
                        </div>

                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Update Service">
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('/admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('/admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
