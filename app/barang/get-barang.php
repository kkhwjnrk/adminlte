<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $IdBarang = $_GET['id_barang'];

  $stmt = $conn->prepare("SELECT id_barang, nama, jenis, satuan, stok, harga FROM tb_barang WHERE id_barang = ?");
  $stmt->bind_param("s", $IdBarang);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    echo json_encode($userData);
  } else {
    echo json_encode(array("status" => "error", "message" => "Data barang tidak ditemukan."));
  }

  $stmt->close();
}

$conn->close();
