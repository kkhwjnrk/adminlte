<?php
include('../controller/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $barangID = $_POST["id_barang"];
  $namaBarang = $_POST["nama"];
  $jenisBarang = $_POST["jenis"];
  $satuan = $_POST["satuan"];
  $stok = $_POST["stok"];
  $harga = $_POST["harga"];

  $stmt = $conn->prepare("UPDATE tb_barang SET nama = ?, jenis = ?, satuan = ?, stok = ?, harga = ? WHERE id_barang = ?");
  $stmt->bind_param("ssssss", $namaBarang, $jenisBarang, $satuan, $stok, $harga, $barangID);

  if ($stmt->execute()) {
    echo "Data updated successfully";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}

$conn->close();
