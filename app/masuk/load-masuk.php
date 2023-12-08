<?php
include('../controller/koneksi.php');

$query = "SELECT tb_masuk.*, tb_barang.nama 
          FROM tb_masuk
          JOIN tb_barang ON tb_masuk.id_barang = tb_barang.id_barang";

$result = $conn->query($query);

if ($result->num_rows > 0) {
  $no = 1;

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $row['id_masuk'] . "</td>";
    echo "<td>" . $row['tgl_masuk'] . "</td>";
    echo "<td>" . $row['id_barang'] . "</td>";
    echo "<td>" . $row['nama'] . "</td>";
    echo "<td>" . $row['jumlah'] . "</td>";
    echo "<td>";
    echo "<button class='btn btn-secondary btn-sm btn-edit' data-toggle='modal' data-target='#edit-masuk' data-masukid='" . $row['id_masuk'] . "'>Edit</button> ";
    echo "<button class='btn btn-danger btn-sm btn-delete' data-toggle='modal' data-target='#delete-masuk' data-masukid='" . $row['id_masuk'] . "'>Hapus</button>";
    echo "</td>";
    echo "</tr>";

    $no++;
  }
} else {
  echo "<tr><td class='text-center' colspan='7'>Tidak ada data barang masuk</td></tr>";
}

$conn->close();
