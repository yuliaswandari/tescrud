<?php
  // memanggil file koneksi.php untuk melakukan koneksi database
  include 'config.php';
  include 'tanggal_indo.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <style>
      table{
        width: 840px;
        margin: auto;
      }
      h1{
        text-align: center;
      }
    </style>
  </head>
  <body>
  

    <h1>Kehadiran</h1>
    <center><a href="tambahkehadiran.php">Input Kehadiran &Gt; </a>&nbsp;&nbsp;&nbsp;<a href="tambahkaryawan.php">Input Karyawan &Gt; </a></center>
    <br/>
    <table border="1">
      <tr>
        <th>No</th>
        <th>Hari, Tanggal</th>
        <th>Nama</th>
        <th>Jam Datang</th>
        <th>Jam Pulang</th>
        <th>Jam Kerja</th>
        <th>Pilihan Kehadiran</th>
        <th>Detil Data Karyawan</th>
      </tr>
      <?php


      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT ka.No, Nama, Hari_tanggal, Jam_datang, Jam_pulang, (TIMEDIFF(Jam_pulang,Jam_datang)) as Jam_kerja
FROM karyawan ka
LEFT JOIN kehadiran ke USING(Nama) ORDER BY ke.Hari_tanggal DESC";
      $result = mysqli_query($link, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($link).
           " - ".mysqli_error($link));
      }

      //buat perulangan untuk element tabel dari data kehadiran
      $n = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($data = mysqli_fetch_assoc($result))
      {
        // mencetak / menampilkan data
        echo "<tr>";
        echo "<td><center>$n</td>"; //menampilkan no urut
        echo "<td><center>".tanggal_indo($data[Hari_tanggal])."</td>"; //menampilkan data nama
        echo "<td><center>$data[Nama]</td>"; //menampilkan data hari tanggal
        echo "<td><center>$data[Jam_datang]</td>"; //menampilkan data jam datang
        echo "<td><center>$data[Jam_pulang]</td>"; //menampilkan data jam pulang
        echo "<td><center>$data[Jam_kerja]</td>"; //menampilkan data jam kerja
        // membuat link untuk mengedit dan menghapus data
        echo '<td><center>
          <a href="editkehadiran.php?No='.$data['No'].'&Hari_tanggal='.$data['Hari_tanggal'].'">Edit</a> /
          <a href="hapuskehadiran.php?No='.$data['No'].'"
              onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a>
        </td>';
        echo '<td><center><a href="detilkaryawan.php?No='.$data['No'].'" onclick="window.open(&apos;&apos;, &apos;popupwindow&apos;, &apos;scrollbars=yes,width=550,height=520&apos;);return true" target="popupwindow">Lihat</a>/
        <a href="editkaryawan.php?No='.$data['No'].'">Edit</a>/<a href="hapuskaryawan.php?No='.$data['No'].'"
              onclick="return confirm(\'Anda yakin akan menghapus data?\')">Hapus</a></td>'; //menampilkan data jam kerja
        echo "</tr>";
        $n++; // menambah nilai nomor urut
      }
      ?>
    </table><br>
    <p><center>*Untuk karyawan yang belum ada Data Kehadiran tidak bisa Edit melainkan memasukkan Data dari Input Kehadiran.
    </p>
  </body>
</html>