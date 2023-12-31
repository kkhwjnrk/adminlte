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
    <?php include 'templates/sidebar.php'; ?>

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
                  <table id="tableUser" class="table table-bordered table-striped table-responsive-lg">
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
          <form method="post" class="form" id="addUserForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="inputEntityID">User ID</label>
                <input type="text" class="form-control" id="inputEntityID" name="id_user" readonly required>
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
          <form method="post" class="form" id="editUserForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="editIdUser">User ID</label>
                <input type="text" class="form-control" id="editIdUser" name="id_user" readonly required>
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

    <!-- Modal Delete User -->
    <div class="modal fade" id="delete-user">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Hapus Data Pengguna</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data pengguna ini?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-danger" id="submit-btn">Hapus</button>
          </div>
        </div>
      </div>
    </div>

    <?php include 'templates/footer.php' ?>
  </div>

  <?php include 'templates/bottom.php' ?>