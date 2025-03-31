<?php 
  include_once '../database/conn.php';

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($password) || empty($username)) {
      echo "empty";
    } else {
      $md5Password = md5($password);

      $users_sql = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username' AND password = '$md5Password'");
      $users_fetch = mysqli_fetch_array($users_sql);

      if (mysqli_num_rows($users_sql) < 1) {
        echo "match";
      } else {
        $_SESSION['id'] = $users_fetch['id'];
        $_SESSION['status'] = 'valid';

        echo "success";
      }
    }
  }
?>