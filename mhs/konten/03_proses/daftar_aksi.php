<?php

$nim = $_POST['nim'];
$nama_instansi = $_POST['nama_instansi'];
$alamat_instansi = $_POST['alamat_instansi'];
//$id_dosen = $_POST['id_dosen'];
$tipe = $_POST['tipe'];
if ($tipe == "KP") {
  $judul_kp = $_POST['judul_kp'];
  $query = "SELECT max(id_jadwal_kp) as maxKode FROM jadwal_kp";
  $hasil = $mysqli->query($query);
  $data  = mysqli_fetch_array($hasil);
  $kodeTrans = $data['maxKode'];
  $noUrut = (int) substr($kodeTrans, 8, 4);
  $noUrut++;
  $char = "KP".date("Ym");
  $id = $char . sprintf("%04s", $noUrut);

  if (
    !empty($nim) AND
    !empty($nama_instansi) AND
    !empty($alamat_instansi)/* AND
    !empty($id_dosen) */AND
    !empty($judul_kp)
  ) {
        $queryupdate_jadwal = "INSERT INTO jadwal_kp
        (
          id_jadwal_kp,
          judul_kp,
          nim,
          nama_instansi,
          alamat_instansi,
          
          status
        )
        VALUES
        (
          '$id',
          '$judul_kp',
          '$nim',
          '$nama_instansi',
          '$alamat_instansi',
          
          'Menunggu'
        )
        ";
        $sqlupdate_jadwal = $mysqli->query($queryupdate_jadwal);
        ?>
          <script>
            alert('Data Berhasil Disimpan!');
            window.location.href="?p=KP_absen";
          </script>
        <?php
    }
    else{
      ?>
        <script>
          alert('Mohon masukkan data dengan benar!');
          window.location.href="?p=KP_daftar_baru";
        </script>
      <?php
    }
}
elseif ($tipe == "TA") {
  $judul_ta = $_POST['judul_ta'];
  $query = "SELECT max(id_jadwal_ta) as maxKode FROM jadwal_ta";
  $hasil = $mysqli->query($query);
  $data  = mysqli_fetch_array($hasil);
  $kodeTrans = $data['maxKode'];
  $noUrut = (int) substr($kodeTrans, 8, 4);
  $noUrut++;
  $char = "TA".date("Ym");
  $id = $char . sprintf("%04s", $noUrut);

  if (
    !empty($nim) AND
    !empty($nama_instansi) AND
    !empty($alamat_instansi) AND
    !empty($judul_ta)
  ) {
        $queryupdate_jadwal = "INSERT INTO jadwal_ta
        (
          id_jadwal_ta,
          judul_ta,
          nim,
          nama_instansi,
          
          alamat_instansi,
          status
        )
        VALUES
        (
          '$id',
          '$judul_ta',
          '$nim',
          '$nama_instansi',
          
          '$alamat_instansi',
          'Menunggu'
        )
        ";
        $sqlupdate_jadwal = $mysqli->query($queryupdate_jadwal);
        ?>
          <script>
            alert('Data Berhasil Disimpan!');
            window.location.href="?p=TA_absen";
          </script>
        <?php
    }
    else{
      ?>
        <script>
          alert('Mohon masukkan data dengan benar!');
          window.location.href="?p=TA_daftar_baru";
        </script>
      <?php
    }
}
  else {
    ?>
    <script>
    alert('Data TIDAK Berhasil Disimpan!');
    window.location.href="?p=profil";
    </script>
    <?php
  }




?>
