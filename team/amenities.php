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
                  <h5 class="card-title mb-2">Manage Amenities</h5>
                </div>
                <div class="card-body">
                  <form id="amenitiesForm">
                    <input type="hidden" id="amenities_id">
                    <div class="form-group mb-3">
                      <label for="amenities">Amenities Name</label>
                      <input type="text" name="amenities" id="amenities" class="form-control rounded-0" autocomplete="OFF" placeholder="Amenities Name">
                    </div>

                    <div class="form-group mb-3">
                      <label for="file">File</label>
                      <input type="file" name="file" id="file" class="form-control rounded-0">
                      <div id="filePreview"></div> <!-- Show file preview here -->
                    </div>

                    <div class="text-end">
                      <button type="submit" class="btn btn-primary rounded-0" id="submitBtn">Create Amenities</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-12 col-md-8">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title mb-2">Amenities List</h5>
                  <p class="card-text">
                    Organizing and categorizing property amenities to improve user experience.
                  </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="datatable table table-stripped" id="amenitiesTable">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Amenities Name</th>
                          <th>File Name</th>
                          <th>Date Encoded</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody id="amenitiesBody">
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
        // Handle form submission (Add and Edit)
        $("#amenitiesForm").submit(function(e) {
          e.preventDefault(); // Prevent the default form submission

          var formData = new FormData(this); // Collect form data
          var amenitiesId = $("#amenities_id").val(); // Get amenities ID from the hidden input field

          // If amenitiesId is available, append it to the form data
          formData.append("amenities_id", amenitiesId);

          var actionUrl = amenitiesId ? "backend/amenities/edit" : "backend/amenities/add"; // Check if we're editing or adding

          $.ajax({
            type: "POST", // POST request
            url: actionUrl, // URL to send the request to
            data: formData, // The form data to send
            contentType: false, // Do not set content type (important for file uploads)
            processData: false, // Do not process the data (important for file uploads)
            dataType: "json", // Expect JSON response
            success: function(response) {
              // Check if the response contains 'success' and if it is true
              if (response && response.success) {
                toastr.success(response.message); // Display the success message from backend directly
                loadAmenities(); // Reload the amenities list
                resetForm(); // Reset the form fields
              } else {
                var errorMessage = response.message || 'An unexpected error occurred.';
                toastr.error('Failed to ' + (amenitiesId ? 'update' : 'add') + ' amenity. Error: ' + errorMessage);
              }
            },
            error: function(xhr, status, error) {
              toastr.error('An error occurred while ' + (amenitiesId ? 'updating' : 'adding') + ' the amenity.');
              console.log(error); // Log the actual error for debugging
            }
          });
        });

        function loadAmenities() {
          $.ajax({
            url: 'backend/amenities/data', // Correct URL to fetch data
            type: 'GET',
            success: function(response) {

              // Check if the response is in JSON format
              if (typeof response === 'string') {
                try {
                  response = JSON.parse(response); // Try parsing the response if it's a string
                } catch (e) {
                  console.error("Error parsing response:", e);
                  toastr.error('Failed to parse the response from the server');
                  return; // Exit if the response can't be parsed
                }
              }

              // Check if the response is an array and contains valid data
              if (Array.isArray(response) && response.length > 0) {
                // Check if each object in the array contains the required fields
                const isValid = response.every(item => item.id && item.amenities_name && item.file_name && item.created_at);
                if (isValid) {

                  // Check if DataTable exists and destroy it before reinitializing
                  if ($.fn.dataTable.isDataTable('#amenitiesTable')) {
                    $('#amenitiesTable').DataTable().clear().destroy();
                  }

                  // Initialize DataTable with correct data
                  $('#amenitiesTable').DataTable({
                    "processing": true, // Show processing indicator
                    "serverSide": false, // No server-side processing
                    "data": response, // Data for the table
                    "columns": [
                      { "data": "id", "title": "ID" },               // Column for 'id'
                      { "data": "amenities_name", "title": "Amenity Name" },  // Column for 'amenities_name'
                      { "data": "file_name", "title": "File Name" },      // Column for 'file_name'
                      { "data": "created_at", "title": "Created At" },     // Column for 'created_at'
                      {
                        "data": null,
                        "title": "Actions", // Column for Edit and Delete buttons
                        "render": function(data, type, row) {
                          return `
                            <button class="btn btn-warning btn-sm rounded-0 editBtn" 
                                    data-id="${row.id}" 
                                    data-name="${row.amenities_name}" 
                                    data-file="${row.file_name}">Edit</button>
                            <button class="btn btn-danger btn-sm rounded-0 deleteBtn" 
                                    data-id="${row.id}" 
                                    data-file="${row.file_name}">Delete</button>
                          `;
                        }
                      }
                    ]
                  });
                } else {
                  // If data doesn't match the expected format
                  console.error('Invalid data structure:', response);
                  toastr.error('Received data has missing or invalid fields.');
                }
              } else {
                // If the response is not an array or is empty
                console.error('No valid data received, response is empty or not an array');
                toastr.error('No amenities data found or data is empty.');
              }
            },
            error: function(xhr, status, error) {
              // Log any AJAX errors
              console.error('Error in AJAX request:', error);
              toastr.error('There was an error connecting to the server');
            }
          });
        }

        // Handle the Edit button click event
        $(document).on('click', '.editBtn', function() {
          var amenitiesId = $(this).data('id');
          var amenitiesName = $(this).data('name');
          var fileName = $(this).data('file');

          // Populate the form with the existing values for editing
          $("#amenities_id").val(amenitiesId);
          $("#amenities").val(amenitiesName);
          // Note: file input can't have a default value, so you'll need to handle it differently if you want to show the current file

          // Change the submit button text to "Update Amenities"
          $("#submitBtn").text("Update Amenities");
        });

        // Handle the Delete button click event
        $(document).on('click', '.deleteBtn', function() {
          var amenitiesId = $(this).data('id');
          var fileName = $(this).data('file');

          // Show a confirmation prompt before deleting
          if (confirm("Are you sure you want to delete this amenity?")) {
            $.ajax({
              type: "POST",
              url: "backend/amenities/delete", // URL to delete the amenity
              data: { id: amenitiesId, file: fileName },
              dataType: "json", // Expect JSON response
              success: function(response) {
                // Check if the response contains 'success' and if it is true
                if (response && response.success) {
                  toastr.success(response.message || 'Amenity deleted successfully!'); // Display the success message from backend
                  loadAmenities(); // Reload the amenities list
                } else {
                  var errorMessage = response.message || 'An unexpected error occurred while deleting the amenity.';
                  toastr.error('Failed to delete amenity. Error: ' + errorMessage);
                }
              },
              error: function(xhr, status, error) {
                toastr.error('An error occurred while deleting the amenity.');
                console.log(error); // Log the actual error for debugging
              }
            });
          }
        });

        // Reset the form fields after submission
        function resetForm() {
          $("#amenitiesForm")[0].reset(); // Reset form elements
          $("#submitBtn").text("Create Amenities"); // Change the button text back to "Create"
          $("#amenities_id").val(''); // Clear the hidden ID field
        }

        loadAmenities(); // Load amenities list on page load
      });
    </script>
  </body>
</html>
