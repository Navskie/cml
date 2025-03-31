<!DOCTYPE html>
<html lang="en">
  <!-- Head -->
  <?php include_once 'include/head.php' ?>
  
  <!-- Link to your local Toastr CSS -->
  <link rel="stylesheet" href="path/to/toastr.min.css">
  
  <!-- Link to your local jQuery -->
  <script src="path/to/jquery.min.js"></script>
  
  <!-- Link to your local Toastr JS -->
  <script src="path/to/toastr.min.js"></script>

  <body>
    <div class="main-wrapper">
      <!-- Navbar -->
      <?php include_once 'include/navbar.php' ?>

      <!-- Sidebar -->
      <?php include_once 'include/sidebar.php' ?>

      <div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-sub-header">
                  <h3 class="page-title">Welcome <?php echo $username ?>!</h3>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Top Navbar</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="card bg-comman w-100">
                <div class="card-header">
                  <h5 class="card-title mb-2">Manage Top Navigation</h5>
                  <p class="card-text">
                    Involves organizing and editing the menu links at the top of a website or app to improve user navigation and experience.
                  </p>
                </div>
                <div class="card-body">
                  <form id="navbarForm">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <label for="navbar_status">Show / Hide Top Navbar</label>
                        <select name="navbar_status" id="navbar_status" class="form-control rounded-0">
                          <option value="">Select Option</option>
                          <option value="Show" <?php if($navbar_status == 'Show') echo 'selected'; ?>>Show</option>
                          <option value="Hide" <?php if($navbar_status == 'Hide') echo 'selected'; ?>>Hide</option>
                        </select>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <!-- Blank -->
                      </div>

                      <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control rounded-0" autocomplete="OFF" placeholder="0999-9999-999" value="<?php echo $phone_number; ?>">
                      </div>

                      <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <label for="email_address">Email Address</label>
                        <input type="email" name="email_address" id="email_address" class="form-control rounded-0" autocomplete="OFF" placeholder="example@gmail.com" value="<?php echo $email_address; ?>">
                      </div>

                      <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <label for="facebook_link">Facebook Link</label>
                        <input type="text" name="facebook_link" id="facebook_link" class="form-control rounded-0" autocomplete="OFF" placeholder="www.facebook.com" value="<?php echo $facebook_link; ?>">
                      </div>

                      <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <label for="instagram_link">Instagram Link</label>
                        <input type="text" name="instagram_link" id="instagram_link" class="form-control rounded-0" autocomplete="OFF" placeholder="www.instagram.com" value="<?php echo $instagram_link; ?>">
                      </div>

                      <div class="col-12 col-sm-12 col-md-6 mb-3">
                        <label for="youtube_link">Youtube Link</label>
                        <input type="text" name="youtube_link" id="youtube_link" class="form-control rounded-0" autocomplete="OFF" placeholder="www.youtube.com" value="<?php echo $youtube_link; ?>">
                      </div>

                      <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary rounded-0">Update Top Navbar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include_once 'include/footer.php' ?>

    <script>
      $(document).ready(function() {
        $.ajax({
          url: 'backend/topnavbar/data', // The PHP script that fetches the navbar data
          type: 'GET',
          success: function(response) {
            // Parse the JSON response
            var data = JSON.parse(response);

            // Populate the form with the fetched data
            $('#navbar_status').val(data.navbar_status);
            $('#phone_number').val(data.phone_number);
            $('#email_address').val(data.email_address);
            $('#facebook_link').val(data.facebook_link);
            $('#instagram_link').val(data.instagram_link);
            $('#youtube_link').val(data.youtube_link);
          },
          error: function() {
            toastr.error('Error loading data', 'Error');
          }
        });
        
        // Handle form submission via AJAX
        $('#navbarForm').on('submit', function(e) {
          e.preventDefault(); // Prevent the default form submission

          var formData = $(this).serialize(); // Serialize form data

          $.ajax({
            url: 'backend/topnavbar/update', // PHP script to process the form
            type: 'POST',
            data: formData,
            success: function(response) {
              // Check if the response indicates success
              if (response === 'success') {
                toastr.success('Request has been successfully processed', 'Success');
              } else {
                toastr.error('There was an error processing the request', 'Error');
              }
            },
            error: function() {
              toastr.error('There was an error connecting to the server', 'Error');
            }
          });
        });
      });
    </script>
  </body>
</html>
