<div class="header">
  <div class="header-left">
    <a href="dashboard" class="logo">
      <img src="img/logo.png" alt="Logo" width="100"/>
    </a>
    <a href="dashboard" class="logo logo-small">
      <img
        src="img/logo.png"
        alt="Logo"
        width="30"
        height="30"
      />
    </a>
  </div>
  <div class="menu-toggle">
    <a href="javascript:void(0);" id="toggle_btn">
      <i class="fas fa-bars"></i>
    </a>
  </div>
  <a class="mobile_btn" id="mobile_btn">
    <i class="fas fa-bars"></i>
  </a>

  <ul class="nav user-menu">
    <li class="nav-item dropdown has-arrow new-user-menus">
      <a
        href="#"
        class="dropdown-toggle nav-link"
        data-bs-toggle="dropdown"
      >
        <span class="user-img">
          <img
            class="rounded-circle"
            src="img/profile/<?php echo $img = !empty($img) ? $img : 'default.png'; ?>"
            width="31"
            alt="Soeng Souy"
          />
          <div class="user-text">
            <h6><?php echo $username ?></h6>
            <p class="text-muted mb-0"><?php echo $department ?></p>
          </div>
        </span>
      </a>
      <div class="dropdown-menu">
        <div class="user-header">
          <div class="avatar avatar-sm">
            <img
              src="img/profile/<?php echo $img = !empty($img) ? $img : 'default.png'; ?>"
              alt="User Image"
              class="avatar-img rounded-circle"
            />
          </div>
          <div class="user-text">
            <h6><?php echo $username ?></h6>
            <p class="text-muted mb-0"><?php echo $department ?></p>
          </div>
        </div>
        <a class="dropdown-item" href="settings">Settings</a>
        <a class="dropdown-item" href="logout">Logout</a>
      </div>
    </li>
  </ul>
</div>