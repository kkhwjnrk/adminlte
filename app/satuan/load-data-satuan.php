<?php
include('../controller/koneksi.php');

$query = "SELECT * FROM tb_satuan";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  $no = 1;

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $row['id_satuan'] . "</td>";
    echo "<td>" . $row['satuan'] . "</td>";
    echo "<td>";
    echo "<button class='btn btn-secondary btn-sm btn-edit' data-toggle='modal' data-target='#edit-satuan' data-satuanid='" . $row['id_satuan'] . "'>Edit</button> ";
    echo "<button class='btn btn-danger btn-sm btn-delete' data-toggle='modal' data-target='#delete-satuan' data-satuanid='" . $row['id_satuan'] . "'>Hapus</button>";
    echo "</td>";
    echo "</tr>";

    $no++;
  }
} else {
  echo "<tr><td class='text-center' colspan='4'>Tidak ada data pengguna</td></tr>";
}

$conn->close();
