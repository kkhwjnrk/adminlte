<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $userID = $_POST['user_id'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = $_POST['status'];

  error_log(print_r($_POST, true));
  $stmt = $conn->prepare("INSERT INTO tb_user (user_id, username, password, status) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $userID, $username, $password, $status);

  if ($stmt->execute()) {
    echo "Data added successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
