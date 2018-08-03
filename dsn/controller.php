<?php

$query_profil = "SELECT * FROM dosen WHERE id_dosen = '$_SESSION[id]'";
$sql_profil = mysqli_query($mysqli,$query_profil);

$query_alert_kp = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`status` = 'Menunggu' AND `jadwal_kp`.`id_dosen` = '$_SESSION[id]'";
$sql_alert_kp = mysqli_query($mysqli,$query_alert_kp);

$query_alert_ta = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`status` = 'Menunggu' AND `jadwal_ta`.`id_dosen` = '$_SESSION[id]'";
$sql_alert_ta = mysqli_query($mysqli,$query_alert_ta);

$alert_jkp = mysqli_num_rows($sql_alert_kp);
$alert_jta = mysqli_num_rows($sql_alert_ta);

$query_jadwal_kp = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`status` != 'Berakhir' ";
$sql_jadwal_kp = mysqli_query($mysqli,$query_jadwal_kp);

$query_jadwal_ta = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`status` != 'Berakhir'  ";
$sql_jadwal_ta = mysqli_query($mysqli,$query_jadwal_ta);

/* PROFIL SIDANG*/
$query_kp_sidang = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen INNER JOIN ruang ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_kp`.`ruang_sidang_kp` = `ruang`.`id_ruang` WHERE `jadwal_kp`.`status_sidang_kp` = 'Didaftarkan'  ";
$sql_kp_sidang = mysqli_query($mysqli,$query_kp_sidang);

$query_ta_sidang = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen INNER JOIN ruang ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_ta`.`ruang_sidang_ta` = `ruang`.`id_ruang` WHERE `jadwal_ta`.`status_sidang_ta` = 'Didaftarkan' ";
$sql_ta_sidang = mysqli_query($mysqli,$query_ta_sidang);

$query_kp_sidang_list = "SELECT DISTINCT `sidang_kp_detail`.`id_sidang_kp` as ID, `sidang_kp`.`tanggal_sidang_kp_start`, `sidang_kp`.`tanggal_sidang_kp_end`, `ruang`.`nama_ruang` FROM `sidang_kp_detail` LEFT JOIN `sidang_kp` ON `sidang_kp_detail`.`id_sidang_kp` = `sidang_kp`.`id_sidang_kp` INNER JOIN `jadwal_kp` INNER JOIN `ruang` ON `sidang_kp`.`id_jadwal_kp` = `jadwal_kp`.`id_jadwal_kp` AND `sidang_kp`.`id_ruang` = `ruang`.`id_ruang` WHERE `sidang_kp_detail`.`id_dosen_penguji` = '$_SESSION[id]' AND `sidang_kp_detail`.`catatan_penguji` IS NULL";
$sql_kp_sidang_list = mysqli_query($mysqli,$query_kp_sidang_list);

$query_ta_sidang_list = "SELECT DISTINCT `sidang_ta_detail`.`id_sidang_ta` as ID, `sidang_ta`.`tanggal_sidang_ta_start`, `sidang_ta`.`tanggal_sidang_ta_end`, `ruang`.`nama_ruang` FROM `sidang_ta_detail` LEFT JOIN `sidang_ta` ON `sidang_ta_detail`.`id_sidang_ta` = `sidang_ta`.`id_sidang_ta` INNER JOIN `jadwal_ta` INNER JOIN `ruang` ON `sidang_ta`.`id_jadwal_ta` = `jadwal_ta`.`id_jadwal_ta` AND `sidang_ta`.`id_ruang` = `ruang`.`id_ruang` WHERE `sidang_ta_detail`.`id_dosen_penguji` = '$_SESSION[id]' AND `sidang_ta_detail`.`catatan_penguji` IS NULL";
$sql_ta_sidang_list = mysqli_query($mysqli,$query_ta_sidang_list);


/* -----------*/

/* RUANG*/
$query_ruang = "SELECT * FROM ruang";
$sql_ruang = mysqli_query($mysqli,$query_ruang);
/* -----------*/

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

  $query_sidang_kp = "SELECT * FROM sidang_kp_detail WHERE id_dosen_penguji = '$_SESSION[id]' AND id_sidang_kp = '$_GET[id]'";
  $sql_skp = $mysqli->query($query_sidang_kp);
  $query_sidang_ta = "SELECT * FROM sidang_ta_detail WHERE id_dosen_penguji = '$_SESSION[id]' AND id_sidang_ta = '$_GET[id]'";
  $sql_sta = $mysqli->query($query_sidang_ta);
}

$query_alert_nguji_kp = "SELECT DISTINCT id_sidang_kp FROM sidang_kp_detail WHERE id_dosen_penguji = '$_SESSION[id]' AND `sidang_kp_detail`.`catatan_penguji` IS NULL";
$sql_alert_nguji_kp = mysqli_query($mysqli,$query_alert_nguji_kp);
$query_alert_nguji_ta = "SELECT DISTINCT id_sidang_ta FROM sidang_ta_detail WHERE id_dosen_penguji = '$_SESSION[id]' AND `sidang_ta_detail`.`catatan_penguji` IS NULL";
$sql_alert_nguji_ta = mysqli_query($mysqli,$query_alert_nguji_ta);
$alert_nguji_kp = mysqli_num_rows($sql_alert_nguji_kp);
$alert_nguji_ta = mysqli_num_rows($sql_alert_nguji_ta);

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



$query_absen_ta = "SELECT * FROM absen_ta";
$sql_absen_ta = mysqli_query($mysqli,$query_absen_ta);

$query_absen_ta_id = "SELECT * FROM absen_ta WHERE id_dosen = '$_SESSION[id]'";
$sql_absen_ta_id = mysqli_query($mysqli,$query_absen_ta_id);

?>
