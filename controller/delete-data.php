<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userID = $_POST['user_id'];

  $stmt = $conn->prepare("DELETE FROM tb_user WHERE user_id = ?");
  $stmt->bind_param("s", $userID);

  if ($stmt->execute()) {
    echo "Data deleted successfully";
  } else {
    echo json_encode(array("status" => "error", "message" => "Gagal menghapus data. " . $stmt->error));
  }

  $stmt->close();
}

$conn->close();
