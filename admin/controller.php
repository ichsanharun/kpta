<?php

$query_notif_surat_kp = "SELECT * FROM surat_kp WHERE status = 'Menunggu Konfirmasi' order by id_surat_kp asc LIMIT 4";
$sql_notif_surat_kp = mysqli_query($mysqli,$query_notif_surat_kp);
$query_notif_surat_ta = "SELECT * FROM surat_ta WHERE status = 'Menunggu Konfirmasi' order by id_surat_ta asc LIMIT 4";
$sql_notif_surat_ta = mysqli_query($mysqli,$query_notif_surat_ta);

if (!empty($_GET['nim'])) {
  $query_profil = "SELECT * FROM mahasiswa INNER JOIN jurusan ON `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE nim = '$_GET[nim]' order by `mahasiswa`.`kode_jurusan` asc";
  $sql_profil = mysqli_query($mysqli,$query_profil);

  $query_profil_surat_kp = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_kp`.`nim` = '$_GET[nim]'";
  $sql_profil_surat_kp = mysqli_query($mysqli,$query_profil_surat_kp);

  $query_profil_surat_ta = "SELECT * FROM surat_ta INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_ta`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_ta`.`nim` = '$_GET[nim]'";
  $sql_profil_surat_ta = mysqli_query($mysqli,$query_profil_surat_ta);

}

$query_profil_kp = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]'";
$sql_profil_kp = mysqli_query($mysqli,$query_profil_kp);

$query_profil_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]'";
$sql_profil_ta = mysqli_query($mysqli,$query_profil_ta);

$query_surat_kp = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` ";
$sql_surat_kp = mysqli_query($mysqli,$query_surat_kp);


$query_surat_ta = "SELECT * FROM surat_ta INNER JOIN mahasiswa INNER JOIN jurusan ON `mahasiswa`.`nim` = `surat_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` ";
$sql_surat_ta = mysqli_query($mysqli,$query_surat_ta);

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

$query_jabatan = "SELECT * FROM jabatan";
$sql_jabatan = mysqli_query($mysqli,$query_jabatan);
if (!empty($_GET['idjab'])) {
  $idjab = $_GET['idjab'];
  $queryedit_jabatan = "SELECT * FROM jabatan WHERE id_jabatan = '$idjab' order by id_jabatan asc";
  $sqledit_jabatan = $mysqli->query($queryedit_jabatan);
}

$query_keluhan = "SELECT * FROM keluhan";
$sql_keluhan = mysqli_query($mysqli,$query_keluhan);
if (!empty($_GET['kel']) ) {
  $id_keluh = $_GET['kel'];
  $querydetail_keluhan = "SELECT * FROM keluhan WHERE ID = '$id_keluh'";
  $sqldetail_keluhan = mysqli_query($mysqli,$querydetail_keluhan);
}
$query_penggajian = "SELECT * FROM slip_gaji INNER JOIN karyawan ON `slip_gaji`.`id_karyawan` = `karyawan`.`id_karyawan`";
$sql_penggajian = mysqli_query($mysqli,$query_penggajian);

if ((!empty($_GET['id'])) OR (!empty($_POST['id_karyawan']))) {
  if (!empty($_GET['id'])) {
    $id = $_GET['id'];
  }
  elseif (!empty($_POST['id_karyawan'])) {
    $id = $_POST['id_karyawan'];
  }
  $queryedit_karyawan = "SELECT * FROM karyawan INNER JOIN jabatan ON `karyawan`.`id_jabatan` = `jabatan`.`id_jabatan` WHERE `karyawan`.`id_karyawan` = '$id' order by id_karyawan asc";
  $sqledit_karyawan = $mysqli->query($queryedit_karyawan);
  $queryedit_pimpinan = "SELECT * FROM pimpinan WHERE id_pimpinan = '$id' order by id_pimpinan asc";
  $sqledit_pimpinan = $mysqli->query($queryedit_pimpinan);
}


  if (!empty($_GET['id_adm'])) {
    $id = $_GET['id_adm'];
    $queryedit_admin = "SELECT * FROM admin WHERE id_admin = '$id' order by id_admin asc";
    $sqledit_admin = $mysqli->query($queryedit_admin);
  }



$queryabsen = "SELECT * FROM `absensi` INNER JOIN `karyawan` ON `absensi`.`id_karyawan` = `karyawan`.`id_karyawan` WHERE `absensi`.`tanggal_absensi` like '%-06-%'";
$sql_absensi = mysqli_query($mysqli,$queryabsen);
?>
