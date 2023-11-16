<?php include 'templates/top.php' ?>

<head>
  <title>AdminLTE 3 | Pengguna</title>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <div class="wrapper">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <?php include 'templates/navbar.php'; ?>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Kukuh Wijanarko</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
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

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Transaksi
                  <i class="right fas fa-angle-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penjualan</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>
                  Master Data
                  <i class="right fas fa-angle-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Barang</p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon far fa-user"></i>
                <p>
                  Pengguna
                  <i class="right fas fa-angle-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="user.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Pengguna</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Pengguna</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Pengguna</li>
              </ol>
            </div>
          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Data Pengguna</h3>
                </div>

                <div class="card-body">
                  <div class="form-group text-center text-md-left">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-user">Add Data</button>
                  </div>
                  <table id="table" class="table table-bordered table-striped table-responsive-lg">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- Modal Tambah User -->
    <div class="modal fade" id="add-user">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Pengguna</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" class="form" id="addForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="inputUserID">User ID</label>
                <input type="text" class="form-control" id="inputUserID" name="user_id" readonly required>
              </div>
              <div class="form-group">
                <label for="inputUsername">Username</label>
                <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Masukkan username" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" required>
              </div>
              <div class="form-group">
                <label for="inputStatus">Status</label>
                <select class="form-control" id="inputStatus" name="status" required>
                  <option value="" selected>Pilih Status</option>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="submitForm">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit User -->
    <div class="modal fade" id="edit-user">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Pengguna</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" class="form" id="editForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="editUserID">User ID</label>
                <input type="text" class="form-control" id="editUserID" name="user_id" readonly required>
              </div>
              <div class="form-group">
                <label for="editUsername">Username</label>
                <input type="text" class="form-control" id="editUsername" name="username" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="editPassword">Password</label>
                <input type="text" class="form-control" id="editPassword" name="password" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="editStatus">Status</label>
                <select class="form-control" id="editStatus" name="status" required>
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="submitEditForm">Submit</button>
            </div>
          </form>

        </div>
      </div>
    </div>

    <aside class="control-sidebar control-sidebar-dark">
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>

    <?php include 'templates/footer.php' ?>
  </div>

  <?php include 'templates/bottom.php' ?>