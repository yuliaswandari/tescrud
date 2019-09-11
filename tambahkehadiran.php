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
    <h1>Input Data</h1>
    <div class="container">
      <?php

  require_once 'config.php';

  $query = "SELECT * FROM karyawan ORDER BY Nama ASC";

  $result = mysqli_query($link, $query);

 ?>
      <form id="form_tambahkehadiran" action="prosestambahkehadiran.php" method="post">
        <fieldset>
        <legend>Input Data Kehadiran</legend>
          <p>
            <label for="Nama">Nama : </label>
            <select>
              <?php while($data = mysqli_fetch_assoc($result) ){?>

    <option value="<?php echo $data['Nama']; ?>"><?php echo $data['Nama']; ?></option>

   <?php } ?>
            </select>
          </p>
          <p>
            <label for="Hari_tanggal">Hari, Tanggal : </label>
               <input type="date" name="Hari_tanggal" id="Hari_tanggal">
          </p>
          <p>
           <label for="Jam_datang">Jam Datang : </label>
            <input type="time" name="Jam_datang" id="Jam_datang" >
          </p>
          <p>
            <label for="Jam_pulang">Jam Pulang : </label>
            <input type="time" name="Jam_pulang" id="Jam_pulang">
          </p>

        </fieldset>
        <p>
          <input type="submit" name="tambahkehadiran" value="Tambah Data">
        </p>
      </form>
    </div>
   
  </body>
</html>