<?php
  include_once '../../database/conn.php';

  // Fetch data from the database
  $sql = "SELECT * FROM topbar_settings WHERE id = 1"; // Adjust the WHERE clause as necessary
  $result = $conn->query($sql);

  $response = [];

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $response = [
          'navbar_status' => $row['navbar_status'],
          'phone_number' => $row['phone_number'],
          'email_address' => $row['email_address'],
          'facebook_link' => $row['facebook_link'],
          'instagram_link' => $row['instagram_link'],
          'youtube_link' => $row['youtube_link']
      ];
  } else {
      $response = [
          'navbar_status' => '',
          'phone_number' => '',
          'email_address' => '',
          'facebook_link' => '',
          'instagram_link' => '',
          'youtube_link' => ''
      ];
  }

  // Return data as JSON
  echo json_encode($response);
?>
