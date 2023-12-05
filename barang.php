<?php include 'templates/top.php' ?>

<head>
  <title>AdminLTE 3 | Barang</title>
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
              <h1 class="m-0">Master Data Barang</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data Barang</li>
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
                  <h3 class="card-title">Data Barang</h3>
                </div>

                <div class="card-body">
                  <div class="form-group text-center text-md-left">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-barang">Add Data</button>
                    <button class="btn btn-secondary btn-sm btn-edit" data-toggle="modal">Edit Data</button>
                    <button class="btn btn-danger btn-sm btn-delete" data-toggle="modal">Hapus Data</button>
                  </div>
                  <table id="tableBarang" class="table table-bordered table-striped table-responsive-lg">
                    <thead>
                      <tr>
                        <th></th>
                        <th>No</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis</th>
                        <th>Satuan</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <!-- <th>Aksi</th> -->
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

    <!-- Modal Tambah Barang -->
    <div class="modal fade" id="add-barang">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" class="form" id="addBarangForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="inputEntityID">ID Barang</label>
                <input type="text" class="form-control" id="inputEntityID" name="id_barang" readonly required>
              </div>
              <div class="form-group">
                <label for="inputNama">Nama Barang</label>
                <input type="text" class="form-control" id="inputNama" name="nama" placeholder="Masukkan nama barang" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="inputJenis">Jenis Barang</label>
                <select class="form-control" id="inputJenis" name="jenis" required>
                  <option value="" selected>Pilih Jenis</option>
                  <?php
                  $queryJenis = "SELECT * FROM tb_jenis";
                  $resultJenis = $conn->query($queryJenis);

                  if ($resultJenis->num_rows > 0) {
                    while ($rowJenis = $resultJenis->fetch_assoc()) {
                      echo "<option value='" . $rowJenis['id_jenis'] . "'>" . $rowJenis['jenis'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputSatuan">Satuan Barang</label>
                <select class="form-control" id="inputSatuan" name="satuan" required>
                  <option value="" selected>Pilih Satuan</option>
                  <?php
                  $querySatuan = "SELECT * FROM tb_satuan";
                  $resultSatuan = $conn->query($querySatuan);

                  if ($resultSatuan->num_rows > 0) {
                    while ($rowSatuan = $resultSatuan->fetch_assoc()) {
                      echo "<option value='" . $rowSatuan['id_satuan'] . "'>" . $rowSatuan['satuan'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStok">Stok</label>
                <input type="number" class="form-control" id="inputStok" name="stok" min="0" placeholder="Masukkan jumlah stok" required>
              </div>
              <div class="form-group">
                <label for="inputHarga">Harga</label>
                <input type="number" class="form-control" id="inputHarga" name="harga" min="0" placeholder="Masukkan harga barang" required>
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

    <!-- Modal Edit Barang -->
    <div class="modal fade" id="edit-barang">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" class="form" id="editBarangForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="editIdBarang">Barang ID</label>
                <input type="text" class="form-control" id="editIdBarang" name="id_barang" readonly required>
              </div>
              <div class="form-group">
                <label for="editName">Nama Barang</label>
                <input type="text" class="form-control" id="editNama" name="nama" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="editJenis">Jenis Barang</label>
                <select class="form-control" id="editJenis" name="jenis" required>
                  <option value="" selected>Pilih Jenis</option>
                  <?php
                  $queryJenis = "SELECT * FROM tb_jenis";
                  $resultJenis = $conn->query($queryJenis);

                  if ($resultJenis->num_rows > 0) {
                    while ($rowJenis = $resultJenis->fetch_assoc()) {
                      echo "<option value='" . $rowJenis['id_jenis'] . "'>" . $rowJenis['jenis'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="editSatuan">Satuan Barang</label>
                <select class="form-control" id="editSatuan" name="satuan" required>
                  <option value="" selected>Pilih Satuan</option>
                  <?php
                  $querySatuan = "SELECT * FROM tb_satuan";
                  $resultSatuan = $conn->query($querySatuan);

                  if ($resultSatuan->num_rows > 0) {
                    while ($rowSatuan = $resultSatuan->fetch_assoc()) {
                      echo "<option value='" . $rowSatuan['id_satuan'] . "'>" . $rowSatuan['satuan'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="editStok">Stok</label>
                <input type="number" class="form-control" id="editStok" name="stok" required autocomplete="off">
              </div>
              <div class="form-group">
                <label for="editHarga">Harga</label>
                <input type="number" class="form-control" id="editHarga" name="harga" required autocomplete="off">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" id="submitEditBarangForm">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Delete User -->
    <div class="modal fade" id="delete-barang">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Hapus Data Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data barang ini?</p>
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