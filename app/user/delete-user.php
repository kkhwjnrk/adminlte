<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userID = $_POST['id_user'];

  $stmt = $conn->prepare("DELETE FROM tb_user WHERE id_user = ?");
  $stmt->bind_param("s", $userID);

  if ($stmt->execute()) {
    echo "Data deleted successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
