<?php
 
// koneksi ke mysql
include("config.php");
 
if (isset($_GET["No"])) {
$No = $_GET["No"];
 
// query hapus data berdasarkan ID
$query = "DELETE FROM karyawan WHERE No = $No";
$hasil_query = mysqli_query($link, $query);
 
// konfirmasi penghapusan
if ($hasil_query) echo "Data sudah terhapus";
 
// query untuk membaca semua data dengan sorting berdasarkan ID secara descending
// sorting descending ini untuk mengantisipasi record yang urutan ID nya tidak urut dalam setiap barisnya
// misal 1, 4, 2, 5, 3 
$query = "SELECT * FROM karyawan ORDER BY No";
$hasil_query = mysqli_query($link, $query);
 
// nilai awal increment
$no = 1;
 
while ($data  = mysql_fetch_array($hasil_query))
{
   // membaca id dari record yang tersisa dalam tabel
   $No = $data&#91;'id'&#93;;
   
   // proses updating id dengan nilai $no
   $query2 = "UPDATE karyawan SET No = $no WHERE No = $No";
   mysql_query($query2);
 
   // increment $no
   $no++;   
}
 
// mengubah nilai auto increment menjadi $no terakhir ditambah 1
$query = "ALTER TABLE karyawan  AUTO_INCREMENT = $no";
mysql_query($query); 
 }
  header("location:index.php");
?>