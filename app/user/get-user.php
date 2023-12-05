<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $userID = $_GET['id_user'];

  $stmt = $conn->prepare("SELECT id_user, username, password, status FROM tb_user WHERE id_user = ?");
  $stmt->bind_param("s", $userID);
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
