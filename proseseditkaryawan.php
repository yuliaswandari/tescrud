<?php
// mengecek apakah tombol edit telah diklik
if (isset($_POST['editkaryawan'])) {
  // buat koneksi dengan database
  include("config.php");

  // membuat variabel untuk menampung data dari form edit
  $No = $_POST['No'];
  $Nama = $_POST['Nama'];
	$Jenis_Kelamin	= $_POST['Jenis_Kelamin'];
	$Jabatan	= $_POST['Jabatan'];
	$No_HP = $_POST['No_HP'];
	$alamat = $_POST['alamat'];

  //buat dan jalankan query UPDATE
  $query  = "UPDATE karyawan SET ";
  $query .= "No = '$No', Nama = '$Nama', ";
  $query .= "Jenis_Kelamin='$Jenis_Kelamin', ";
  $query .= "Jabatan = '$Jabatan', ";
  $query .= "alamat='$alamat' ";
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