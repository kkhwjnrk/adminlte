<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $satuanID = $_GET['id_satuan'];

  $stmt = $conn->prepare("SELECT id_satuan, satuan FROM tb_satuan WHERE id_satuan = ?");
  $stmt->bind_param("s", $satuanID);
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
