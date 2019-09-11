<?php
// buka koneksi dengan MySQL
  include("config.php");

  //mengecek apakah di url ada GET id
  if (isset($_GET["No"])) {

    // menyimpan variabel id dari url ke dalam variabel $id
    $No = $_GET["No"];

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM kehadiran WHERE No='$No' ";
    $hasil_query = mysqli_query($link, $query);

    //periksa query, apakah ada kesalahan
    if(!$hasil_query) {
      die ("Gagal menghapus data: ".mysqli_errno($link).
           " - ".mysqli_error($link));
    }
  }
  // melakukan redirect ke halaman index.php
  header("location:index.php");
?>

