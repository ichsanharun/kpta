<?php
$query_profil = "SELECT * FROM mahasiswa INNER JOIN jurusan ON `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE nim = '$_SESSION[id]' order by `mahasiswa`.`kode_jurusan` asc";
$sql_profil = mysqli_query($mysqli,$query_profil);

$query_daftar_kp = "SELECT * FROM surat_kp WHERE nim = '$_SESSION[id]' AND status = 'Disetujui'";
$sql_daftar_kp = mysqli_query($mysqli,$query_daftar_kp);

$query_daftar_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN surat_ta INNER JOIN jadwal_ta INNER JOIN dosen ON `mahasiswa`.`nim` = `surat_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`nim` = `mahasiswa`.`nim` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `surat_ta`.`nim` = '$_SESSION[id]' AND `surat_ta`.`status` = 'Disetujui'";
$sql_daftar_ta = mysqli_query($mysqli,$query_daftar_ta);

$query_profil_kp = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]'";
$sql_profil_kp = mysqli_query($mysqli,$query_profil_kp);

$query_profil_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]'";
$sql_profil_ta = mysqli_query($mysqli,$query_profil_ta);

$query_surat_kp = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_kp`.`nim` = '$_SESSION[id]'";
$sql_surat_kp = mysqli_query($mysqli,$query_surat_kp);

$query_surat_ta = "SELECT * FROM surat_ta INNER JOIN mahasiswa INNER JOIN jurusan ON `mahasiswa`.`nim` = `surat_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_ta`.`nim` = '$_SESSION[id]'";
$sql_surat_ta = mysqli_query($mysqli,$query_surat_ta);

$query_surat_kp = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_kp`.`nim` = '$_SESSION[id]'";
$sql_surat_kp = mysqli_query($mysqli,$query_surat_kp);

if (!empty($_GET['id_kp'])) {
  $query_absen_kp = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN jadwal_kp_detail INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_kp`.`id_jadwal_kp` = `jadwal_kp_detail`.`id_jadwal_kp` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]' AND `jadwal_kp_detail`.`id_jadwal_kp` = '$_GET[id_kp]'";
  $sql_absen_kp = mysqli_query($mysqli,$query_absen_kp);
  $query_jadwal_kp = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]' AND `jadwal_kp`.`id_jadwal_kp` = '$_GET[id_kp]'";
  $sql_jadwal_kp = mysqli_query($mysqli,$query_jadwal_kp);
}
elseif (!empty($_GET['id_ta'])) {
  $query_absen_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN jadwal_ta_detail INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_ta`.`id_jadwal_ta` = `jadwal_ta_detail`.`id_jadwal_ta` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]' AND `jadwal_ta_detail`.`id_jadwal_ta` = '$_GET[id_ta]'";
  $sql_absen_ta = mysqli_query($mysqli,$query_absen_ta);
  $query_jadwal_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]' AND `jadwal_ta`.`id_jadwal_ta` = '$_GET[id_ta]'";
  $sql_jadwal_ta = mysqli_query($mysqli,$query_jadwal_ta);
}

$query_dosen = "SELECT * FROM dosen";
$sql_dosen = mysqli_query($mysqli,$query_dosen);

$query_admin = "SELECT * FROM admin";
$sql_admin = mysqli_query($mysqli,$query_admin);

$query_keluhan = "SELECT * FROM keluhan";
$sql_keluhan = mysqli_query($mysqli,$query_keluhan);
if (!empty($_GET['kel']) ) {
  $id_keluh = $_GET['kel'];
  $querydetail_keluhan = "SELECT * FROM keluhan WHERE ID = '$id_keluh'";
  $sqldetail_keluhan = mysqli_query($mysqli,$querydetail_keluhan);
}

  if (!empty($_GET['id_adm'])) {
    $id = $_GET['id_adm'];
    $queryedit_admin = "SELECT * FROM admin WHERE id_admin = '$id' order by id_admin asc";
    $sqledit_admin = $mysqli->query($queryedit_admin);
  }
?>
