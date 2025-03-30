<?php
  include_once '../../../database/conn.php';

  // Check if the request method is POST
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data from the form
    $categoryId = isset($_POST['category']) ? mysqli_real_escape_string($conn, $_POST['category']) : '';
    $title = isset($_POST['category_name']) ? mysqli_real_escape_string($conn, $_POST['category_name']) : '';
    $description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : '';
    $status = isset($_POST['status']) ? mysqli_real_escape_string($conn, $_POST['status']) : '';
    $type = isset($_POST['project_type']) ? mysqli_real_escape_string($conn, $_POST['project_type']) : '';
    $sqm = isset($_POST['size']) ? mysqli_real_escape_string($conn, $_POST['size']) : '';
    $turnover = isset($_POST['turn_over_year']) ? mysqli_real_escape_string($conn, $_POST['turn_over_year']) : '';
    $price = isset($_POST['price']) ? mysqli_real_escape_string($conn, $_POST['price']) : '';
    $address = isset($_POST['address']) ? mysqli_real_escape_string($conn, $_POST['address']) : '';
    $mapIframe = isset($_POST['map_iframe']) ? mysqli_real_escape_string($conn, $_POST['map_iframe']) : '';
    $propertyId = isset($_POST['id']) ? mysqli_real_escape_string($conn, $_POST['id']) : '';
    $mapIframe = stripslashes($mapIframe);

    // Check if required fields are empty
    if (empty($title) || empty($description) || empty($status) || empty($type) || empty($price) || empty($categoryId) || empty($address)) {
      echo json_encode(["status" => "error", "message" => "All fields are required."]);
      exit;
    }

    // Prepare the SQL query to update the property details
    $sql = "UPDATE properties 
            SET title = ?, description = ?, status = ?, type = ?, sqm = ?, turnover = ?, price = ?, address = ?, map_iframe = ?, category = ? 
            WHERE id = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
      // Bind parameters to the statement
      $stmt->bind_param("sssssissssi", $title, $description, $status, $type, $sqm, $turnover, $price, $address, $mapIframe, $categoryId, $propertyId);
      
      // Execute the statement
      if ($stmt->execute()) {
        // Fetch updated property data
        $updatedProperty = [
          'id' => $propertyId,
          'title' => $title,
          'description' => $description,
          'status' => $status,
          'type' => $type,
          'sqm' => $sqm,
          'turnover' => $turnover,
          'price' => $price,
          'address' => $address,
          'map_iframe' => $mapIframe,
          'category' => $categoryId
        ];

        // Return success and updated property data
        echo json_encode(["status" => "success", "message" => "Property updated successfully!", "data" => $updatedProperty]);
      } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $stmt->error]);
      }

      // Close the statement
      $stmt->close();
    } else {
      echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $conn->error]);
    }
  } else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
  }

  // Close the connection
  mysqli_close($conn);
?>
