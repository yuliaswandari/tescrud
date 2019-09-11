<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'config.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['tambahkehadiran'])) {

	// membuat variabel untuk menampung data dari form
	$Nama = $_POST['Nama'];
  $Hari_tanggal = $_POST['Hari_tanggal'];
  $Jam_datang = $_POST['Jam_datang'];
  $Jam_pulang = $_POST['Jam_pulang'];

  // jalankan query INSERT untuk menambah data ke database
  $query = "INSERT INTO kehadiran VALUES (NULL, '$Nama', '$Hari_tanggal', '$Jam_datang','$Jam_pulang')";
  $result = mysqli_query($link, $query);
  // periska query apakah ada error
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($link).
           " - ".mysqli_error($link));
  }
}

// melakukan redirect (mengalihkan) ke halaman index.php
header("location:index.php");
?>