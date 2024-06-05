<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <style type="text/css">
    .card-hover-effect {
      transition: transform 0.3s ease-in-out;
      border-radius: 15px;
      border: none;
      overflow: hidden;
    }

    .card-hover-effect:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card-body {
      padding: 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #404040;
    }

    .icon {
      font-size: 2.5rem; /* Adjust the size of the icon as needed */
    }

    .number {
      font-size: 2rem; /* Adjust the size of the number count */
      font-weight: bold; /* Add bold font weight for emphasis */
    }
    .card-title
    {
      color: #F88379;
    }
  </style>
</head>

<h1 style="color: #F88379; margin-bottom: 10px;">Dashboard</h1>
</div>
</div>
<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Customers</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-1">{{$user}}</div>
            </div>
            <i style="color: #F88379;" class="bi bi-people-fill icon"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Products</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-2">{{$product}}</div>
            </div>
            <i style="color: #F88379;" class="bi bi-box icon"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Orders</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-3">{{$order}}</div>
            </div>
            <i style="color: #F88379;" class="bi bi-cart3 icon"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Delivered Products</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-4">{{$delivered}}</div>
            </div>
            <i style="color: #F88379;" class="bi bi-check2 icon"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="footer__block block no-margin-bottom">
    <div class="container-fluid text-center">
      <p class="no-margin-bottom">2024 &copy; Crochet With Me</a>.</p>
    </div>
  </div>
</footer>
