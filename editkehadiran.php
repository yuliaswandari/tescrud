<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include 'config.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['No']) AND isset($_GET['Hari_tanggal']))  {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $No = ($_GET["No"]);
    $Hari_tanggal = ($_GET["Hari_tanggal"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT * FROM karyawan ka JOIN kehadiran ke USING(Nama) WHERE ke.Hari_tanggal = '$Hari_tanggal' AND ka.No = '$No'";
    $result = mysqli_query($link, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $Nama = $data["Nama"];
    $Hari_tanggal = $data["Hari_tanggal"];
    $Jam_datang = $data["Jam_datang"];
    $Jam_pulang = $data["Jam_pulang"];

  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    header("location:index.php");
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      h1{
        text-align: center;
      }
      .container{
        width: 400px;
        margin: auto;
      }
    </style>
  </head>
  <body>
          <h1>Edit Data Kehadiran</h1>
    <div class="container">
      <form id="form_editkehadiran" action="proseseditkehadiran.php" method="post">
        <input type="hidden" name="No" value="<?php echo $No; ?>">
        <fieldset>
        <legend>Edit Data Kehadiran</legend>
          <p>
            <label for="Nama">Nama : </label>
            <?php echo $Nama; ?>
          </p>
          <p>
            <label for="Hari_tanggal" >Hari, Tanggal : </label>
              <input type="text" name="Hari_tanggal" id="Hari_tanggal" value="<?php echo $Hari_tanggal; ?>">
          </p>
          <p>
            <label for="Jam_datang">Jam Datang : </label>
            <input type="text" name="Jam_datang" id="Jam_datang" value="<?php echo $Jam_datang; ?>">
          </p>
          <p >
            <label for="Jam_pulang">Jam Pulang : </label>
            <input type="text" name="Jam_pulang" id="Jam_pulang" value="<?php echo $Jam_pulang; ?>">
          </p>
         
        </fieldset>
      </form></div>
        <p><center>
          <input type="submit" name="editkehadiran" value="Update Data">
        </p>
      
  
  </body>
</html>