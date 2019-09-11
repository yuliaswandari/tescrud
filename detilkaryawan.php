<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include 'config.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['No'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $No = ($_GET["No"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT * FROM karyawan WHERE No='$No'";
    $result = mysqli_query($link, $query);
    // mengecek apakah query gagal
    if(!$result){
      die ("Query Error: ".mysqli_errno($link).
         " - ".mysqli_error($link));
    }
    // mengambil data dari database dan membuat variabel" utk menampung data
    // variabel ini nantinya akan ditampilkan pada form
    $data = mysqli_fetch_assoc($result);
    $No = $data["No"];
    $Nama = $data["Nama"];
    $Jenis_Kelamin = $data["Jenis_Kelamin"];
    $Jabatan = $data["Jabatan"];
    $No_HP = $data["No_HP"];
    $alamat = $data["alamat"];

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
    <h1>Detil Data Karyawan</h1>
    <div class="container">
      <form id="form_detilkaryawan" action="edit.php" method="post">
        <input type="hidden" name="No" value="<?php echo $No; ?>">
        <fieldset>
        <legend>Detil Data Karyawan</legend>
          <p>
            <label for="Nama">Nama : </label>
            <?php echo $Nama; ?>
          </p>
          <p>
            <label for="Jenis Kelamin" >Jenis Kelamin : </label>
              <?php echo $Jenis_Kelamin; ?>
              </select>
          </p>
          <p>
            <label for="Jabatan">Jabatan : </label>
            <?php echo $Jabatan; ?>
          </p>
          <p >
            <label for="No_HP">Nomor HP : </label>
            <?php echo $No_HP; ?>
          </p>
          <p >
             <label for="alamat">Alamat : </label>
            <?php echo $alamat; ?>
          </p>
        </fieldset>
       
      </form>
  </div>
  </body>
</html>