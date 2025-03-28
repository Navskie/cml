<?php
  include_once '../../../database/conn.php';

  // Ensure the response is in JSON format
  header('Content-Type: application/json');

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $amenities_name = isset($_POST['amenities']) ? $_POST['amenities'] : '';
    $file_name = isset($_FILES['file']) ? $_FILES['file']['name'] : '';
    $file_tmp = isset($_FILES['file']) ? $_FILES['file']['tmp_name'] : '';

    // Check if amenities name is provided
    if (empty($amenities_name)) {
      echo json_encode(['success' => false, 'message' => 'Amenities name is required']);
      exit;
    }

    // Check if file is uploaded
    if ($file_name) {
      // Define the target directory where the image should be uploaded
      $target_dir = "../../../img/amenities/";
      $target_file = $target_dir . basename($file_name);
      $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      
      // Check if the file is a valid image
      $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
      if (!in_array($file_type, $allowed_types)) {
        echo json_encode(['success' => false, 'message' => 'Only image files are allowed.']);
        exit;
      }

      // Try to move the uploaded file to the target directory
      if (move_uploaded_file($file_tmp, $target_file)) {
        // File uploaded successfully
      } else {
        echo json_encode(['success' => false, 'message' => 'Failed to upload file.']);
        exit;
      }
    } else {
      // If no file is uploaded, set a default or null for file_name
      $file_name = null;
    }

    // Insert the amenity data into the database
    $query = "INSERT INTO amenities (name, icons) VALUES ('$amenities_name', '$file_name')";
    $result = mysqli_query($conn, $query);

    if ($result) {
      echo json_encode(['success' => true, 'message' => 'Amenity added successfully!']);
    } else {
      echo json_encode(['success' => false, 'message' => 'Error: ' . mysqli_error($conn)]);
    }
  } else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
  }
?>
