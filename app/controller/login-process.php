<?php
session_start();
include('./koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM tb_user WHERE username = ? AND password = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("ss", $username, $password);

  if ($stmt->execute()) {
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $user = $result->fetch_assoc();
      $_SESSION['username'] = $username;
      $_SESSION['create_date'] = $user['create_date'];

      echo "Login success";
    } else {
      echo "Login failed";
    }
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
