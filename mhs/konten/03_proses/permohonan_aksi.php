<?php

$nim = $_POST['nim'];
$nama_instansi = $_POST['nama_instansi'];
$alamat_instansi = $_POST['alamat_instansi'];
$kebutuhan_instansi = $_POST['kebutuhan'];
$tipe = $_POST['tipe'];
if ($tipe == "SIK") {
  $judul_kp = $_POST['judul_kp'];
  $query = "SELECT max(id_surat_kp) as maxKode FROM surat_kp";
  $hasil = $mysqli->query($query);
  $data  = mysqli_fetch_array($hasil);
  $kodeTrans = $data['maxKode'];
  $noUrut = (int) substr($kodeTrans, 9, 4);
  $noUrut++;
  $char = "SKP".date("Ym");
  $id_surat = $char . sprintf("%04s", $noUrut);

  if (
    !empty($nim) AND
    !empty($nama_instansi) AND
    !empty($alamat_instansi) AND
    !empty($kebutuhan_instansi) AND
    !empty($judul_kp)
  ) {
        $queryupdate_surat = "INSERT INTO surat_kp
        (
          id_surat_kp,
          judul_kp,
          nim,
          nama_instansi,
          alamat_instansi,
          kebutuhan_instansi,
          status
        )
        VALUES
        (
          '$id_surat',
          '$judul_kp',
          '$nim',
          '$nama_instansi',
          '$alamat_instansi',
          '$kebutuhan_instansi',
          'Menunggu Konfirmasi'
        )
        ";
        $sqlupdate_surat = $mysqli->query($queryupdate_surat);
        ?>
          <script>
            alert('Data Berhasil Disimpan!');
            window.location.href="?p=permohonan_SIK";
          </script>
        <?php
    }
    else{
      ?>
        <script>
          alert('Mohon masukkan data dengan benar!');
          window.location.href="?p=permohonan_SIK";
        </script>
      <?php
    }
}
elseif ($tipe == "SIT") {
  $judul_ta = $_POST['judul_ta'];
  $query = "SELECT max(id_surat_ta) as maxKode FROM surat_ta";
  $hasil = $mysqli->query($query);
  $data  = mysqli_fetch_array($hasil);
  $kodeTrans = $data['maxKode'];
  $noUrut = (int) substr($kodeTrans, 9, 4);
  $noUrut++;
  $char = "STA".date("Ym");
  $id_surat = $char . sprintf("%04s", $noUrut);

  if (
    !empty($nim) AND
    !empty($nama_instansi) AND
    !empty($alamat_instansi) AND
    !empty($kebutuhan_instansi) AND
    !empty($judul_ta)
  ) {
        $queryupdate_surat = "INSERT INTO surat_ta
        (
          id_surat_ta,
          judul_ta,
          nim,
          nama_instansi,
          alamat_instansi,
          kebutuhan_instansi,
          status
        )
        VALUES
        (
          '$id_surat',
          '$judul_ta',
          '$nim',
          '$nama_instansi',
          '$alamat_instansi',
          '$kebutuhan_instansi',
          'Menunggu Konfirmasi'
        )
        ";
        $sqlupdate_surat = $mysqli->query($queryupdate_surat);
        ?>
          <script>
            alert('Data Berhasil Disimpan!');
            window.location.href="?p=permohonan_SIT";
          </script>
        <?php
    }
    else{
      ?>
        <script>
          alert('Mohon masukkan data dengan benar!');
          window.location.href="?p=permohonan_SIT";
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
