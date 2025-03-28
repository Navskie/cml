<?php 
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'cml';

  $conn = mysqli_connect($host, $username, $password, $database);

  if (!$conn) {
    echo 'Database Connection Error';
  }

  session_start();

  $userid = $_SESSION['id'];

  $user_sql = mysqli_query($conn, "SELECT * FROM users WHERE id = '$userid'");
  $userData = mysqli_fetch_assoc($user_sql);

  $username = $userData['fullname'];
  $department = $userData['position'];
  $img = $userData['profile'];

?>