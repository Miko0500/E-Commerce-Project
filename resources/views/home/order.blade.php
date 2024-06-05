<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    @include('home.css')


    <style type="text/css">

    .div_center
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 60px;
    }

    table
    {
        border: 2px solid black;
        text-align: center;
        width: 800px;
    }

    th
    {
        border: 2px solid black;
        text-align: center;
        color: white;
        font-size: 20px;
        font-weight: bold;
        background-color: #7b1717;
    }

    td
    {
        border: 2px solid black;
        padding: 10px;
    }

    .cart_value
    {
        text-align: center;
        margin-bottom: 70px;
        padding: 18px;
    }

    .order_deg
    {
        padding-right: 100px;
        margin-top: -50px;
    }
    
    label
    {
        display: inline-block;
        width: 150px;
    }

    .div_gap
    {
        padding: 20px;
    }

    .pagination li a {
        color: red; /* Change to your desired color */
        /* Add any additional styles here */
    }

    /* Style for active pagination link */
    .pagination li.active a {
        color: red; /* Change to your desired active color */
        /* Add any additional styles here */
    }

</style>
</head>
<body>
    
<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')


    <div class="div_center">

    <table>

    <tr>

    <th>Product Name</th>
    <th>Product Price</th>
    <th>Delivery Status</th>
    <th>Image</th>

    </tr>

    @foreach($order as $orders)

    <tr>

    <td>{{$orders->product->title}}</td>
    <td>{{$orders->product->price}}</td>
    <td>
        
    @if($orders->status == 'in progress')

            <span class="btn btn-warning btn-sm" style="color: white;">{{$orders->status}}</span>

            @elseif($orders->status == 'On The Way')

            <span class="btn btn-info btn-sm" style="color: white;">{{$orders->status}}</span>

            @else

            <span class="btn btn-success btn-sm" style="color: white;">{{$orders->status}}</span>

            @endif

    </td>
    <td>
    <img width="100" height="100" src="/products/{{$orders->product->image}}">
    </td>

    </tr>

    @endforeach

    </table>

    </div>
    </div>
<div class="div_center">

{{$order->onEachSide(1)->links()}}

</div>
</div>


  <!-- info section -->
  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    
    <!-- footer section -->
    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> Crochet
          <a href="https://html.design/">With Us</a>
        </p>
      </div>
    </footer>
    <!-- footer section -->

  </section>

  <!-- end info section -->

  @yield('content')

<script>
    (function() {
        history.pushState(null, null, location.href);
        window.onpopstate = function() {
            history.go(1);
        };
    })();
</script>

</body>
</html>