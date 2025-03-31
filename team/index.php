<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0"
    />
    <title>CML Realty - Login</title>
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

    <link rel="stylesheet" href="assets/plugins//toastr/toatr.css">

    <link rel="stylesheet" href="assets/css/style.css" />

    <?php 
      session_start();

      // Check if session variables are set and validate their values
      if (isset($_SESSION['id']) && $_SESSION['id'] !== '' && $_SESSION['status'] === 'valid') {
        // Redirect to dashboard if condition is true
        header('Location: dashboard');  // Corrected Location header
        exit();  // Make sure to call exit to stop further execution
      }
    ?>
  </head>
  <body>
    <div class="main-wrapper login-body">
      <div class="login-wrapper">
        <div class="container">
          <div class="loginbox">
            <div class="login-left" style="display: flex; align-items: center; justify-content: center; background-color: #662D91">
              <img class="img-fluid" src="../img/whitelogo.png" alt="Logo" />
            </div>
            <div class="login-right">
              <div class="login-right-wrap">
                <h1>CML Realty & Development Corporation</h1>
                <p class="account-subtitle">
                  Please Signin to access your data.</a>
                </p>
                <h2>Sign in</h2>

                <form method="POST">
                  <div class="form-group">
                    <label>Username <span class="login-danger">*</span></label>
                    <input class="form-control" type="text" id="username" autocomplete="OFF"/>
                    <span class="profile-views"
                      ><i class="fas fa-user-circle"></i
                    ></span>
                  </div>
                  <div class="form-group">
                    <label>Password <span class="login-danger">*</span></label>
                    <input class="form-control pass-input" type="password" id="password"/>
                    <span
                      class="profile-views feather-eye-off toggle-password"
                      style="cursor:pointer"
                    ></span>
                  </div>
                  <div class="forgotpass">
                    <div class="remember-me">
                      <label
                        class="custom_check mr-2 mb-0 d-inline-flex remember-me"
                      >
                        Remember me
                        <input type="checkbox" name="radio" />
                        <span class="checkmark"></span>
                      </label>
                    </div>

                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-block rounded-0" type="submit" id="loginSubmit" style="background-color: #662D91">
                      Login
                    </button>
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/feather.min.js"></script>
    <script src="assets/plugins/toastr/toastr.min.js"></script>
    <!-- <script src="assets/plugins/toastr/toastr.js"></script> -->
    <script src="assets/js/script.js"></script>
    <script>
      $(document).ready(function(){
        $('#loginSubmit').on('click', function(e) {
          e.preventDefault();        

          $.ajax({
            url: 'backend/login', // Change this to your actual login URL
            type: 'POST',
            data: { username: $('#username').val(), password: $('#password').val() },
            success: function(response) {
              // console.log(response);
              if (response === 'empty') {
                toastr.error("All fields are required", "Error");
              } else if (response === 'match') {
                toastr.error("Username and password not match", "Error");
              } else if (response === 'success') {
                toastr.success("Login Successfull", "Success");
                setTimeout(() => {
                  // location.reload();
                  window.location.href = 'dashboard';
                }, 2000);
              }
            },
            error: function(xhr, status, error) {
              toastr.error("Login failed: " + xhr.responseText, "Error");
            }
          });
        });
      });
    </script>
  </body>
</html>
