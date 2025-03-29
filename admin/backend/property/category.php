<?php
  include_once '../../../database/conn.php';

  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Query to fetch categories from the categories table
    $sql = "SELECT * FROM categories"; 

    // Execute the query
    $result = mysqli_query($conn, $sql);
    $categories = [];

    if ($result) {
      // Fetch all categories and store them in an array
      while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
      }
      
      // Return categories as a JSON response
      echo json_encode($categories);
    } else {
      echo json_encode(['error' => 'Failed to fetch categories']);
    }

    // Close the database connection
    mysqli_close($conn);
  } else {
    echo "Invalid request method.";
  }
?>
