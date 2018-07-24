<?php

$query_notif_surat_kp = "SELECT * FROM surat_kp WHERE status = 'Menunggu Konfirmasi' order by id_surat_kp asc LIMIT 4";
$sql_notif_surat_kp = mysqli_query($mysqli,$query_notif_surat_kp);
$query_notif_surat_ta = "SELECT * FROM surat_ta WHERE status = 'Menunggu Konfirmasi' order by id_surat_ta asc LIMIT 4";
$sql_notif_surat_ta = mysqli_query($mysqli,$query_notif_surat_ta);

$query_profil = "SELECT * FROM dosen WHERE id_dosen = '$_SESSION[id]'";
$sql_profil = mysqli_query($mysqli,$query_profil);

$query_alert_kp = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`status` = 'Menunggu' AND `jadwal_kp`.`id_dosen` = '$_SESSION[id]'";
$sql_alert_kp = mysqli_query($mysqli,$query_alert_kp);

$query_alert_ta = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`status` = 'Menunggu' AND `jadwal_ta`.`id_dosen` = '$_SESSION[id]'";
$sql_alert_ta = mysqli_query($mysqli,$query_alert_ta);

$alert_skp = mysqli_num_rows($sql_notif_surat_kp);
$alert_sta = mysqli_num_rows($sql_notif_surat_ta);

$alert_jkp = mysqli_num_rows($sql_alert_kp);
$alert_jta = mysqli_num_rows($sql_alert_ta);

$query_jadwal_kp = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`status` != 'Berakhir' ";
$sql_jadwal_kp = mysqli_query($mysqli,$query_jadwal_kp);

$query_jadwal_ta = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`status` != 'Berakhir'  ";
$sql_jadwal_ta = mysqli_query($mysqli,$query_jadwal_ta);

