<?php include 'templates/top.php' ?>

<head>
  <title>AdminLTE 3 | Satuan</title>
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
              <h1 class="m-0">Master Data Satuan</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data Satuan</li>
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
                  <h3 class="card-title">Data Satuan</h3>
                </div>

                <div class="card-body">
                  <div class="form-group text-center text-md-left">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-satuan">Add Data</button>
                  </div>
                  <table id="tableSatuan" class="table table-bordered table-striped table-responsive-lg">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Satuan</th>
                        <th>Nama Satuan</th>
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

    <!-- Modal Tambah Satuan -->
    <div class="modal fade" id="add-satuan">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Satuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" class="form" id="addSatuanForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="inputEntityID">ID Satuan</label>
                <input type="text" class="form-control" id="inputEntityID" name="id_satuan" readonly required>
              </div>
              <div class="form-group">
                <label for="inputSatuan">Nama Satuan</label>
                <input type="text" class="form-control" id="inputSatuan" name="satuan" required autocomplete="off">
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

    <!-- Modal Edit Satuan -->
    <div class="modal fade" id="edit-satuan">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Satuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" class="form" id="editSatuanForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="editIdSatuan">ID Satuan</label>
                <input type="text" class="form-control" id="editIdSatuan" name="id_satuan" readonly required>
              </div>
              <div class="form-group">
                <label for="editSatuan">Nama Satuan</label>
                <input type="text" class="form-control" id="editSatuan" name="satuan" required autocomplete="off">
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

    <!-- Modal Delete Satuan -->
    <div class="modal fade" id="delete-satuan">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Hapus Data Satuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data satuan ini?</p>
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