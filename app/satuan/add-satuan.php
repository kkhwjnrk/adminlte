<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $satuanID = $_POST['id_satuan'];
  $satuan = $_POST['satuan'];

  $stmt = $conn->prepare("INSERT INTO tb_satuan (id_satuan, satuan) VALUES (?, ?)");
  $stmt->bind_param("ss", $satuanID, $satuan);

  if ($stmt->execute()) {
    echo "Data added successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
