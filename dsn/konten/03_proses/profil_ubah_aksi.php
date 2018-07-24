<?php

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
      move_uploaded_file($file_tmp, 'img/'.$nama);

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
            window.location.href="?p=profil";
          </script>
        <?php
      }
      else{
        ?>
          <script>
            alert('Mohon masukkan password dengan benar!');
            window.location.href="?p=profil_ubah";
          </script>
        <?php
      }
    }
    else{
      ?>
        <script>
          alert('UKURAN FILE TERLALU BESAR!');
          window.location.href="?p=profil_ubah";
        </script>
      <?php
    }
  }
}
else {
  ?>
  <script>
  alert('Data TIDAK Berhasil Disimpan!');
  window.location.href="?p=profil_ubah";
  </script>
  <?php
}

?>
