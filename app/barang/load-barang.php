<?php
include('../controller/koneksi.php');

$query = "SELECT b.*, j.jenis, s.satuan 
          FROM tb_barang b
          INNER JOIN tb_jenis j ON b.jenis = j.id_jenis
          INNER JOIN tb_satuan s ON b.satuan = s.id_satuan
          ORDER BY create_date";

$result = $conn->query($query);

if ($result->num_rows > 0) {
  $no = 1;

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td class='text-center'><input type='checkbox' value='" . $row['id_barang'] . "'></td>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $row['id_barang'] . "</td>";
    echo "<td>" . $row['nama'] . "</td>";
    echo "<td>" . $row['jenis'] . "</td>";
    echo "<td>" . $row['satuan'] . "</td>";
    echo "<td>" . $row['stok'] . "</td>";
    echo "<td>" . $row['harga'] . "</td>";
    // echo "<td><button class='btn btn-secondary btn-sm btn-edit' data-toggle='modal' data-target='#edit-barang' data-barangid='" . $row['id_barang'] . "'>Edit</button></td>";
    echo "</tr>";

    $no++;
  }
} else {
  echo "<tr><td class='text-center' colspan='10'>Tidak ada data barang</td></tr>";
}

$conn->close();
