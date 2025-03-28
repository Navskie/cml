<?php
  // Include your database connection
  include_once '../../../database/conn.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_name = $_POST['category'];

    // Insert category into database
    $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    
    if ($conn->query($sql) === TRUE) {
      echo 'success';
    } else {
      echo 'error';
    }
  }
?>
