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
                  <li class="breadcrumb-item active">Property List</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-2">Property List</h5>
                  <p class="card-text">
                    Involves categorizing and managing various property listings to enhance the user experience and facilitate easier browsing and searching.
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="datatable table table-stripped" id="PropertyTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Category</th>
                          <th>Title</th>
                          <th>SQM</th>
                          <th>Type</th>
                          <th>Price</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="propertyBody">
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
    // Initialize DataTable
    var table = $('#PropertyTable').DataTable();

    // Fetch data from the PHP script
    function fetchData() {
      $.ajax({
        url: 'backend/property/fetch', // Adjust this URL to your actual fetching script
        method: 'GET',
        dataType: 'json',
        success: function(data) {
          // Clear existing table data
          table.clear();

          // Loop through the data and append it to the table
          data.forEach(function(item, index) {
            table.row.add([
              item.id,                 // Property ID
              item.category,              // Property Title
              item.title,              // Property Title
              item.sqm,                // Property Size (sqm)
              item.type,               // Property Type
              item.price,              // Property Price
              `
                <button class="btn btn-warning rounded-0 btn-sm edit-btn" data-id="${item.id}">Edit</button>
                <button class="btn btn-danger rounded-0 btn-sm delete-btn" data-id="${item.id}">Delete</button>
              `  // Edit and Delete Action Buttons
            ]);
          });

          // Redraw the table with the new data
          table.draw();
        },
        error: function(xhr, status, error) {
          console.log("Error fetching data: " + error);
        }
      });
    }

    // Fetch data on page load
    fetchData();

    // Edit Button Click
    $(document).on('click', '.edit-btn', function() {
      var propertyId = $(this).data('id');
      // Redirect to the edit page with the property ID
      window.location.href = 'edit_property.php?id=' + propertyId; // Adjust this URL to your edit page
    });

    // Delete Button Click
    $(document).on('click', '.delete-btn', function() {
      var propertyId = $(this).data('id');
      
      // Confirm before deleting
      if (confirm('Are you sure you want to delete this property?')) {
        // Send an AJAX request to delete the property
        $.ajax({
          url: 'backend/property/delete', // Adjust this to the correct path of your delete script
          method: 'POST',
          data: { id: propertyId },
          success: function(response) {
            if (response === 'success') {
              // If the deletion is successful, remove the row from the table
              table.row($(this).parents('tr')).remove().draw();
              toastr.success('Property deleted successfully!');
              fetchData();
            } else {
              toastr.error('Error deleting property.');
            }
          },
          error: function(xhr, status, error) {
            console.log("Error deleting property: " + error);
          }
        });
      }
    });

    // Assuming this function is called after a property is created (when the "Create Property" form is submitted)
    $('#propertyForm').submit(function(event) {
      event.preventDefault(); // Prevent form from submitting normally

      // Gather form data
      var formData = $(this).serialize();

      // Send an AJAX request to create the property
      $.ajax({
        url: 'backend/property/create', // Adjust to the path of your create property script
        method: 'POST',
        data: formData,
        success: function(response) {
          if (response === 'success') {
            toastr.success('Property created successfully!'); // Display success message
            fetchData(); // Reload the table data
          } else {
            toastr.error('Error creating property.'); // Display error message
          }
        },
        error: function(xhr, status, error) {
          console.log("Error creating property: " + error);
        }
      });
    });
  });
</script>



  </body>
</html>
