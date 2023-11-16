<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $userID = $_GET['user_id'];

  $stmt = $conn->prepare("SELECT user_id, username, password, status FROM tb_user WHERE user_id = ?");
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
