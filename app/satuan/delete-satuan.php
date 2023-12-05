<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $satuanID = $_POST['id_satuan'];

  $stmt = $conn->prepare("DELETE FROM tb_satuan WHERE id_satuan = ?");
  $stmt->bind_param("s", $satuanID);

  if ($stmt->execute()) {
    echo "Data deleted successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
