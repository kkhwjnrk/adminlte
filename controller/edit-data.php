<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userID = $_POST['user_id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = $_POST['status'];

  $stmt = $conn->prepare("UPDATE tb_user SET username=?, password=?, status=? WHERE user_id=?");
  $stmt->bind_param("ssss", $username, $password, $status, $userID);

  if ($stmt->execute()) {
    echo "Data updated successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
