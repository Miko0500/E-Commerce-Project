<!DOCTYPE html>
<html>

<head>
  
@include('home.css')

<style type="text/css">

    .div_center
    {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .detail-box
    {
        padding: 5px;
    }

</style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
 
  </div>



<!-- product details start -->


<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2 style="color: #7b1717;">
          Product Details
        </h2>
      </div>
      <div class="row justify-content-center">

        

        <div class="col-md-8">
          <div class="box">
            
              <div class="div_center">
                <img width="300" src="/products/{{$data->image}}" alt="">
              </div>



              <div class="detail-box">
                <h6>Name : {{$data->title}}</h6>
                <h6>Price : 
                  <span>${{$data->price}}</span>
                </h6>
              </div>

              <div class="detail-box">
                <h6>Category : {{$data->category}}</h6>

                <h6>Available Quantity : 
                  <span>{{$data->quantity}}</span>
                </h6>
              </div>

              <div class="detail-box">
                

                
                  <p>{{$data->description}}</p>
                
              </div>
            

            

          </div>
        </div>

        


        
        
      </div>
      
    </div>
  </section>




<!-- product details end -->




   

  <!-- info section -->
@include('home.footer')

</body>

</html>