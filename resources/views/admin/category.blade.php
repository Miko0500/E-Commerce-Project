<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style type="text/css">
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .page-content {
            padding: 20px;
        }
        h1 {
            color: #333;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }
        .category-card {
            background: linear-gradient(135deg, #fafafa, #eaeaea);
            color: #333;
            width: 320px;
            min-height: 200px;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid #333;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            font-weight: 500;
        }
        .category-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25);
        }
        .category-name {
            font-size: 22px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
        }
        .card-actions {
            display: flex;
            gap: 15px;
            margin-top: 60px;
        }
        a.btn, button.btn {
            text-decoration: none;
            padding: 12px 25px;
            color: #fff;
            
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
            border: none;
        }
        a.btn:hover, button.btn:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h1 style="color: white;">Add Category</h1>
                <div class="div_deg">
                    <form id="categoryForm" method="post" action="{{ url('add_category') }}">
                        @csrf
                        <div>
                            <input type="text" name="category" id="categoryInput" placeholder="Enter category name">
                            <input class="btn btn-primary" style="background-color: #0056b3; border-color: #007bff;" type="submit" value="Add Category">
                        </div>
                    </form>
                </div>

                <div class="card-container" id="categoryList">
                    @foreach($data as $category)
                    <div class="category-card" id="category-{{ $category->id }}">
                        <div class="category-name">{{ $category->category_name }}</div>
                        <div class="card-actions">
                            <button class="btn btn-success" onclick="openEditModal('{{ $category->id }}', '{{ $category->category_name }}')">Edit</button>
                            <button class="btn btn-danger" onclick="deleteCategory('{{ $category->id }}')">Delete</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editCategoryForm" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editCategoryName">Category Name</label>
                            <input type="text" class="form-control" id="editCategoryName" name="category" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    // Open Edit Modal and Set Action
    function openEditModal(id, name) {
        $('#editCategoryModal').modal('show');
        $('#editCategoryForm').attr('action', '/update_category/' + id);
        $('#editCategoryName').val(name);
    }

    // Handle the update category form submission via AJAX
    $('#editCategoryForm').on('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        const actionUrl = $(this).attr('action');
        const formData = $(this).serialize();

        $.ajax({
            url: actionUrl,
            type: "POST",
            data: formData,
            success: function(response) {
                // Update the category name in the DOM
                $('#category-' + response.category.id + ' .category-name').text(response.category.category_name);

                // Close the modal
                $('#editCategoryModal').modal('hide');

                // Show success message
                swal("Category updated successfully!", {
                    icon: "success",
                });
            },
            error: function(xhr) {
                let errorMessage = "Error updating category.";
                if (xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON.errors.category) {
                    errorMessage = xhr.responseJSON.errors.category[0];
                }
                swal(errorMessage, {
                    icon: "error",
                });
            }
        });
    });

    // Delete function with AJAX
    function deleteCategory(id) {
        swal({
            title: "Are you sure you want to delete this category?",
            text: "This action cannot be undone!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '/delete_category/' + id,
                    type: 'DELETE', // Use DELETE method
                    data: {
                        _token: '{{ csrf_token() }}' // CSRF token for Laravel
                    },
                    success: function(response) {
                        $('#category-' + id).remove(); // Remove the category card from DOM
                        swal("Category deleted successfully!", {
                            icon: "success",
                        });
                    },
                    error: function() {
                        swal("Error deleting category.", {
                            icon: "error",
                        });
                    }
                });
            }
        });
    }
</script>


<script type="text/javascript">
    // AJAX for submitting the add category form
    $(document).ready(function() {
        $('#categoryForm').on('submit', function(event) {
            event.preventDefault(); // Prevent form from submitting normally

            $.ajax({
                url: "{{ url('add_category') }}",
                type: "POST",
                data: $(this).serialize(), // Send form data with CSRF token
                success: function(response) {
                    // Clear input field
                    $('#categoryInput').val('');

                    // Create new category card HTML and append it to the list
                    const newCategoryCard = `
                        <div class="category-card" id="category-${response.category.id}">
                            <div class="category-name">${response.category.category_name}</div>
                            <div class="card-actions">
                                <button class="btn btn-success" onclick="openEditModal('${response.category.id}', '${response.category.category_name}')">Edit</button>
                                <button class="btn btn-danger" onclick="deleteCategory('${response.category.id}')">Delete</button>
                            </div>
                        </div>
                    `;
                    $('#categoryList').append(newCategoryCard);

                    // Show success message
                    swal("Category added successfully!", {
                        icon: "success",
                    });
                },
                error: function(xhr) {
                    let errorMessage = "Error adding category.";
                    if (xhr.responseJSON && xhr.responseJSON.errors && xhr.responseJSON.errors.category) {
                        errorMessage = xhr.responseJSON.errors.category[0];
                    }
                    swal(errorMessage, {
                        icon: "error",
                    });
                }
            });
        });
    });
</script>

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
