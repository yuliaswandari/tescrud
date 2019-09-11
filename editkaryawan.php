<?php
  // memanggil file koneksi.php untuk membuat koneksi
  include 'config.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['No']))  {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $No = ($_GET["No"]);

    // menampilkan data mahasiswa dari database yang mempunyai id=$id
    $query = "SELECT * FROM karyawan WHERE No = '$No'";
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
  <body><table align="center">
    <tr><td>
    <h1>Edit Data Karyawan</h1>
    <div class="container">
      <form id="form_editkaryawan" action="proseseditkaryawan.php" method="post">
        <input type="hidden" name="No" value="<?php echo $No; ?>">
        <fieldset>
        <legend>Edit Data Karyawan</legend>
          <p>
            <label for="Nama">Nama : </label>
            <input type="text" name="Nama" id="Nama" value="<?php echo $Nama; ?>">
          </p>
          <p>
            <label for="Jenis Kelamin" >Jenis Kelamin : </label>
              <select name="Jenis_Kelamin" id="Jenis_Kelamin">
                <option value="Pria" <?php if($data['Jenis_Kelamin'] == 'Pria'){ echo 'selected'; } ?>>
                Pria </option>
                <option value="Wanita" <?php if($data['Jenis_Kelamin'] == 'Wanita'){ echo 'selected'; } ?>>
                Wanita</option>
              </select>
          </p>
          <p>
            <label for="Jabatan">Jabatan : </label>
            <input type="text" name="Jabatan" id="Jabatan" value="<?php echo $Jabatan; ?>">
          </p>
          <p >
            <label for="No_HP">Nomor HP : </label>
            <input type="text" name="No_HP" id="No_HP" value="<?php echo $No_HP; ?>">
          </p>
          <p >
             <label for="alamat">Alamat : </label>
            <textarea type="text" name="alamat" id="alamat"><?php echo $alamat; ?></textarea>
          </p>
        </fieldset>
      </form></div>
      <p><center>
          <input type="submit" name="editkaryawan" value="Update Data">
        </p>