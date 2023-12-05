<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $barangIDs = explode(',', $_POST["id_barang"]);
  $placeholders = implode(',', array_fill(0, count($barangIDs), '?'));
  $query = "DELETE FROM tb_barang WHERE id_barang IN ($placeholders)";
  $stmt = $conn->prepare($query);
  $types = str_repeat('s', count($barangIDs));
  $stmt->bind_param($types, ...$barangIDs);

  if ($stmt->execute()) {
    echo "Data deleted successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