if (!empty($_GET['nim'])) {

  $query_surat_kp_nim = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_kp`.`nim` = '$_GET[nim]'";
  $sql_surat_kp_nim = mysqli_query($mysqli,$query_surat_kp_nim);

  $query_surat_ta_nim = "SELECT * FROM surat_ta INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_ta`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_ta`.`nim` = '$_GET[nim]'";
  $sql_surat_ta_nim = mysqli_query($mysqli,$query_surat_ta_nim);




}

if (!empty($_GET['id_kpta'])) {
  $query_profil_jadwal_kp = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `jadwal_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `jadwal_kp`.`id_jadwal_kp` = '$_GET[id_kpta]'";
  $sql_profil_jadwal_kp = mysqli_query($mysqli,$query_profil_jadwal_kp);

  $query_profil_jadwal_ta = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan ON `jadwal_ta`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `jadwal_ta`.`id_jadwal_ta` = '$_GET[id_kpta]'";
  $sql_profil_jadwal_ta = mysqli_query($mysqli,$query_profil_jadwal_ta);

  $query_absen_kp_id = "SELECT * FROM jadwal_kp INNER JOIN absen_kp_detail ON `jadwal_kp`.`id_jadwal_kp` = `absen_kp_detail`.`id_jadwal_kp` WHERE `jadwal_kp`.`id_jadwal_kp` = '$_GET[id_kpta]'";
  $sql_absen_kp_id = mysqli_query($mysqli,$query_absen_kp_id);

  $query_absen_ta_id = "SELECT * FROM jadwal_ta INNER JOIN absen_ta_detail ON `jadwal_ta`.`id_jadwal_ta` = `absen_ta_detail`.`id_jadwal_ta` WHERE `jadwal_ta`.`id_jadwal_ta` = '$_GET[id_kpta]'";
  $sql_absen_ta_id = mysqli_query($mysqli,$query_absen_ta_id);
}


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
  $query_absen_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN absen_ta_detail INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_ta`.`id_jadwal_ta` = `absen_ta_detail`.`id_jadwal_ta` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]' AND `absen_ta_detail`.`id_jadwal_ta` = '$_GET[id_ta]'";
  $sql_absen_ta = mysqli_query($mysqli,$query_absen_ta);
  $query_jadwal_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`id_dosen` = '$_SESSION[id]' AND `jadwal_ta`.`id_jadwal_ta` = '$_GET[id_ta]'";
  $sql_jadwal_ta = mysqli_query($mysqli,$query_jadwal_ta);
}

$query_dosen = "SELECT * FROM dosen";
$sql_dosen = mysqli_query($mysqli,$query_dosen);

$query_admin = "SELECT * FROM admin";
$sql_admin = mysqli_query($mysqli,$query_admin);

$query_absen_kp = "SELECT * FROM absen_kp";
$sql_absen_kp = mysqli_query($mysqli,$query_absen_kp);

$query_absen_kp_id = "SELECT * FROM absen_kp WHERE id_dosen = '$_SESSION[id]'";
$sql_absen_kp_id = mysqli_query($mysqli,$query_absen_kp_id);

if (!empty($_GET['id'])) {
  $query_absen_kp_list = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa ON `jadwal_kp`.`nim` = `mahasiswa`.`nim` WHERE status = 'Disetujui' AND id_dosen = '$_SESSION[id]'";
  $sql_absen_kp_list = mysqli_query($mysqli,$query_absen_kp_list);
  $query_absen_kp_head = "SELECT * FROM absen_kp WHERE id_absen_kp = '$_GET[id]'";
  $sql_absen_kp_head = mysqli_query($mysqli,$query_absen_kp_head);
  $query_absen_kp_kehadiran = "SELECT *,absen_kp_detail.status as ab_status FROM absen_kp INNER JOIN absen_kp_detail INNER JOIN jadwal_kp INNER JOIN mahasiswa ON `absen_kp`.`id_absen_kp` = `absen_kp_detail`.`id_absen_kp` AND `absen_kp_detail`.`id_jadwal_kp` = `jadwal_kp`.`id_jadwal_kp` AND `jadwal_kp`.`nim` = `mahasiswa`.`nim` WHERE `absen_kp_detail`.`id_absen_kp` = '$_GET[id]' AND `absen_kp`.`id_dosen` = '$_SESSION[id]'";
  $sql_absen_kp_kehadiran = mysqli_query($mysqli,$query_absen_kp_kehadiran);

  $query_absen_ta_list = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa ON `jadwal_ta`.`nim` = `mahasiswa`.`nim` WHERE status = 'Disetujui' AND id_dosen = '$_SESSION[id]'";
  $sql_absen_ta_list = mysqli_query($mysqli,$query_absen_ta_list);
  $query_absen_ta_head = "SELECT * FROM absen_ta WHERE id_absen_ta = '$_GET[id]'";
  $sql_absen_ta_head = mysqli_query($mysqli,$query_absen_ta_head);
  $query_absen_ta_kehadiran = "SELECT *,absen_ta_detail.status as ab_status FROM absen_ta INNER JOIN absen_ta_detail INNER JOIN jadwal_ta INNER JOIN mahasiswa ON `absen_ta`.`id_absen_ta` = `absen_ta_detail`.`id_absen_ta` AND `absen_ta_detail`.`id_jadwal_ta` = `jadwal_ta`.`id_jadwal_ta` AND `jadwal_ta`.`nim` = `mahasiswa`.`nim` WHERE `absen_ta_detail`.`id_absen_ta` = '$_GET[id]' AND `absen_ta`.`id_dosen` = '$_SESSION[id]'";
  $sql_absen_ta_kehadiran = mysqli_query($mysqli,$query_absen_ta_kehadiran);
}

$query_absen_ta = "SELECT * FROM absen_ta";
$sql_absen_ta = mysqli_query($mysqli,$query_absen_ta);

$query_absen_ta_id = "SELECT * FROM absen_ta WHERE id_dosen = '$_SESSION[id]'";
$sql_absen_ta_id = mysqli_query($mysqli,$query_absen_ta_id);

?>
