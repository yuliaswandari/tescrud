<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'config.php';

// mengecek apakah tombol input dari form telah diklik
if (isset($_POST['tambah'])) {

	// membuat variabel untuk menampung data dari form
	$Nama = $_POST['Nama'];
  $Jenis_Kelamin = $_POST['Jenis_Kelamin'];
  $Jabatan = $_POST['Jabatan'];
  $No_HP = $_POST['No_HP'];
  $alamat = $_POST['alamat'];

  // jalankan query INSERT untuk menambah data ke database
  $query = "INSERT INTO karyawan VALUES (NULL, '$Nama', '$Jenis_Kelamin', '$Jabatan','$No_HP','$alamat')";
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