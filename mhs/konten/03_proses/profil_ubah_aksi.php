<?php

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
      move_uploaded_file($file_tmp, 'img/'.$nama);
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
  else{
    ?>
      <script>
        alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN!');
        window.location.href="?p=profil_ubah";
      </script>
    <?php
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
