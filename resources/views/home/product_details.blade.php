<!DOCTYPE html>
<html>

<head>
  


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
      color: white;
        padding: 5px;
    }
    .navbar-brands{
    padding-top: -1000px;
    font-size: 30px;
    font-weight: 900;
    margin: 0;
    letter-spacing: 3px;
    text-transform: uppercase;
    background: linear-gradient(90deg, #00bfff, #1e90ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-shadow: 0 0 15px rgba(0, 191, 255, 0.7);
  
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
    <div  class="heading_container heading_center">
      <a class="navbar-brands" href="" disabled>
      <span style="color: #000;">SERVICE DETAILS</span>
    </a>
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

                
              </div>

              <div class="detail-box">
                

                
                  <p>{{$data->description}}</p>
                
              </div>
            
              <div class="detail-box">
                            <a class="btn btn-primary" href="{{ url('add_cart', $data->id) }}">
                                Add Service
                            </a>
                        </div>
            

          </div>
        </div>

        


        
        
      </div>
      
      
      
    </div>
  </section>

  @include('home.css')


<!-- product details end -->




   

  <!-- info section -->
@include('home.footer')

</body>

</html>