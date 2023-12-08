<?php include 'templates/top.php' ?>

<head>
  <title>AdminLTE 3 | Barang Masuk</title>
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
              <h1 class="m-0">Transaksi - Barang Masuk</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Barang Masuk</li>
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
                  <h3 class="card-title">Barang Masuk</h3>
                </div>

                <div class="card-body">
                  <div class="form-group text-center text-md-left">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#add-masuk">Add Data</button>
                  </div>
                  <table id="tableMasuk" class="table table-bordered table-striped table-responsive-lg">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>ID Masuk</th>
                        <th>Tanggal Masuk</th>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
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

    <!-- Modal Tambah Barang -->
    <div class="modal fade" id="add-masuk">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Tambah Data Barang</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" class="form" id="addMasukForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="inputEntityID">ID Masuk</label>
                <input type="text" class="form-control" id="inputEntityID" name="id_masuk" readonly required>
              </div>
              <div class="form-group">
                <label for="inputTglMasuk">Tanggal Masuk</label>
                <input type="date" class="form-control" id="inputTglMasuk" name="tgl_masuk" required>
              </div>
              <div class="form-group">
                <label for="inputIdBarang">ID Barang</label>
                <select class="form-control" id="inputIdBarang" name="id_barang" required>
                  <option value="" selected>Pilih Barang</option>
                  <?php
                  $queryBarang = "SELECT * FROM tb_barang";
                  $resultBarang = $conn->query($queryBarang);

                  if ($resultBarang->num_rows > 0) {
                    while ($rowBarang = $resultBarang->fetch_assoc()) {
                      echo "<option value='" . $rowBarang['id_barang'] . "' data-nama='" . $rowBarang['nama'] . "' data-stok='" . $rowBarang['stok'] . "'>" . $rowBarang['id_barang'] . " - " . $rowBarang['nama'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputNama">Nama</label>
                <input type="text" class="form-control" id="inputNama" name="nama" readonly>
              </div>
              <div class="form-group">
                <label for="inputStok">Stok</label>
                <input type="number" class="form-control" id="inputStok" name="stok" readonly>
              </div>
              <div class="form-group">
                <label for="inputJumlah">Jumlah Barang Masuk</label>
                <input type="number" class="form-control" id="inputJumlah" name="jumlah" min="0" placeholder="Masukkan jumlah barang" required autocomplete="off">
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

    <!-- Modal Edit Barang Masuk -->
    <div class="modal fade" id="edit-masuk">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data Barang Masuk</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post" class="form" id="editMasukForm">
            <div class="modal-body">
              <div class="form-group">
                <label for="editIdMasuk">ID Masuk</label>
                <input type="text" class="form-control" id="editIdMasuk" name="id_masuk" readonly required>
              </div>
              <div class="form-group">
                <label for="inputTglMasuk">Tanggal Masuk</label>
                <input type="date" class="form-control" id="editTglMasuk" name="tgl_masuk" required>
              </div>
              <div class="form-group">
                <label for="inputIdBarang">ID Barang</label>
                <select class="form-control" id="editIdBarang" name="id_barang" required>
                  <option value="" selected>Pilih Barang</option>
                  <?php
                  $queryBarang = "SELECT * FROM tb_barang";
                  $resultBarang = $conn->query($queryBarang);

                  if ($resultBarang->num_rows > 0) {
                    while ($rowBarang = $resultBarang->fetch_assoc()) {
                      echo "<option value='" . $rowBarang['id_barang'] . "' data-nama='" . $rowBarang['nama'] . "' data-stok='" . $rowBarang['stok'] . "'>" . $rowBarang['id_barang'] . " - " . $rowBarang['nama'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="editJumlah">Jumlah Barang Masuk</label>
                <input type="number" class="form-control" id="editJumlah" name="jumlah" min="0" placeholder="Masukkan jumlah barang" required autocomplete="off">
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

    <!-- Modal Delete Barang Masuk -->
    <div class="modal fade" id="delete-masuk">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Konfirmasi Hapus Data Satuan</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Apakah Anda yakin ingin menghapus data barang masuk ini?</p>
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