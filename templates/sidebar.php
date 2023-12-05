<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="index.php" class="brand-link">
    <img src="assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Kukuh Wijanarko</a>
      </div>
    </div>

    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="index.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'penjualan.php') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'penjualan.php') ? 'active' : ''; ?>">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Transaksi
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'penjualan.php') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Penjualan</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'barang.php' || basename($_SERVER['PHP_SELF']) == 'satuan.php') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'barang.php' || basename($_SERVER['PHP_SELF']) == 'satuan.php') ? 'active' : ''; ?>" data-toggle="tab">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Master Data
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="barang.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'barang.php') ? 'active' : ''; ?>" id="barangTab">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Barang</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="satuan.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'satuan.php') ? 'active' : ''; ?>" id="satuanTab">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Satuan</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'user.php') ? 'menu-open' : ''; ?>">
          <a href="#" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'user.php') ? 'active' : ''; ?>" data-toggle="tab">
            <i class="nav-icon far fa-user"></i>
            <p>
              Pengguna
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="user.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'user.php') ? 'active' : ''; ?>" id="userTab">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Pengguna</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</aside>