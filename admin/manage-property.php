<?php
  include_once '../database/conn.php';

  // Fetch categories from the database
  $sql = "SELECT * FROM categories";
  $result = mysqli_query($conn, $sql);
  $categories = [];

  if ($result) {
      // Fetch all categories and store them in an array
      while ($row = mysqli_fetch_assoc($result)) {
          $categories[] = $row;
      }
  } else {
      echo "Failed to fetch categories";
  }

  $propertyId = isset($_GET['id']) ? $_GET['id'] : null;
  $selectedCategory = null;

  if ($propertyId) {
    // Fetch the property details based on the ID
    $propertyQuery = "SELECT * FROM properties WHERE id = $propertyId";
    $propertyResult = mysqli_query($conn, $propertyQuery);

    if ($propertyResult) {
      $propertyData = mysqli_fetch_assoc($propertyResult);
      if ($propertyData && isset($propertyData['category'])) {
        $selectedCategory = $propertyData['category'];
      }
    }
  }

  // Query to get amenities from the database
  $amenities_sql = mysqli_query($conn, "SELECT * FROM `amenities`");

  mysqli_close($conn);  // Close the database connection
?>

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
                  <li class="breadcrumb-item active">Property | <span class="bg-info badge"><?php echo $selectedCategory ?></span></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 col-sm-12 col-md-6">
              <div class="card bg-comman w-100">
                <div class="card-header">
                  <h5 class="card-title mb-2">Manage Property</h5>
                </div>
                <div class="card-body">
                  <form id="propertyForm">
                    <input type="hidden" name="id" id="property_id" value="<?php echo $_GET['id'] ?>">
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
                            <?php foreach ($categories as $category): ?>
                              <!-- Debugging each category name -->
                              <pre><?php echo $category['category_name']; ?></pre>
                              <option value="<?php echo $category['category_name']; ?>" 
                                <?php 
                                  if (trim($category['category_name']) == trim($selectedCategory)) {
                                    echo 'selected'; 
                                  }
                                ?>>
                                <?php echo $category['category_name']; ?>
                              </option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="form-group mb-3">
                          <label for="status">Status</label>
                          <input type="text" name="status" id="status" class="form-control rounded-0" autocomplete="OFF" placeholder="Pre-selling">
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                          <label for="address">Complete Address</label>
                          <textarea name="address" id="address" cols="5" class="form-control rounded-0"></textarea>
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                          <label for="map_iframe">Google Map iFrame</label>
                          <textarea name="map_iframe" id="map_iframe" cols="5" class="form-control rounded-0"></textarea>
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-12">
                        <div class="form-group mb-3">
                          <label for="description">Description</label>
                          <textarea name="description" id="description" cols="5" class="form-control rounded-0"></textarea>
                        </div>
                      </div>

                    </div>

                    <div class="text-end">
                      <button type="submit" class="btn btn-primary rounded-0" id="submitBtn">Update Property Information</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6">
              <div class="card bg-comman w-100">
                <div class="card-header">
                  <h5 class="card-title mb-2">Additional Setting for Properties</h5>
                </div>
                <div class="card-body">
                  <h5>Amenities</h5>
                  <form action="#" id="amenity-form">
                      <div class="row">
                          <div class="col-12 col-sm-12 col-md-6">
                              <select name="amenity" id="amenity" class="form-control">
                                <option value="">Select Amenities</option>
                                  <?php 
                                  // Fetching the amenities as an array
                                  while ($amenities = mysqli_fetch_assoc($amenities_sql)) {
                                  ?>
                                      <option value="<?php echo htmlspecialchars($amenities['icons']); ?>">
                                          <?php echo htmlspecialchars($amenities['name']); ?>
                                      </option>
                                  <?php } ?>
                              </select>
                          </div>

                          <div class="col-12 col-sm-12 col-md-6">
                              <button type="submit" class="btn btn-primary text-white btn-sm rounded-0 form-control">Add Amenity</button>
                          </div>
                      </div>
                  </form>

                  <div class="amenities d-flex flex-wrap align-items-center my-4 w-100 gap-3" id="amenities-list">
                      <!-- New amenities will be added here -->
                  </div>

                  <h5>Property Images</h5>
                  <form action="#" id="image-form" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-12 col-sm-12 col-md-6">
                        <div class="d-flex align-items-center justify-content-center h-100">
                          <input type="file" name="file[]" class="form-control rounded-0" multiple />
                        </div>
                      </div>

                      <div class="col-12 col-sm-12 col-md-6">
                        <button type="submit" class="btn btn-primary text-white btn-sm rounded-0 form-control">Upload Images</button>
                      </div>
                    </div>
                  </form>

                  <div class="amenities d-flex flex-wrap align-items-center mt-4 w-100 gap-3" id="imageslist-list">
                    <!-- New images will be added here -->
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include_once 'include/footer.php' ?>

  </body>
