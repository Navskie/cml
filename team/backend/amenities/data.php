<?php
  include_once '../../database/conn.php';

  // Fetch amenities data from the database
  $query = "SELECT * FROM amenities ORDER BY date_encoded DESC";
  $result = mysqli_query($conn, $query);

  // Initialize an array to store the amenities data
  $amenities = [];

  // Fetch each row and ensure you have the correct field names
  while ($row = mysqli_fetch_assoc($result)) {
      // Adjust the keys to match the expected format in JavaScript
      $amenities[] = [
          'id' => $row['id'],
          'amenities_name' => $row['name'],  // Assuming 'name' is the column for amenities name
          'file_name' => $row['icons'],      // Assuming 'icons' is the column for file name
          'created_at' => $row['date_encoded'] // Assuming 'date_encoded' is the column for the creation date
      ];
  }

  // Return the JSON response
  echo json_encode($amenities);
?>
