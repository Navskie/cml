<?php
  include_once '../../../database/conn.php';

  // Check if the form data is submitted via POST
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data from the AJAX request
    $navbar_status = mysqli_real_escape_string($conn, $_POST['navbar_status']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $facebook_link = mysqli_real_escape_string($conn, $_POST['facebook_link']);
    $instagram_link = mysqli_real_escape_string($conn, $_POST['instagram_link']);
    $youtube_link = mysqli_real_escape_string($conn, $_POST['youtube_link']);

    // SQL query to update the navbar settings in the database
    $sql = "UPDATE topbar_settings SET 
                navbar_status = '$navbar_status',
                phone_number = '$phone_number',
                email_address = '$email_address',
                facebook_link = '$facebook_link',
                instagram_link = '$instagram_link',
                youtube_link = '$youtube_link'
            WHERE id = 1"; // Adjust the WHERE clause to identify the correct record

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo 'success'; // Return success message to AJAX
    } else {
        echo 'error'; // Return error message if the query fails
    }
  }

  // Close the database connection
  $conn->close();
?>