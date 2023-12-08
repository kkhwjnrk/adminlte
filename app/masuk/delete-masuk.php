<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $masukID = $_POST['id_masuk'];

  $stmtInfo = $conn->prepare("SELECT id_barang, jumlah FROM tb_masuk WHERE id_masuk = ?");
  $stmtInfo->bind_param("s", $masukID);
  $stmtInfo->execute();
  $resultInfo = $stmtInfo->get_result();

  if ($resultInfo->num_rows > 0) {
    $rowInfo = $resultInfo->fetch_assoc();
    $id_barang = $rowInfo['id_barang'];
    $jumlah = $rowInfo['jumlah'];

    $stmtDelete = $conn->prepare("DELETE FROM tb_masuk WHERE id_masuk = ?");
    $stmtDelete->bind_param("s", $masukID);
    $stmtUpdateStok = $conn->prepare("UPDATE tb_barang SET stok = stok - ? WHERE id_barang = ?");
    $stmtUpdateStok->bind_param("ss", $jumlah, $id_barang);
    $conn->begin_transaction();

    try {
      $stmtDelete->execute();
      $stmtUpdateStok->execute();
      $conn->commit();
      echo "Data deleted successfully";
    } catch (Exception $e) {
      $conn->rollback();
      echo "Error: " . $e->getMessage();
    }

    $stmtDelete->close();
    $stmtUpdateStok->close();
  } else {
    echo "Data not found";
  }

  $stmtInfo->close();
}

$conn->close();
