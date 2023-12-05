<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $satuanID = $_POST['id_satuan'];
  $satuan = $_POST['satuan'];

  $stmt = $conn->prepare("UPDATE tb_satuan SET satuan=? WHERE id_satuan=?");
  $stmt->bind_param("ss", $satuan, $satuanID);

  if ($stmt->execute()) {
    echo "Data updated successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
