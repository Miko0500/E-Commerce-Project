<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <style type="text/css">
   .card-hover-effect {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border-radius: 10px;
    border: 2px solid #000; /* Solid black border */
    overflow: hidden;
    background-color: #fff; /* White background for contrast */
}

.card-hover-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* Soft shadow on hover */
}

.card-body {
    border-top: 2px solid #000; /* Consistent black border for style */
    padding: 20px 25px; /* Slightly adjusted padding */
    display: flex;
    flex-direction: column;
    gap: 10px;
    background-color: #f9f9f9; /* Subtle light gray background */
    color: #333; /* Dark text color for contrast */
}

.card-body h5, .card-body p {
    margin: 0;
    color: #000; /* Ensures text remains black */
    font-weight: 500;
}

.card-body .price {
    font-size: 1.2em;
    font-weight: bold;
    color: #000; /* Bold black for price */
}

.card-body .btn {
    padding: 10px 20px;
    border-radius: 20px;
    background-color: #000;
    color: #fff;
    font-weight: bold;
    transition: background-color 0.3s ease;
    text-align: center;
    text-decoration: none;
}

.card-body .btn:hover {
    background-color: #333; /* Darker shade on hover */
    color: #fff; /* Maintains contrast */
}


    .icon {
      font-size: 2.5rem; /* Adjust the size of the icon as needed */
    }

    .number {
      font-size: 2rem; /* Adjust the size of the number count */
      font-weight: bold; /* Add bold font weight for emphasis */
    }
    .card-title {
      color: #000;
    }

    
  </style>
</head>

<h1 style="color: #000; margin-bottom: 10px;">Dashboard</h1>
<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Registered Accounts</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-1">{{$user}}</div>
            </div>
            <i style="color: #000;" class="bi bi-people-fill icon"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Services in System</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-2">{{$product}}</div>
            </div>
            <i style="color: #000;" class="bi bi-box icon"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Bookings</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-1">{{$order}}</div>
            </div>
            <i style="color: #000;" class="bi bi-calendar2-check icon"></i>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Finished Services</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-2">{{$delivered}}</div>
            </div>
            <i style="color: #000;" class="bi bi-check2 icon"></i>
          </div>
        </div>
      </div>

      <!-- New Card for Customers Who Booked Today -->
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Customers Who Booked Today</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-1">{{$todaysBookings}}</div>
            </div>
            <i style="color: #000;" class="bi bi-calendar2-check icon"></i>
          </div>
        </div>
      </div>

      <!-- New Card for Services Availed Today -->
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Services Availed Today</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-2">{{$todaysServices}}</div>
            </div>
            <i style="color: #000;" class="bi bi-calendar2-plus icon"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Services Finished Today</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-1">{{$finishedServicesToday}}</div>
            </div>
            <i style="color: #000;" class="bi bi-calendar2-check icon"></i>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<footer class="footer">
  <div class="footer__block block no-margin-bottom">
    <div class="container-fluid text-center">
      <p class="no-margin-bottom">2024 &copy; Shee Auto Polish & Ceramic Coating.</p>
    </div>
  </div>
</footer>
<script src="path/to/chartjs/dist/chart.umd.js"></script>
<!doctype html>
<html lang="en">
  <head>
    <title>Chart.js example</title>
  </head>
  <body>
    <!-- <div style="width: 500px;"><canvas id="dimensions"></canvas></div><br/> -->
    <div style="width: 800px;"><canvas id="acquisitions"></canvas></div>

    <!-- <script type="module" src="dimensions.js"></script> -->
    <script type="module" src="acquisitions.js"></script>
  </body>
</html>