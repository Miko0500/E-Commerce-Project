<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">

.div_deg {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-top: 60px;
            flex-wrap: wrap;
            gap: 20px;
            padding: 10px;
        }

        h1 {
            color: #333;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        input[type='search'] {
            width: 500px;
            height: 50px;
            padding: 10px;
            border: 2px solid #333;
            border-radius: 8px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
        }

        /* Table Styling */
        .table-container {
            margin: 40px auto;
            max-width: 1200px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
        }

        .custom-table {
            width: 100%;
            border-collapse: collapse;
        }

        .custom-table thead th {
            background-color: #007bff;
            color: #ffffff;
            font-size: 1rem;
            font-weight: bold;
            padding: 15px;
            text-align: center;
        }

        .custom-table tbody td {
            padding: 12px;
            text-align: center;
            vertical-align: middle;
            font-size: 0.95rem;
            color: #333;
            background-color: #ffffff;
            border-bottom: 2px solid #ddd; /* Adds a bottom border */
        }

        .custom-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        /* Status Badge Styling */
        .status-badge {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: bold;
            color: #fff;
        }

        .status-badge.in-queue { background-color: #ffc107; }
        .status-badge.ongoing-service { background-color: #17a2b8; }
        .status-badge.finished { background-color: #28a745; }

        /* Button Styling */
        .btn {
            font-size: 0.85rem;
            padding: 6px 12px;
            border-radius: 8px;
            font-weight: bold;
            color: #ffffff;
            margin: 0 3px;
        }

        .btn-primary { background-color: #007bff; }
        .btn-primary:hover { background-color: #0056b3; }
        .btn-warning { background-color: #ffc107; color: #333; }
        .btn-warning:hover { background-color: #e0a800; }


    
        .average-rating {
    display: inline-flex;
    align-items: center;
    padding: 3px 8px; /* Smaller padding */
    border: 1px solid #FFD700; /* Reduced border thickness */
    background-color: rgba(255, 215, 0, 0.3); /* Slightly lighter background */
    color: #333; /* Dark text color for contrast */
    font-weight: bold;
    font-size: 1rem; /* Smaller font size */
    border-radius: 4px; /* Slightly smaller border radius */
    margin-top: 5px; /* Reduced top margin */
}


.star-icon {
    color: #FF9800; /* Orange color for the star */
    font-size: 1.2rem;
    margin-right: 5px;
}

.rating-value {
    color: #333; /* Dark text color */
}

.no-rating {
    background-color: #f0f0f0; /* Light gray for no rating */
    color: #888;
    padding: 3px 6px; /* Smaller padding */
    font-weight: normal;
    font-size: 0.85rem; /* Smaller font size */
    border-radius: 3px; /* Optional: slightly rounded corners */
}



/* .btn-warning {
            margin-top: 10px;
    background-color: #007BFF; 
    color: #ffffff;
    border: none; 
    padding: 6px 12px; 
    border-radius: 5px; 
    font-size: 13px; 
    font-weight: bold;
    text-transform: uppercase; 
    letter-spacing: 0.5px;
    box-shadow: 0px 3px 5px rgba(0, 0, 0, 0.1); 
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 50px;
    
        }

        .btn-warning:hover {
            background-color: #0056b3; 
    transform: translateY(-1px); 
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.15); 
        } */


    /* Modal styling */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        overflow-y: auto; /* Allow scrolling on the modal background */
    }

    .modal-content {
        background-color: #fff;
        margin: 5% auto;
        padding: 20px;
        border-radius: 8px;
        width: 80%;
        max-width: 600px;
        max-height: 80vh; /* Set a maximum height */
        overflow-y: auto; /* Enable scrolling within the modal content */
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    }

    /* Fixed header inside the modal */
    .modal-header {
    position: sticky;
    top: 0;
    width: 100%;
    color: #000; /* White text */
    background-color: #fff; /* Black background */
    padding: 20px;
    border: 1px solid #ddd;
    z-index: 10;
    text-align: left;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-sizing: border-box; /* Ensures padding doesn't affect width */
}

.modal-header h2 {
    margin: 0;
    font-size: 1.5rem;
    font-weight: bold;
    color: #000; /* White color for text */
    flex-grow: 1; /* Ensures the h2 takes up remaining space */
}

.close {
    font-size: 24px;
    cursor: pointer;
    color: #fff; /* White color for close button */
    font-weight: bold;
}


    .close:hover {
        color: black;
    }

    .review {
        margin-bottom: 15px;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .review .rating {
        font-size: 1.2rem;
        color: #FFD700;
    }

    .review .comment {
        font-size: 1rem;
        color: #333;
    }

    .review .user-name {
        font-weight: bold;
        color: #007bff;
    }

    .review .date {
        font-size: 0.9rem;
        color: #888;
    }
    body.no-scroll {
        overflow: hidden;
    }
    .btn-warning {
    margin-top: 10px;
    background-color: #007BFF; /* Accent color */
    color: #ffffff; /* White text */
    border: none; /* Remove border */
    padding: 2px 6px; /* Even smaller padding */
    border-radius: 3px; /* Smaller rounded corners */
    font-size: 0.75rem; /* Smaller font size */
    font-weight: bold;
    text-transform: uppercase; /* Uppercase text */
    letter-spacing: 0.5px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 35px; /* Smaller height */
}

.btn-warning:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: translateY(-1px); /* Gentle lift effect */
    box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.15); /* Slightly deeper shadow */
}



        .button-group {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 5px; /* Space between buttons */
    }

    .button-group .btn {
        width: 100%; /* Full width of the column */
        padding: 4px 8px; /* Adjust padding for smaller buttons */
        font-size: 0.85rem; /* Smaller font size */
    }

    /* Ensure toastr notifications have the correct text color */
.toast-success {
    background-color: #28a745 !important; /* Green background for success */
    color: #fff !important; /* White text color */
}

.toast-error {
    background-color: #dc3545 !important; /* Red background for error */
    color: #fff !important; /* White text color */
}

.toast-info {
    background-color: #17a2b8 !important; /* Blue background for info */
    color: #fff !important; /* White text color */
}

.toast-warning {
    background-color: #ffc107 !important; /* Yellow background for warning */
    color: #333 !important; /* Dark text color */
}

    </style>
  </head>
  <body>

    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content">
  <div class="page-header">
    <h1 style="margin-bottom: 30px;">All Services</h1>
    <div class="container-fluid">
      <form action="{{ url('product_search') }}" method="get">
        @csrf
        <input type="search" name="search" placeholder="Search product">
        <input type="submit" class="btn btn-secondary" value="Search">
      </form>

      <div class="table-container">
        <table class="custom-table">
          <thead>
            <tr>
              <th>Service Image</th>
              <th>Title</th>
              <th>Description</th>
              <th>Category</th>
              <th>Price</th>
              <!-- <th>Quantity</th> -->
              <th>Average Rating</th>
              <th>View Ratings</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($product as $products)
            <tr>
              <td><img src="{{ asset('products/' . $products->image) }}" alt="{{ $products->title }}" class="img-fluid" style="max-width: 100px; border-radius: 5px;"></td>
              <td>{{ $products->title }}</td>
              <td>{!! Str::limit($products->description, 50) !!}</td>
              <td>{{ $products->category }}</td>
              <td>${{ $products->price }}</td>
              <!-- <td>{{ $products->quantity }}</td> -->
              <td>
                @if ($products->average_rating !== null)
                    <span class="average-rating">{{ number_format($products->average_rating, 1) }} <span class="star-icon">★</span></span>
                @else
                    <span class="average-rating no-rating">No ratings yet</span>
                @endif
              </td>
              <td><!-- Button to trigger the modal -->
              <button class="btn-warning openModalBtn" data-toggle="modal" data-target="#reviewsModal{{$products->id}}">Ratings & Reviews</button></td>
              <td>
              <div class="button-group">
              <button class="btn btn-success" onclick="checkEditCondition(event, {{ $products->id }})" href="{{ url('update_product', $products->id) }}">Edit</button>
                <button class="btn btn-danger" onclick="confirmation(event, {{ $products->id }})" href="{{ url('delete_product', $products->id) }}">Delete</button>
</div>

            </td>
            </tr>

             <!-- Ratings & Reviews Modal -->
<div id="reviewsModal{{ $products->id }}" class="modal">
    <div style="background-color: #fff;" class="modal-content">
        <div class="modal-header">
            <h2>Ratings & Reviews for {{$products->title}}</h2>
            
        </div>

                    <!-- Loop over ratings for the product -->
        @foreach ($products->ratings as $rating)
            <div class="review">
                <div class="user-name">{{ $rating->order->user->name }}</div>
                <div class="rating">
                    @for ($i = 0; $i < $rating->rating; $i++) &#9733; @endfor
                    @for ($i = $rating->rating; $i < 5; $i++) &#9734; @endfor
                </div>
                <div class="comment">{{ $rating->comment }}</div>
                <div class="date">{{ $rating->created_at->format('F j, Y') }}</div>
            </div>
        @endforeach
        @if ($products->ratings->isEmpty())
            <p>No reviews yet for this service.</p>
        @endif
    </div>
</div>
@endforeach

</div>
          </tbody>
        </table>

        <div style="justify-content: center; margin-top: 50px;" class="pagination">
            {{ $product->onEachSide(1)->links() }}
        </div>

      </div>

    </div>
  </div>
</div>

<!-- JavaScript for Modal -->
<script>
    document.querySelectorAll('.openModalBtn').forEach(function(button) {
        button.addEventListener('click', function() {
            var modalId = 'reviewsModal' + button.getAttribute('data-id'); // Dynamically get modal ID
            var modal = document.getElementById(modalId);

            // Show the modal
            modal.style.display = 'block';
            document.body.classList.add('no-scroll');
        });
    });

    // Modal close logic
    document.querySelectorAll('.close').forEach(function(closeButton) {
        closeButton.addEventListener('click', function() {
            var modalId = closeButton.getAttribute('data-modal-id');
            var modal = document.getElementById(modalId);

            // Hide the modal
            modal.style.display = 'none';
            document.body.classList.remove('no-scroll');
        });
    });

    // Close the modal if clicked outside the modal content
    window.onclick = function(event) {
        document.querySelectorAll('.modal').forEach(function(modal) {
            if (event.target === modal) {
                modal.style.display = 'none';
                document.body.classList.remove('no-scroll');
            }
        });
    };
</script>



    

    <!-- JavaScript for confirmation dialog and edit condition -->
<script type="text/javascript">
    // Confirmation for Deletion
    function confirmation(ev, productId) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');

        // AJAX request to check if the product can be deleted
        fetch(`/checkProductUsage/${productId}`)
            .then(response => response.json())
            .then(data => {
                if (data.canDelete) {
                    swal({
                        title: "Are You Sure You Want To Delete This Service?",
                        text: "This Delete Will Be Permanent",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            window.location.href = urlToRedirect; // Redirect after confirmation
                        }
                    });
                } else {
                    swal({
                        title: "Cannot Delete Service",
                        text: "This service is currently being used. Please complete all ongoing orders before deleting.",
                        icon: "error",
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swal({
                    title: "Error",
                    text: "An error occurred while checking the service. Please try again.",
                    icon: "error",
                });
            });
    }

    // Check Edit Condition
    function checkEditCondition(event, productId) {
        event.preventDefault();
        const urlToRedirect = event.currentTarget.getAttribute('href');

        // AJAX call to check if the product is in use
        fetch(`/checkProductUsage/${productId}`)
            .then(response => response.json())
            .then(data => {
                if (data.canDelete) {
                    // If not in use, proceed to edit page
                    window.location.href = urlToRedirect;
                } else {
                    // Show error if the product is in use
                    swal({
                        title: "Cannot Edit Product",
                        text: "This product is currently in use and cannot be edited.",
                        icon: "error",
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                swal({
                    title: "Error",
                    text: "An error occurred while checking the product status. Please try again.",
                    icon: "error",
                });
            });
    }
</script>






<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
