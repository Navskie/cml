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
                  <li class="breadcrumb-item active">Property</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
              <div class="card bg-comman w-100">
                <div class="card-header">
                  <h5 class="card-title mb-2">Manage Properties</h5>
                </div>
                <div class="card-body">
                  <form id="propertyForm">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="category_name">Property Name</label>
                          <input type="text" name="category_name" id="category_name" class="form-control rounded-0" autocomplete="OFF" placeholder="Studio Type">
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="price">Price</label>
                          <input type="text" name="price" id="price" class="form-control rounded-0" autocomplete="OFF" placeholder="Php 3M - 6M">
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="size">Size</label>
                          <input type="text" name="size" id="size" class="form-control rounded-0" autocomplete="OFF" placeholder="25 sqm">
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="project_type">Project Type</label>
                          <input type="text" name="project_type" id="project_type" class="form-control rounded-0" autocomplete="OFF" placeholder="High-rise Condominium">
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="turn_over_year">Turn Over Year</label>
                          <input type="text" name="turn_over_year" id="turn_over_year" class="form-control rounded-0" autocomplete="OFF" placeholder="YYYY">
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="category">Category</label>
                          <select name="category" id="category" class="form-control rounded-0">
                            <!-- Categories will be dynamically loaded here -->
                          </select>
                        </div>
                      </div>


                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="status">Status</label>
                          <input type="text" name="status" id="status" class="form-control rounded-0" autocomplete="OFF" placeholder="Pre-selling">
                        </div>
                      </div>

                      <div class="col-6"></div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="address">Complete Address</label>
                          <textarea name="address" id="address" cols="5" class="form-control rounded-0"></textarea>
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="map_iframe">Google Map iFrame</label>
                          <textarea name="map_iframe" id="map_iframe" cols="5" class="form-control rounded-0"></textarea>
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="description">Description</label>
                          <textarea name="description" id="description" cols="5" class="form-control rounded-0"></textarea>
                        </div>
                      </div>

                    </div>

                    <div class="text-end">
                      <button type="submit" class="btn btn-primary rounded-0" id="submitBtn">Create Property</button>
                    </div>
                  </form>
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

        // Fetch categories and populate the select dropdown
        $.ajax({
          url: 'backend/property/category',  // Path to the PHP file that fetches categories
          method: 'GET',
          dataType: 'json',
          success: function(data) {
            if (data.error) {
              alert(data.error);
            } else {
              // Populate the category dropdown
              var categorySelect = $('#category');
              categorySelect.empty();  // Clear any existing options
              categorySelect.append('<option value="">Select Category</option>');  // Default option

              data.forEach(function(category) {
                categorySelect.append('<option value="' + category.category_name + '">' + category.category_name + '</option>');
              });
            }
          },
          error: function(xhr, status, error) {
            console.log("Error fetching categories: " + error);
          }
        });

        $("#propertyForm").submit(function(event) {
          event.preventDefault(); // Prevent the form from submitting the normal way

          var formData = $(this).serialize(); // Serialize the form data

          $.ajax({
            url: 'backend/property/submit', // PHP file that processes the form data
            type: 'POST',
            data: formData,
            success: function(response) {
              // Assuming the PHP response is a success message
              if (response === "success") {
                toastr.success('Property created successfully!');
                // Optionally, reset the form
                $("#propertyForm")[0].reset();
              } else {
                toastr.error('Error: ' + response);
              }
            },
            error: function() {
              toastr.error('There was an error submitting the form.');
            }
          });
        });
      });
    </script>

  </body>
</html>
