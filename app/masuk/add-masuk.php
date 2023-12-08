<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $masukID = $_POST['id_masuk'];
  $tgl_masuk = $_POST['tgl_masuk'];
  $id_barang = $_POST['id_barang'];
  $jumlah = $_POST['jumlah'];

  $queryStok = "SELECT stok FROM tb_barang WHERE id_barang = ?";
  $stmtStok = $conn->prepare($queryStok);
  $stmtStok->bind_param("s", $id_barang);
  $stmtStok->execute();
  $resultStok = $stmtStok->get_result();

  if ($resultStok->num_rows > 0) {
    $rowStok = $resultStok->fetch_assoc();
    $stokTerkini = $rowStok['stok'];

    $stmtMasuk = $conn->prepare("INSERT INTO tb_masuk (id_masuk, tgl_masuk, id_barang, jumlah) VALUES (?, ?, ?, ?)");
    $stmtMasuk->bind_param("ssss", $masukID, $tgl_masuk, $id_barang, $jumlah);

    if ($stmtMasuk->execute()) {
      $stokBaru = $stokTerkini + $jumlah;
      $stmtUpdateStok = $conn->prepare("UPDATE tb_barang SET stok = ? WHERE id_barang = ?");
      $stmtUpdateStok->bind_param("ss", $stokBaru, $id_barang);

      if ($stmtUpdateStok->execute()) {
        echo "Data added successfully";
      } else {
        echo "Error updating stok: " . $stmtUpdateStok->error;
      }

      $stmtUpdateStok->close();
    } else {
      echo "Error adding data to tb_masuk: " . $stmtMasuk->error;
    }

    $stmtMasuk->close();
  } else {
    echo "Barang not found";
  }

  $stmtStok->close();
}

$conn->close();
