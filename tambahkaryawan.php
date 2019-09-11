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
      <form id="form_karyawan" action="prosestambahkaryawan.php" method="post">
        <fieldset>
        <legend>Input Data Karyawan</legend>
          <p>
            <label for="Nama">Nama : </label>
            <input type="text" name="Nama" id="Nama" placeholder="nama karyawan">
          </p>
          <p>
            <label for="Jenis_Kelamin">Jenis Kelamin : </label>
              <select name="Jenis_Kelamin" id="Jenis_Kelamin">
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
          </p>
          <p>
           <label for="Jabatan">Jabatan : </label>
            <input type="text" name="Jabatan" id="Jabatan" placeholder="jabatan karyawan">
          </p>
          <p>
            <label for="No_HP">Nomor HP : </label>
            <input type="text" name="No_HP" id="No_HP">
          </p>
          <p >
            <label for="alamat">Alamat : </label>
            <textarea type="text" name="alamat" id="alamat" placeholder="alamat karyawan"></textarea>
          </p>

        </fieldset>
        <p>
          <input type="submit" name="tambah" value="Tambah Data">
        </p>
      </form>
    </div>
  </body>
</html>