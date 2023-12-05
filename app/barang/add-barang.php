<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $idBarang = $_POST['id_barang'];
  $namaBarang = $_POST['nama'];
  $jenis = $_POST['jenis'];
  $satuan = $_POST['satuan'];
  $stok = $_POST['stok'];
  $harga = $_POST['harga'];

  $stmt = $conn->prepare("INSERT INTO tb_barang (id_barang, nama, jenis, satuan, stok, harga) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssii", $idBarang, $namaBarang, $jenis, $satuan, $stok, $harga);

  if ($stmt->execute()) {
    echo "Data added successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
