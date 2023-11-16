<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit();
}

$username = ucfirst($_SESSION['username']);
$create_date = "Member since " . (new DateTime($_SESSION['create_date']))->format("d M Y");
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="./assets/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline"><?php echo $username; ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <li class="user-header bg-primary">
          <img src="./assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

          <p>
            <?php echo $username; ?>
            <small><?php echo $create_date; ?></small>
          </p>
        </li>
        <li class="user-footer">
          <a href="#" class="btn btn-default btn-flat">Profile</a>
          <a href="./logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>
</nav>