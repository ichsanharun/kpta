<?php
$query_profil = "SELECT * FROM mahasiswa INNER JOIN jurusan ON `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE nim = '$_SESSION[id]' order by `mahasiswa`.`kode_jurusan` asc";
$sql_profil = mysqli_query($mysqli,$query_profil);

$query_kp_list = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN dosen ON `jadwal_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]'";
$sql_kp_list = mysqli_query($mysqli,$query_kp_list);

$query_ta_list = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `jadwal_ta`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]'";
$sql_ta_list = mysqli_query($mysqli,$query_ta_list);

if (!empty($_GET['id'])) {
  /*INSTRUCTION FOR KP*/
  $query_kp_detail = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN dosen ON `jadwal_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]' AND `jadwal_kp`.`id_jadwal_kp` = '$_GET[id]'";
  $sql_kp_detail = mysqli_query($mysqli,$query_kp_detail);
  $query_kp_absen_list = "SELECT * FROM jadwal_kp INNER JOIN dosen INNER JOIN absen_kp INNER JOIN absen_kp_detail ON `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_kp`.`id_jadwal_kp` = `absen_kp_detail`.`id_jadwal_kp` AND `absen_kp`.`id_absen_kp` = `absen_kp_detail`.`id_absen_kp` WHERE `jadwal_kp`.`nim` = '$_SESSION[id]' AND `absen_kp_detail`.`id_jadwal_kp` = '$_GET[id]'";
  $sql_kp_absen_list = mysqli_query($mysqli,$query_kp_absen_list);
  $query_kp_absen = "SELECT *,absen_kp_detail.status as status_detail,absen_kp.status as status_absen,absen_kp.id_absen_kp as id_absen,jadwal_kp.id_jadwal_kp as id_jadwal FROM jadwal_kp INNER JOIN absen_kp LEFT JOIN absen_kp_detail ON absen_kp.id_absen_kp = absen_kp_detail.id_absen_kp AND jadwal_kp.id_dosen = absen_kp.id_dosen AND jadwal_kp.id_jadwal_kp = absen_kp_detail.id_jadwal_kp WHERE `jadwal_kp`.`id_jadwal_kp` = '$_GET[id]' AND `jadwal_kp`.`status` = 'Disetujui' ";
  $sql_kp_absen = mysqli_query($mysqli,$query_kp_absen);
  $query_kp_absen_detail = "SELECT * FROM absen_kp INNER JOIN absen_kp_detail ON `absen_kp`.`id_absen_kp` = `absen_kp_detail`.`id_absen_kp` WHERE `absen_kp_detail`.`id_jadwal_kp` = '$_GET[id]'";
  $sql_kp_absen_detail = mysqli_query($mysqli,$query_kp_absen_detail);

  /*INSTRUCTION FOR TA*/
  $query_ta_detail = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `jadwal_ta`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]' AND `jadwal_ta`.`id_jadwal_ta` = '$_GET[id]'";
  $sql_ta_detail = mysqli_query($mysqli,$query_ta_detail);
  $query_ta_absen_list = "SELECT * FROM jadwal_ta INNER JOIN dosen INNER JOIN absen_ta INNER JOIN absen_ta_detail ON `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_ta`.`id_jadwal_ta` = `absen_ta_detail`.`id_jadwal_ta` AND `absen_ta`.`id_absen_ta` = `absen_ta_detail`.`id_absen_ta` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]' AND `absen_ta_detail`.`id_jadwal_ta` = '$_GET[id]'";
  $sql_ta_absen_list = mysqli_query($mysqli,$query_ta_absen_list);
  $query_ta_absen = "SELECT *,absen_ta_detail.status as status_detail,absen_ta.status as status_absen,absen_ta.id_absen_ta as id_absen,jadwal_ta.id_jadwal_ta as id_jadwal FROM jadwal_ta INNER JOIN absen_ta LEFT JOIN absen_ta_detail ON absen_ta.id_absen_ta = absen_ta_detail.id_absen_ta AND jadwal_ta.id_dosen = absen_ta.id_dosen AND jadwal_ta.id_jadwal_ta = absen_ta_detail.id_jadwal_ta WHERE `jadwal_ta`.`id_jadwal_ta` = '$_GET[id]' AND `jadwal_ta`.`status` = 'Disetujui' ";
  $sql_ta_absen = mysqli_query($mysqli,$query_ta_absen);
  $query_ta_absen_detail = "SELECT * FROM absen_ta INNER JOIN absen_ta_detail ON `absen_ta`.`id_absen_ta` = `absen_ta_detail`.`id_absen_ta` WHERE `absen_ta_detail`.`id_jadwal_ta` = '$_GET[id]'";
  $sql_ta_absen_detail = mysqli_query($mysqli,$query_ta_absen_detail);

}
/*INSTRUCTION FOR ALERT ABSEN KP*/
$query_alert_kp_absen = "SELECT * FROM absen_kp LEFT JOIN absen_kp_detail ON absen_kp.id_absen_kp = absen_kp_detail.id_absen_kp INNER JOIN jadwal_kp ON absen_kp.id_dosen = jadwal_kp.id_dosen WHERE absen_kp.status = 'Terbuka' AND absen_kp_detail.status = '' AND jadwal_kp.nim = '$_SESSION[id]'";
$sql_alert_kp_absen = mysqli_query($mysqli,$query_alert_kp_absen);
$query_alert_ta_absen = "SELECT * FROM absen_ta LEFT JOIN absen_ta_detail ON absen_ta.id_absen_ta = absen_ta_detail.id_absen_ta INNER JOIN jadwal_ta ON absen_ta.id_dosen = jadwal_ta.id_dosen WHERE absen_ta.status = 'Terbuka' AND absen_ta_detail.status = '' AND jadwal_ta.nim = '$_SESSION[id]'";
$sql_alert_ta_absen = mysqli_query($mysqli,$query_alert_ta_absen);
$alert_akp = mysqli_num_rows($sql_alert_kp_absen);
$alert_ata = mysqli_num_rows($sql_alert_ta_absen);



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