</html>

<script>
  $(document).ready(function() {
    // Fetch property details when the page loads
    var propertyId = $('#property_id').val();

    // Fetch property details and populate the form
    $.ajax({
      url: 'backend/property/info',  // PHP script to fetch property data
      type: 'GET',
      data: { id: propertyId },
      dataType: 'json',
      success: function(data) {
        // Populate form fields with property data
        if (data && data.id) {
          $('#category_name').val(data.title);
          $('#price').val(data.price);
          $('#size').val(data.sqm);
          $('#project_type').val(data.type);
          $('#turn_over_year').val(data.turnover);
          $('#status').val(data.status);
          $('#address').val(data.address);
          $('#map_iframe').val(data.map_iframe);
          $('#description').val(data.description);
        }
      },
      error: function(xhr, status, error) {
        console.log('Error fetching property details:', error);
      }
    });

    // Handle form submission
    $("#propertyForm").submit(function(event) {
      event.preventDefault();  // Prevent the form from submitting the normal way

      var formData = $(this).serialize();  // Serialize the form data

      $.ajax({
        url: 'backend/property/update_info',  // PHP file that processes the form data
        type: 'POST',
        data: formData,  // Form data to be sent to the backend
        dataType: 'json',  // Expect the response to be JSON
        success: function(response) {
          console.log("Response from server:", response);  // Log the response for debugging

          // Check if the response contains the "success" status
          if (response && response.status === "success") {
            toastr.success('Property updated successfully!');
          } else {
            toastr.error('Error: ' + response.message);
          }
        },
        error: function(xhr, status, error) {
          console.error('Error submitting the form:', error);  // Log any AJAX errors to the console
          toastr.error('There was an error submitting the form.');  // Show error notification if request fails
        }
      });
    });

    function loadAmenities() {
      $.ajax({
        url: 'backend/property/fetch_amenities',
        type: 'GET',
        data: { id: propertyId },
        dataType: 'json',
        success: function(response) {
            if (response.length > 0) {
                $('#amenities-list').empty();  // Clear the existing list
                response.forEach(function(amenity) {
                    var amenityHtml = '<div class="group d-flex flex-column align-items-center amenity-item" data-filename="' + amenity.filename + '">' +
                        '<img src="../img/amenities/' + amenity.filename + '" style="width: 100%;">' +
                        '<a class="text-danger mt-2 delete-amenity" href="#">Trash</a>' +
                    '</div>';
                    $('#amenities-list').append(amenityHtml);
                });
            } else {
                $('#amenities-list').html('<p>No amenities found.</p>');
            }
        },
        error: function() {
            toastr.error('An error occurred while fetching amenities.');
        }
      });
    }

    // Call the function to load the amenities when the page is ready
    loadAmenities();

    // Handle form submission to add new amenity
    $('#amenity-form').on('submit', function(event) {
        event.preventDefault();  // Prevent the default form submission

        // Get the selected amenity icon from the form
        var selectedAmenity = $('#amenity').val();
        var iconExists = false;

        // Check if the selected amenity icon already exists in the list of current amenities
        $('#amenities-list .amenity-item').each(function() {
            if ($(this).data('filename') === selectedAmenity) {
                iconExists = true;
                return false;  // Stop the loop if the icon already exists
            }
        });

        if (iconExists) {
            // If the icon already exists, show an error message and prevent the form submission
            toastr.error('This amenity icon has already been added!');
            return; // Prevent the AJAX request from being sent
        }

        // Send AJAX request to add the new amenity
        $.ajax({
            url: 'backend/property/add_amenities',
            type: 'POST',
            data: {
                property_id: propertyId,
                icon_filename: selectedAmenity
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Display success message
                    toastr.success('Amenity added successfully!');
                    loadAmenities();  // Reload the amenities list after success
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('An error occurred while adding the amenity');
            }
        });
    });

    // Handle "Trash" button click to delete an amenity
    $(document).on('click', '.delete-amenity', function(event) {
        event.preventDefault();  // Prevent default link behavior

        var amenityItem = $(this).closest('.amenity-item');
        var iconFilename = amenityItem.data('filename');

        // Send AJAX request to delete the amenity
        $.ajax({
            url: 'backend/property/delete_amenities',
            type: 'POST',
            data: {
                property_id: propertyId,
                icon_filename: iconFilename
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Display success message
                    toastr.success('Amenity deleted successfully!');

                    // Reload the amenities list
                    loadAmenities();
                } else {
                    toastr.error(response.message);
                }
            },
            error: function() {
                toastr.error('An error occurred while deleting the amenity');
            }
        });
    });

  // Handle form submission to upload multiple images
  $('#image-form').on('submit', function(event) {
    event.preventDefault();  // Prevent default form submission

    var formData = new FormData(this);  // Form data from the form
    formData.append('property_id', propertyId);  // Append the property ID to FormData

    $.ajax({
      url: 'backend/property/upload_images',  // Backend script
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'json',
      success: function(response) {
        if (response.status === 'success') {
          toastr.success('Images uploaded successfully!');
          loadImages();  // Reload the images list
        } else {
          toastr.error(response.message);
        }
      },
      error: function() {
        toastr.error('An error occurred while uploading the images');
      }
    });
  });

  function loadImages() {
    var propertyId = $('#property_id').val();  // Ensure this is correct in your HTML

    $.ajax({
        url: 'backend/property/fetch_images',  // The endpoint to fetch images
        type: 'POST',  // Use POST method
        data: { property_id: propertyId },  // Ensure the property_id is included in the POST request
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                $('#imageslist-list').empty();  // Clear existing images
                response.data.forEach(function(image) {
                    // Dynamically build the image path
                    var imagePath = `../img/properties/${image.property_id}/${image.filename}`;

                    // Create the HTML for each image and the thumbnail button, plus the delete button
                    var imageHtml = `
                        <div class="col-4 image-item">
                            <img src="${imagePath}" class="img-fluid" alt="${image.filename}">
                            <button type="button" class="btn btn-link set-thumbnail-btn" data-id="${image.id}">Set as Thumbnail</button>
                            <button type="button" class="btn btn-link delete-image-btn" data-id="${image.id}" data-filename="${image.filename}">Delete</button>
                        </div>`;

                    // Append the new image HTML to the list
                    $('#imageslist-list').append(imageHtml);
                });
            } else {
                toastr.error(response.message);  // Show error if property ID is not found
            }
        },
        error: function() {
            toastr.error('An error occurred while fetching the images');
        }
    });
  }

  // Handle the setting of the profile thumbnail
  $(document).on('click', '.set-thumbnail-btn', function() {
    var imageId = $(this).data('id');
    $.ajax({
      url: 'backend/property/set_thumbnail.php',  // Backend script to set the profile thumbnail
      type: 'POST',
      data: { id: imageId, property_id: propertyId },
      dataType: 'json',
      success: function(response) {
        if (response.status === 'success') {
          toastr.success('Thumbnail set successfully!');
          loadImages();  // Reload images after setting the thumbnail
        } else {
          toastr.error(response.message);
        }
      },
      error: function() {
        toastr.error('An error occurred while setting the thumbnail');
      }
    });
  });

  // Handle the deletion of images
  $(document).on('click', '.delete-image-btn', function() {
    var imageId = $(this).data('id');
    var imageName = $(this).data('filename');
    var propertyId = $('#property_id').val();  // Ensure this is correct in your HTML

    // Send AJAX request to delete the image
    $.ajax({
      url: 'backend/property/delete_image.php',  // Backend script to delete the image
      type: 'POST',
      data: { image_id: imageId, image_name: imageName, property_id: propertyId },
      dataType: 'json',
      success: function(response) {
        if (response.status === 'success') {
          toastr.success('Image deleted successfully!');
          loadImages();  // Reload images list after deletion
        } else {
          toastr.error(response.message);
        }
      },
      error: function() {
        toastr.error('An error occurred while deleting the image');
      }
    });
  });

  // Initial call to load images when the page loads
  loadImages();
  });
</script>
