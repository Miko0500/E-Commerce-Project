<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            border: 1px solid #ccc;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .customer-info, .product-info {
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }
        .product-info {
            padding-top: 20px;
        }
        .info-label {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .img
        {
            display: flex;
        justify-content: center;
        align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Details</h1>
        </div>
        <div class="customer-info">
            <h3>Customer Information</h3>
            <div class="info-label">Name:</div>
            <div>{{$data->name}}</div>
            <div class="info-label">Address:</div>
            <div>{{$data->rec_address}}</div>
            <div class="info-label">Phone:</div>
            <div>{{$data->phone}}</div>
        </div>
        <div class="product-info">
            <h3>Product Information</h3>
            <div class="info-label">Title:</div>
            <div>{{$data->product->title}}</div>
            <div class="info-label">Price:</div>
            <div>{{$data->product->price}}</div>
            <div>
                <img class="img" width="300" height="300" src="products/{{$data->product->image}}" alt="">
            </div>
        </div>
    </div>
</body>
</html>
