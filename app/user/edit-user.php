<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userID = $_POST['id_user'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = $_POST['status'];

  $stmt = $conn->prepare("UPDATE tb_user SET username=?, password=?, status=? WHERE id_user=?");
  $stmt->bind_param("ssss", $username, $password, $status, $userID);

  if ($stmt->execute()) {
    echo "Data updated successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
