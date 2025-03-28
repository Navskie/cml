<!DOCTYPE html>
<html lang="en">
  <?php include_once 'include/head.php' ?>

  <body>
    <div class="main-wrapper">
      <?php include_once 'include/navbar.php' ?>
      <?php include_once 'include/sidebar.php' ?>

      <div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col-sm-12">
                <h3 class="page-title">Welcome <?php echo $username ?>!</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Category</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-md-4">
              <div class="card bg-comman w-100">
                <div class="card-header">
                  <h5 class="card-title mb-2">Manage Category</h5>
                </div>
                <div class="card-body">
                  <form id="categoryForm">
                    <input type="hidden" id="category_id">
                    <div class="form-group mb-3">
                      <label for="category_name">Category Name</label>
                      <input type="text" name="category" id="category" class="form-control rounded-0" autocomplete="OFF" placeholder="Category Name">
                    </div>

                    <div class="text-end">
                      <button type="submit" class="btn btn-primary rounded-0" id="submitBtn">Create Category</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-12 col-md-8">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-2">Category List</h5>
                  <p class="card-text">
                    Involves categorizing and managing various property listings to enhance the user experience and facilitate easier browsing and searching.
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="datatable table table-stripped" id="categoryTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Category Name</th>
                          <th>Date Encoded</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="categoryBody">
                        <!-- Data will be loaded here -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <?php include_once 'include/footer.php' ?>

    <script>
      $(document).ready(function() {
        // Function to load categories into the table
        function loadCategories() {
          $.ajax({
            url: 'backend/category/data', // PHP script to fetch categories
            type: 'GET',
            success: function(response) {
              try {
                // Check if the response is valid JSON
                let data = JSON.parse(response);
                if (data && data.data) {
                  // Initialize DataTable
                  $('#categoryTable').DataTable({
                    "destroy": true, // Destroy previous table instance before creating a new one
                    "processing": true,  // Enable processing indicator
                    "serverSide": false, // Disable server-side processing
                    "data": data.data, // Data source for the DataTable
                    "columns": [
                      { "data": "id" },             // Map 'id' to the first column
                      { "data": "category_name" },  // Map 'category_name' to the second column
                      { "data": "date_encoded" },   // Map 'date_encoded' to the third column
                      {                          // Action buttons column
                        "data": null,              // This column has no direct data
                        "defaultContent": ""       // Set default content as empty to be overwritten
                      }
                    ],
                    "columnDefs": [{
                      "targets": 3, // The action column
                      "render": function(data, type, row) {
                        // Render action buttons with dynamic data-id attribute
                        return '<button class="btn btn-warning btn-sm rounded-0 editBtn" data-id="' + row.id + '">Edit</button>' +
                              '<button class="btn btn-danger btn-sm rounded-0 deleteBtn" data-id="' + row.id + '">Delete</button>';
                      }
                    }]
                  });

                } else {
                  toastr.error('Invalid data structure received.');
                }
              } catch (e) {
                toastr.error('Invalid JSON response received.');
                console.error(e);
              }
            },
            error: function() {
              toastr.error('There was an error connecting to the server');
            }
          });
        }

        loadCategories();

        $('#categoryForm').on('submit', function(e) {
          e.preventDefault();

          let formData = $(this).serialize(); // Serialize the form data

          // Get the category_id value
          let categoryId = $('#category_id').val();

          // Manually append category_id to formData if it's not already included
          formData += '&category_id=' + categoryId;

          let url = categoryId ? 'backend/category/edit' : 'backend/category/add';

          $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function(response) {
              console.log('Response from server:', response);
              if (response === 'success') {
                toastr.success('Category has been successfully processed');
                loadCategories();  // Reload categories to reflect changes
                $('#categoryForm')[0].reset();
                $('#category_id').val('');
                $('#submitBtn').text('Create Category');
              } else {
                toastr.error('There was an error processing the request');
              }
            },
            error: function(xhr, status, error) {
              toastr.error('There was an error connecting to the server');
              console.error('Error details: ', error);
            }
          });
        });

        // Edit Category
        $(document).on('click', '.editBtn', function() {
          let category_id = $(this).data('id');
          $.ajax({
            url: 'backend/category/get', // PHP script to fetch category data
            type: 'GET',
            data: { id: category_id },
            success: function(response) {             
              // Check if category data is returned successfully
              if (response && response.category_id) {
                // Update the form with the category data
                $('#category').val(response.category_name);
                $('#category_id').val(response.category_id);
                $('#submitBtn').text('Update Category');
              } else {
                toastr.error('Invalid category data received.');
              }
            },
            error: function(xhr, status, error) {
              toastr.error('Error fetching category data.');
              console.error('Error details:', error);
            }
          });
        });

        // Delete Category
        $(document).on('click', '.deleteBtn', function() {
          let category_id = $(this).data('id');
          if (confirm('Are you sure you want to delete this category?')) {
            $.ajax({
              url: 'backend/category/delete.php',
              type: 'POST',
              data: { category_id: category_id },
              success: function(response) {
                if (response === 'success') {
                  toastr.success('Category deleted successfully');
                  loadCategories();
                } else {
                  toastr.error('There was an error deleting the category');
                }
              },
              error: function(xhr, status, error) {
                toastr.error('There was an error deleting the category');
                console.error('Error details: ', error);
              }
            });
          }
        });
      });
    </script>

  </body>
</html>
