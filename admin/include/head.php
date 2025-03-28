<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=0"
  />
  <title>CML Realty & Development System</title>
  <link rel="shortcut icon" href="assets/img/favicon.png" />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
    rel="stylesheet"
  />
  <link
    rel="stylesheet"
    href="assets/plugins/bootstrap/css/bootstrap.min.css"
  />
  <link rel="stylesheet" href="assets/plugins/feather/feather.css" />
  <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css" />
  <link
    rel="stylesheet"
    href="assets/plugins/fontawesome/css/fontawesome.min.css"
  />
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/plugins/simpleline/simple-line-icons.css">
  <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/plugins//toastr/toatr.css">
  <link rel="stylesheet" href="assets/plugins/lightbox/glightbox.min.css">
  
</head>
<?php 
  include_once '../database/conn.php';

  if (empty($_SESSION['id']) || empty($_SESSION['status'])) {
    // Redirect to login page if the condition is true
    header('Location: index');  // Redirect to login page
    exit();  // Stop further execution
  }
?>
