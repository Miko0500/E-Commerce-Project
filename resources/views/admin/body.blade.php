<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
  <style type="text/css">
    /* General Card Styling */
    .card-hover-effect {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-radius: 8px;
      border: 1px solid #ddd; /* Lighter border */
      overflow: hidden;
      background-color: #fff;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-hover-effect:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2); /* Slightly increased shadow */
    }

    .card-body {
      padding: 15px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      color: #333;
    }

    .card-body h5 {
      font-size: 1.1em;
      color: #333;
      font-weight: bold;
    }

    .card-body .number {
      font-size: 2em;
      font-weight: bold;
      color: #000;
    }

    .card-body .btn {
      padding: 8px 15px;
      border-radius: 20px;
      background-color: #3498db;
      color: #fff;
      font-weight: bold;
      transition: background-color 0.3s ease;
      text-align: center;
      text-decoration: none;
    }

    .card-body .btn:hover {
      background-color: #2980b9;
    }

    .icon {
      font-size: 3rem; /* Increase icon size for better visibility */
      color: #3498db;
      margin-top: 10px;
    }

    /* Card layout */
    .vehicle-list {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
    }

    .vehicle-item {
      width: 48%;
      border: 1px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
      background-color: #fff;
      transition: transform 0.3s ease;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .vehicle-item:hover {
      transform: translateY(-4px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .vehicle-item .vehicle-image img {
      width: 100%;
      height: auto;
    }

    .vehicle-item .vehicle-details {
      padding: 15px;
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
      .col-lg-6, .col-md-6 {
        width: 100%; /* Full-width on mobile devices */
      }
      .vehicle-item {
        width: 100%; /* Full-width on smaller screens */
      }
    }
  </style>
</head>

<h1 style="color: #333; margin-bottom: 15px; font-size: 1.8em;">Dashboard</h1>
<section class="no-padding-top no-padding-bottom">
  <div class="container-fluid">
    <div class="row">
      <!-- Total Registered Accounts -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Registered Accounts</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-1">{{$user}}</div>
            </div>
            <i class="bi bi-people-fill icon"></i>
          </div>
        </div>
      </div>

      <!-- Total Services in System -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Services in System</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-2">{{$product}}</div>
            </div>
            <i class="bi bi-box icon"></i>
          </div>
        </div>
      </div>

      <!-- Total Bookings -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Bookings</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-1">{{$order}}</div>
            </div>
            <i class="bi bi-calendar2-check icon"></i>
          </div>
        </div>
      </div>

      <!-- Total Finished Services -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Total Finished Services</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-2">{{$delivered}}</div>
            </div>
            <i class="bi bi-check2 icon"></i>
          </div>
        </div>
      </div>

      <!-- Customers Who Booked Today -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Customers Who Booked Today</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-1">{{$todaysBookings}}</div>
            </div>
            <i class="bi bi-calendar2-check icon"></i>
          </div>
        </div>
      </div>

      <!-- Services Availed Today -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Services Availed Today</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-2">{{$todaysServices}}</div>
            </div>
            <i class="bi bi-calendar2-plus icon"></i>
          </div>
        </div>
      </div>

      <!-- Services Finished Today -->
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card card-hover-effect">
          <div class="card-body">
            <h5 class="card-title">Services Finished Today</h5>
            <div class="progress-details d-flex align-items-end justify-content-between">
              <div class="number dashtext-1">{{$finishedServicesToday}}</div>
            </div>
            <i class="bi bi-calendar2-check icon"></i>
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
