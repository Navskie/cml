<?php
  include_once '../../../database/conn.php';

  // Get the property ID from the GET request
  if (isset($_GET['id'])) {
    $propertyId = mysqli_real_escape_string($conn, $_GET['id']);

    // Query to fetch property details
    $sql = "SELECT * FROM properties WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
      $stmt->bind_param("i", $propertyId); // Bind the ID parameter
      $stmt->execute();
      $result = $stmt->get_result();
      
      if ($result->num_rows > 0) {
        // Fetch the property data
        $property = $result->fetch_assoc();
        echo json_encode($property); // Return property data in JSON format
      } else {
        echo json_encode(['error' => 'Property not found']);
      }

      $stmt->close();
    } else {
      echo json_encode(['error' => 'Error preparing statement']);
    }

  } else {
    echo json_encode(['error' => 'No property ID provided']);
  }

  // Close the connection
  mysqli_close($conn);
?>
