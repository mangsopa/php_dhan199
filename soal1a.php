<?php
if (isset($_GET['jml'])) {
  // Mendapatkan nilai 'jml' dari URL
  $jml = $_GET['jml'];

  // Melakukan validasi jika nilai 'jml' bukan angka atau kosong
  if (!is_numeric($jml) || empty($jml)) {
    echo "Nilai 'jml' tidak valid";
    exit;
  }

  // Mengubah nilai 'jml' menjadi integer jika diperlukan
  $jml = (int) $jml;

  echo "<table border=1>\n";
  for ($a = 0; $a <= $jml; $a++) {
    $total = 0; // Menyimpan nilai total setiap baris
    echo "<tr>\n";
    for ($b = 1; $b <= $a; $b++) {
      echo "<td>$b</td>";
      $total += $b; // Menambahkan nilai ke total
    }
    echo "<td>Total: $total</td>"; // Menampilkan nilai total di atas baris
    echo "</tr>\n";
  }
  echo "</table>";
}
?>
