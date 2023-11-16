<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminlte";

try {
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    throw new Exception();
  }
} catch (Exception $e) {
  echo "Database belum konek cuy:)";
  die();
}
