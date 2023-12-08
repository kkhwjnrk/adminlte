<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $masukID = $_POST['id_masuk'];
  $tglMasuk = $_POST['tgl_masuk'];
  $barangIDBaru = $_POST['id_barang'];
  $jumlahBaru = $_POST['jumlah'];

  $stmtInfo = $conn->prepare("SELECT id_barang, jumlah FROM tb_masuk WHERE id_masuk = ?");
  $stmtInfo->bind_param("s", $masukID);
  $stmtInfo->execute();
  $resultInfo = $stmtInfo->get_result();

  if ($resultInfo->num_rows > 0) {
    $rowInfo = $resultInfo->fetch_assoc();
    $id_barang_lama = $rowInfo['id_barang'];
    $jumlahLama = $rowInfo['jumlah'];
    $stmtUpdate = $conn->prepare("UPDATE tb_masuk SET tgl_masuk=?, id_barang=?, jumlah=? WHERE id_masuk=?");
    $stmtUpdate->bind_param("ssss", $tglMasuk, $barangIDBaru, $jumlahBaru, $masukID);
    $stmtUpdateStokBaru = $conn->prepare("UPDATE tb_barang SET stok = stok + ? WHERE id_barang = ?");
    $stmtUpdateStokBaru->bind_param("ss", $jumlahBaru, $barangIDBaru);
    $stmtUpdateStokLama = $conn->prepare("UPDATE tb_barang SET stok = stok - ? WHERE id_barang = ?");
    $stmtUpdateStokLama->bind_param("ss", $jumlahLama, $id_barang_lama);
    $conn->begin_transaction();

    try {
      $stmtUpdate->execute();
      $stmtUpdateStokLama->execute();
      $stmtUpdateStokBaru->execute();
      $conn->commit();

      echo "Data updated successfully";
    } catch (Exception $e) {
      $conn->rollback();
      echo "Error: " . $e->getMessage();
    }

    $stmtUpdate->close();
    $stmtUpdateStokBaru->close();
    $stmtUpdateStokLama->close();
  } else {
    echo "Data not found";
  }

  $stmtInfo->close();
}

$conn->close();
