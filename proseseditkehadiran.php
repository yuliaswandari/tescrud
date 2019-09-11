<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['editkehadiran'])) {
  // buat koneksi dengan database
  include("config.php");

  // membuat variabel untuk menampung data dari form edit
  $No = $_POST['No'];
  $Nama = $_POST['Nama'];
	$Hari_tanggal	= $_POST['Hari_tanggal'];
	$Jam_datang	= $_POST['Jam_datang'];
	$Jam_pulang = $_POST['Jam_pulang'];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE kehadiran SET ";
  $query .= "No = '$No', Nama = '$Nama', ";
  $query .= "Hari_tanggal='$Hari_tanggal', ";
  $query .= "Jam_datang = '$Jam_datang', ";
  $query .= "Jam_pulang='$Jam_pulang' ";
  $query .= "WHERE No = '$No'";

  $result = mysqli_query($link, $query);

  //periksa hasil query apakah ada error
  if(!$result) {
    die ("Query gagal dijalankan: ".mysqli_errno($link).
       " - ".mysqli_error($link));
  }
}

//lakukan redirect ke halaman index.php
header("location:index.php");

?>