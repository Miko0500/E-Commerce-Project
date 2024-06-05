<style>
  .product-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: 3px solid #7b1717;
    border-radius: 10px;
    overflow: hidden;
    
  }

  .product-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px red;
    border: 3px solid pink;

  }

  .product-card .img-box img {
    width: 100%;
    border-bottom: 1px solid #ddd;
  }

  .product-card .detail-box {
    padding: 10px;
    text-align: center;
  }

  .product-card .detail-box h6 {
    margin: 10px 0;
  }

  .product-card .detail-box span {
    color: #ff5722;
    font-weight: bold;
  }
</style>

<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2 style="color: #7b1717;">Latest Products</h2>
    </div>
    <div class="row">
      @foreach($product as $products)
      <div class="col-sm-6 col-md-4 col-lg-3">
        <a href="{{url('product_details',$products->id)}}">
        <div class="box product-card">
          <div class="img-box">
            <img src="products/{{$products->image}}" alt="">
          </div>
          <div class="detail-box">
            <h6>{!!Str::limit($products->title,10)!!}</h6>
            <h6>Price : 
              <span style="color:white">${{$products->price}}</span>
            </h6>
          </div>
          <div style="padding: 15px;">
            
            <a class="btn btn-success" href="{{url('add_cart',$products->id)}}">Add To Cart</a>
          </div>
        </div>
        </a>
      </div>
      @endforeach
    </div>
  </div>
  
</section>
<div class="text-center"> <!-- Wrap the button inside a div with text-center class -->
    <a class="btn btn-danger" href="{{url('/product')}}">View All Products</a>
</div>
