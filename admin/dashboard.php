<!DOCTYPE html>
<html lang="en">
  <!-- Head -->
  <?php include_once 'include/head.php' ?>
  <body>
    <div class="main-wrapper">
      <!-- Navbar -->
      <?php include_once 'include/navbar.php' ?>

      <!-- Sidebar -->
      <?php include_once 'include/sidebar.php' ?>

      <div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-sub-header">
                  <h3 class="page-title">Welcome <?php echo $username ?>!</h3>
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="index">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
              <div class="card bg-comman w-100">
                <div class="card-body">
                  <div
                    class="db-widgets d-flex justify-content-between align-items-center"
                  >
                    <div class="db-info">
                      <h6>Request</h6>
                      <h3>1</h3>
                    </div>
                    <div class="db-icon">
                      <img
                        src="img/request.png"
                        alt="Dashboard Icon"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
              <div class="card bg-comman w-100">
                <div class="card-body">
                  <div
                    class="db-widgets d-flex justify-content-between align-items-center"
                  >
                    <div class="db-info">
                      <h6>Today Request</h6>
                      <h3>2</h3>
                    </div>
                    <div class="db-icon">
                      <img
                        src="img/request.png"
                        alt="Dashboard Icon"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
              <div class="card bg-comman w-100">
                <div class="card-body">
                  <div
                    class="db-widgets d-flex justify-content-between align-items-center"
                  >
                    <div class="db-info">
                      <h6>Month Request</h6>
                      <h3>3</h3>
                    </div>
                    <div class="db-icon">
                      <img
                        src="img/request.png"
                        alt="Dashboard Icon"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
              <div class="card bg-comman w-100">
                <div class="card-body">
                  <div
                    class="db-widgets d-flex justify-content-between align-items-center"
                  >
                    <div class="db-info">
                      <h6>Total Request</h6>
                      <h3>4</h3>
                    </div>
                    <div class="db-icon">
                      <img
                        src="img/request.png"
                        alt="Dashboard Icon"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include_once 'include/footer.php' ?>
  </body>
</html>
