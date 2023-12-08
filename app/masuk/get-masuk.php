<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $masukID = $_GET['id_masuk'];

  $stmt = $conn->prepare("SELECT id_masuk, tgl_masuk, id_barang, jumlah FROM tb_masuk WHERE id_masuk = ?");
  $stmt->bind_param("s", $masukID);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    echo json_encode($userData);
  } else {
    echo json_encode(array("status" => "error", "message" => "Data user tidak ditemukan."));
  }

  $stmt->close();
}

$conn->close();
