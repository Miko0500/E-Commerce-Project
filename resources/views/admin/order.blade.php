<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">

    table
    {
        border: 2px solid pink;
        text-align: center;
    }

    th
    {
        background-color: #dc3545;
        padding: 10px;
        font-size: 18px;
        font-weight: bold;
        color: white;
        border: 3px solid black;
        text-align: center;
    }

    .table_center
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 0px;
    }

    td
    {
        color: black;
        padding: 15px;
        border: 3px solid black;
        text-align: center;
        vertical-align: middle;
        background-color: lightpink;
        
    }

    .btn {
        display: flex;
        justify-content: center;
        align-items: center; /* Ensure the buttons are vertically centered */
        gap: 10px; /* Add space between the buttons */
    }

    .div_deg
    {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }

    h1 {
            color: #fff;
            text-align: center;
            margin-bottom: 30px;
        }

    </style>
  </head>
  <body>

    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        
        <div class="page-header">
        <h1 style="color: white; margin-bottom: 30px;">Customer Orders</h1>
          <div class="container-fluid">


        <div class="table_center">

          <table>

            <tr>

            <th>Customer Name</th>

            <th>Address</th>

            <th>Phone</th>

            <th>Product Title</th>

            <th>Price</th>

            <th>Image</th>

            <th>Status</th>

            <th>Change Status</th>

            <th>Print PDF</th>

            </tr>

            @foreach($data as $datas)

            <tr>

            <td>{{$datas->name}}</td>
            <td>{{$datas->rec_address}}</td>
            <td>{{$datas->phone}}</td>
            <td>{{$datas->product->title}}</td>
            <td>{{$datas->product->price}}</td>
            <td>

            <img width="100" height="100" src="products/{{$datas->product->image}}" alt="">

            </td>
            <td>

            @if($datas->status == 'in progress')

            <span class="btn btn-warning btn-sm" style="color: white;">{{$datas->status}}</span>

            @elseif($datas->status == 'On The Way')

            <span class="btn btn-info btn-sm" style="color: white;">{{$datas->status}}</span>

            @else

            <span class="btn btn-success btn-sm" style="color: white;">{{$datas->status}}</span>

            @endif

            </td>

            <td>
                <a class="btn btn-info btn-sm btn-block" href="{{url('on_the_way',$datas->id)}}">On The Way</a>

                <a class="btn btn-success btn-sm btn-block" href="{{url('delivered',$datas->id)}}">Delivered</a>
            </td>

            <td>
                <a class="btn btn-secondary btn-sm" href="{{url('print_pdf',$datas->id)}}">Print PDF</a>
            </td>
            

            </tr>

            @endforeach

          </table>

          </div>

          <div class="div_deg">

          {{$data->onEachSide(1)->links()}}

          </div>


          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>