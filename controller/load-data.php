<?php
include('koneksi.php');

$query = "SELECT * FROM tb_user ORDER BY create_date";
$result = $conn->query($query);

if ($result->num_rows > 0) {
  $no = 1;

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $row['user_id'] . "</td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>";
    echo "<button class='btn btn-secondary btn-sm' data-toggle='modal' data-target='#edit-user' data-userid='" . $row['user_id'] . "'>Edit</button> ";
    echo "<button class='btn btn-danger btn-sm' data-userid='" . $row['user_id'] . "'>Hapus</button>";
    echo "</td>";

    echo "</td>";
    echo "</tr>";

    $no++;
  }
} else {
  echo "<tr><td class='text-center' colspan='6'>Tidak ada data pengguna</td></tr>";
}

$conn->close();
