<?php
if (!empty($_POST['tipe'])) {
  $tipe = $_POST['tipe'];
}
else {
  ?>
  <script>
  alert('Data TIDAK Berhasil Disimpan!');
  window.location.href="?p=profil_ubah";
  </script>
  <?php
}
if ($tipe == "dosen") {
  $id_dosen = $_POST['id_dosen'];
  $nama_dosen = $_POST['nama_dosen'];
  $email_dosen = $_POST['email_dosen'];
  $tempat_lahir_dosen = $_POST['tempat_lahir_dosen'];
  $tanggal_lahir_dosen = $_POST['tanggal_lahir_dosen'];
  $agama_dosen = $_POST['agama_dosen'];
  $alamat_dosen = $_POST['alamat_dosen'];
  $jk_dosen = $_POST['jk_dosen'];
  $password = $_POST['password'];
  $konfirmasi_password = $_POST['konfirmasi_password'];

  if (
    !empty($id_dosen) AND
    !empty($nama_dosen) AND
    !empty($email_dosen) AND
    !empty($tempat_lahir_dosen) AND
    !empty($tanggal_lahir_dosen) AND
    !empty($agama_dosen) AND
    !empty($alamat_dosen) AND
    !empty($jk_dosen) AND
    !empty($password)
  ) {
    $ekstensi_diperbolehkan	= array('png','jpg');
    $nama = $_FILES['foto_dosen']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['foto_dosen']['size'];
    $file_tmp = $_FILES['foto_dosen']['tmp_name'];
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 1044070){
        move_uploaded_file($file_tmp, '../dsn/img/'.$nama);

        if ($password == $konfirmasi_password) {

          $queryupdate_dosen = "UPDATE dosen SET
            nama_dosen = '$nama_dosen',
            email_dosen = '$email_dosen',
            tempat_lahir_dosen = '$tempat_lahir_dosen',
            tanggal_lahir_dosen = '$tanggal_lahir_dosen',
            agama_dosen = '$agama_dosen',
            alamat_dosen = '$alamat_dosen',
            jk_dosen = '$jk_dosen',
            foto_dosen = '$nama',
            password_dosen = '$password' WHERE id_dosen = '$id_dosen'";
          $sqlupdate_dosen = $mysqli->query($queryupdate_dosen);
          ?>
            <script>
              alert('Data Berhasil Disimpan!');
              window.location.href="?p=user_tools&user=dosen&id=<?php echo $id_dosen; ?>&act=detail";
            </script>
          <?php
        }
        else{
          ?>
            <script>
              alert('Mohon masukkan password dengan benar!');
              window.location.href="?p=user_tools&user=dosen&id=<?php echo $id_dosen; ?>&act=ubah";
            </script>
          <?php
        }
      }
      else{
        ?>
          <script>
            alert('UKURAN FILE TERLALU BESAR!');
            window.location.href="?p=user_tools&user=dosen&id=<?php echo $id_dosen; ?>&act=ubah";
          </script>
        <?php
      }
    }
  }
  else {
    ?>
    <script>
    alert('Data TIDAK Berhasil Disimpan!');
    window.location.href="?p=user_tools&user=dosen&id=<?php echo $id_dosen; ?>&act=ubah";
    </script>
    <?php
  }
}
elseif ($tipe == "mhs") {
  $nim = $_POST['nim'];
  $nama_mahasiswa = $_POST['nama_mahasiswa'];
  $email_mahasiswa = $_POST['email_mahasiswa'];
  $tempat_lahir_mahasiswa = $_POST['tempat_lahir_mahasiswa'];
  $tanggal_lahir_mahasiswa = $_POST['tanggal_lahir_mahasiswa'];
  $agama_mahasiswa = $_POST['agama_mahasiswa'];
  $alamat_mahasiswa = $_POST['alamat_mahasiswa'];
  $jk_mahasiswa = $_POST['jk_mahasiswa'];
  $telepon_mahasiswa = $_POST['telepon_mahasiswa'];
  $password = $_POST['password'];
  $konfirmasi_password = $_POST['konfirmasi_password'];

  if (
    !empty($nim) AND
    !empty($nama_mahasiswa) AND
    !empty($email_mahasiswa) AND
    !empty($tempat_lahir_mahasiswa) AND
    !empty($tanggal_lahir_mahasiswa) AND
    !empty($agama_mahasiswa) AND
    !empty($alamat_mahasiswa) AND
    !empty($jk_mahasiswa) AND
    !empty($telepon_mahasiswa) AND
    !empty($password)
  ) {
    $ekstensi_diperbolehkan	= array('png','jpg');
    $nama = $_FILES['foto_mahasiswa']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['foto_mahasiswa']['size'];
    $file_tmp = $_FILES['foto_mahasiswa']['tmp_name'];
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
      if($ukuran < 1044070){
        move_uploaded_file($file_tmp, '../mhs/img/'.$nama);
        if ($password == $konfirmasi_password) {

          $queryupdate_mahasiswa = "UPDATE mahasiswa SET
            nama_mahasiswa = '$nama_mahasiswa',
            email_mahasiswa = '$email_mahasiswa',
            tempat_lahir_mahasiswa = '$tempat_lahir_mahasiswa',
            tanggal_lahir_mahasiswa = '$tanggal_lahir_mahasiswa',
            agama_mahasiswa = '$agama_mahasiswa',
            alamat_mahasiswa = '$alamat_mahasiswa',
            jk_mahasiswa = '$jk_mahasiswa',
            telepon_mahasiswa = '$telepon_mahasiswa',
            foto_mahasiswa = '$nama',
            password_mahasiswa = '$password' WHERE nim = '$nim'";
          $sqlupdate_mahasiswa = $mysqli->query($queryupdate_mahasiswa);
          ?>
            <script>
              alert('Data Berhasil Disimpan!');
              window.location.href="?p=user_tools&user=mhs&id=<?php echo $nim; ?>&act=detail";
            </script>
          <?php
        }
        else{
          ?>
            <script>
              alert('Mohon masukkan password dengan benar!');
              window.location.href="?p=user_tools&user=mhs&id=<?php echo $nim; ?>&act=ubah";
            </script>
          <?php
        }
      }
      else{
        ?>
          <script>
            alert('UKURAN FILE TERLALU BESAR!');
            window.location.href="?p=user_tools&user=mhs&id=<?php echo $nim; ?>&act=ubah";
          </script>
        <?php
      }
    }
    else{
      ?>
        <script>
          alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!');
          window.location.href="?p=user_tools&user=mhs&id=<?php echo $nim; ?>&act=ubah";
        </script>
      <?php
    }
  }
  else {
    ?>
    <script>
    alert('Data TIDAK Berhasil Disimpan!');
    window.location.href="?p=user_tools&user=mhs&id=<?php echo $nim; ?>&act=ubah";
    </script>
    <?php
  }
}


?>
