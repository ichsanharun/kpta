<?php
$query_notif_surat_kp = "SELECT * FROM surat_kp WHERE status = 'Disetujui' AND notif = 'Tertutup' order by id_surat_kp asc LIMIT 4";
$sql_notif_surat_kp = mysqli_query($mysqli,$query_notif_surat_kp);
$query_notif_surat_ta = "SELECT * FROM surat_ta WHERE status = 'Disetujui' AND notif = 'Tertutup' order by id_surat_ta asc LIMIT 4";
$sql_notif_surat_ta = mysqli_query($mysqli,$query_notif_surat_ta);

$query_alert_kp = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`status` = 'Menunggu'";
$sql_alert_kp = mysqli_query($mysqli,$query_alert_kp);

$query_alert_ta = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`status` = 'Menunggu'";
$sql_alert_ta = mysqli_query($mysqli,$query_alert_ta);

$alert_skp = mysqli_num_rows($sql_notif_surat_kp);
$alert_sta = mysqli_num_rows($sql_notif_surat_ta);

$alert_jkp = mysqli_num_rows($sql_alert_kp);
$alert_jta = mysqli_num_rows($sql_alert_ta);
/* END OF ALERT MHS
 *
 *
 */
$query_profil = "SELECT * FROM mahasiswa INNER JOIN jurusan ON `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE nim = '$_SESSION[id]' order by `mahasiswa`.`kode_jurusan` asc";
$sql_profil = mysqli_query($mysqli,$query_profil);

$query_daftar_kp = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `mahasiswa`.`nim` = `surat_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_kp`.`nim` = '$_SESSION[id]' AND `surat_kp`.`status` = 'Disetujui'";
$sql_daftar_kp = mysqli_query($mysqli,$query_daftar_kp);

$query_daftar_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN surat_ta ON `mahasiswa`.`nim` = `surat_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_ta`.`nim` = '$_SESSION[id]' AND `surat_ta`.`status` = 'Disetujui'";
$sql_daftar_ta = mysqli_query($mysqli,$query_daftar_ta);

$query_profil_kp = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]'";
$sql_profil_kp = mysqli_query($mysqli,$query_profil_kp);

$query_profil_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]'";
$sql_profil_ta = mysqli_query($mysqli,$query_profil_ta);

$query_surat_kp = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_kp`.`nim` = '$_SESSION[id]'";
$sql_surat_kp = mysqli_query($mysqli,$query_surat_kp);

$query_surat_ta = "SELECT * FROM surat_ta INNER JOIN mahasiswa INNER JOIN jurusan ON `mahasiswa`.`nim` = `surat_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_ta`.`nim` = '$_SESSION[id]'";
$sql_surat_ta = mysqli_query($mysqli,$query_surat_ta);

if (!empty($_GET['skp'])) {
  $query_surat_kp_id = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_kp`.`nim` = '$_SESSION[id]' AND `surat_kp`.`id_surat_kp` = '$_GET[skp]' ";
  $sql_surat_kp_id = mysqli_query($mysqli,$query_surat_kp_id);
}

if (!empty($_GET['sta'])) {
  $query_surat_ta_id = "SELECT * FROM surat_ta INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_ta`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_ta`.`nim` = '$_SESSION[id]' AND `surat_ta`.`id_surat_ta` = '$_GET[sta]' ";
  $sql_surat_ta_id = mysqli_query($mysqli,$query_surat_ta_id);
}

$query_surat_kp = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_kp`.`nim` = '$_SESSION[id]'";
$sql_surat_kp = mysqli_query($mysqli,$query_surat_kp);

if (!empty($_GET['id_kp'])) {
  $query_absen_kp = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN absen_kp_detail INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_kp`.`id_jadwal_kp` = `absen_kp_detail`.`id_jadwal_kp` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]' AND `absen_kp_detail`.`id_jadwal_kp` = '$_GET[id_kp]'";
  $sql_absen_kp = mysqli_query($mysqli,$query_absen_kp);
  $query_jadwal_kp = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]' AND `jadwal_kp`.`id_jadwal_kp` = '$_GET[id_kp]'";
  $sql_jadwal_kp = mysqli_query($mysqli,$query_jadwal_kp);
}
elseif (!empty($_GET['id_ta'])) {
  $query_absen_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN absen_ta_detail INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_ta`.`id_jadwal_ta` = `absen_ta_detail`.`id_jadwal_ta` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]' AND `absen_ta_detail`.`id_jadwal_ta` = '$_GET[id_ta]'";
  $sql_absen_ta = mysqli_query($mysqli,$query_absen_ta);
  $query_jadwal_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]' AND `jadwal_ta`.`id_jadwal_ta` = '$_GET[id_ta]'";
  $sql_jadwal_ta = mysqli_query($mysqli,$query_jadwal_ta);
}

$query_dosen = "SELECT * FROM dosen";
$sql_dosen = mysqli_query($mysqli,$query_dosen);

$query_admin = "SELECT * FROM admin";
$sql_admin = mysqli_query($mysqli,$query_admin);


?>
