<?php
/* PROFIL ADMIN*/
$query_profil = "SELECT * FROM admin WHERE id_admin = '$_SESSION[id]'";
$sql_profil = mysqli_query($mysqli,$query_profil);
/* -----------*/


/* PROFIL USERS*/
$query_dosen = "SELECT * FROM dosen";
$sql_dosen = mysqli_query($mysqli,$query_dosen);

$query_admin = "SELECT * FROM admin";
$sql_admin = mysqli_query($mysqli,$query_admin);

$query_mahasiswa = "SELECT * FROM mahasiswa INNER JOIN jurusan ON `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` ";
$sql_mahasiswa = mysqli_query($mysqli,$query_mahasiswa);
/* -----------*/


/* PROFIL JADWAL*/
$query_jadwal_kp = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` ";
$sql_jadwal_kp = mysqli_query($mysqli,$query_jadwal_kp);

$query_jadwal_ta = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` ";
$sql_jadwal_ta = mysqli_query($mysqli,$query_jadwal_ta);
/* -----------*/


/* PROFIL JADWAL*/
$query_jadwal_kp_sidang = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`status_sidang_kp` = 'Menunggu'  ";
$sql_jadwal_kp_sidang = mysqli_query($mysqli,$query_jadwal_kp_sidang);

$query_jadwal_ta_sidang = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`status_sidang_ta` = 'Menunggu' ";
$sql_jadwal_ta_sidang = mysqli_query($mysqli,$query_jadwal_ta_sidang);

$alert_sidang_kp = mysqli_num_rows($sql_jadwal_kp_sidang);
$alert_sidang_ta = mysqli_num_rows($sql_jadwal_ta_sidang);
/* -----------*/


/* PROFIL SIDANG*/
$query_kp_sidang = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen INNER JOIN ruang ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_kp`.`ruang_sidang_kp` = `ruang`.`id_ruang` WHERE `jadwal_kp`.`status_sidang_kp` = 'Didaftarkan'  ";
$sql_kp_sidang = mysqli_query($mysqli,$query_kp_sidang);

$query_ta_sidang = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen INNER JOIN ruang ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_ta`.`ruang_sidang_ta` = `ruang`.`id_ruang` WHERE `jadwal_ta`.`status_sidang_ta` = 'Didaftarkan' ";
$sql_ta_sidang = mysqli_query($mysqli,$query_ta_sidang);

$query_kp_sidang_list = "SELECT * FROM sidang_kp INNER JOIN jadwal_kp INNER JOIN ruang ON `sidang_kp`.`id_jadwal_kp` = `jadwal_kp`.`id_jadwal_kp` AND `sidang_kp`.`id_ruang` = `ruang`.`id_ruang`";
$sql_kp_sidang_list = mysqli_query($mysqli,$query_kp_sidang_list);

$query_ta_sidang_list = "SELECT * FROM sidang_ta INNER JOIN jadwal_ta INNER JOIN ruang ON `sidang_ta`.`id_jadwal_ta` = `jadwal_ta`.`id_jadwal_ta` AND `sidang_ta`.`id_ruang` = `ruang`.`id_ruang`";
$sql_ta_sidang_list = mysqli_query($mysqli,$query_ta_sidang_list);


/* -----------*/


/* PROFIL SIDANG*/
$query_kp_sidang_dosen = "SELECT * FROM jadwal_kp_detail INNER JOIN jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `jadwal_kp_detail`.`id_jadwal_kp` = `jadwal_kp`.`id_jadwal_kp` AND  `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp_detail`.`id_dosen_penguji` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`status_sidang_kp` = 'Didaftarkan' AND `jadwal_kp`.`periode_daftar_kp` = 'date(Y)'  ";
$sql_kp_sidang_dosen = mysqli_query($mysqli,$query_kp_sidang_dosen);

$query_ta_sidang_dosen = "SELECT *,(SELECT DISTINCT nama_ruang from sidang_ta INNER JOIN sidang_ta_detail INNER JOIN ruang ON sidang_ta.id_sidang_ta = sidang_ta_detail.id_sidang_ta AND sidang_ta.id_ruang = ruang.id_ruang WHERE sidang_ta_detail.id_dosen_penguji = dosen.id_dosen) as ID_R FROM `dosen`";
$sql_ta_sidang_dosen = mysqli_query($mysqli,$query_ta_sidang_dosen);
/* -----------*/

/* RUANG*/
$query_ruang = "SELECT * FROM ruang";
$sql_ruang = mysqli_query($mysqli,$query_ruang);
/* -----------*/


if (!empty($_GET['id'])) {
  /*INSTRUCTION FOR KP*/
  $query_kp_detail = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_kp INNER JOIN dosen ON `jadwal_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`id_jadwal_kp` = '$_GET[id]'";
  $sql_kp_detail = mysqli_query($mysqli,$query_kp_detail);
  $query_kp_absen_list = "SELECT * FROM jadwal_kp INNER JOIN dosen INNER JOIN absen_kp INNER JOIN absen_kp_detail ON `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_kp`.`id_jadwal_kp` = `absen_kp_detail`.`id_jadwal_kp` AND `absen_kp`.`id_absen_kp` = `absen_kp_detail`.`id_absen_kp` WHERE `absen_kp_detail`.`id_jadwal_kp` = '$_GET[id]'";
  $sql_kp_absen_list = mysqli_query($mysqli,$query_kp_absen_list);
  $query_kp_absen = "SELECT *,absen_kp_detail.status as status_detail,absen_kp.status as status_absen,absen_kp.id_absen_kp as id_absen,jadwal_kp.id_jadwal_kp as id_jadwal FROM jadwal_kp INNER JOIN absen_kp LEFT JOIN absen_kp_detail ON absen_kp.id_absen_kp = absen_kp_detail.id_absen_kp AND jadwal_kp.id_dosen = absen_kp.id_dosen AND jadwal_kp.id_jadwal_kp = absen_kp_detail.id_jadwal_kp WHERE `jadwal_kp`.`id_jadwal_kp` = '$_GET[id]' AND `jadwal_kp`.`status` = 'Disetujui' ";
  $sql_kp_absen = mysqli_query($mysqli,$query_kp_absen);
  $query_kp_absen_detail = "SELECT * FROM absen_kp INNER JOIN absen_kp_detail ON `absen_kp`.`id_absen_kp` = `absen_kp_detail`.`id_absen_kp` WHERE `absen_kp_detail`.`id_jadwal_kp` = '$_GET[id]'";
  $sql_kp_absen_detail = mysqli_query($mysqli,$query_kp_absen_detail);

  /*INSTRUCTION FOR TA*/
  $query_ta_detail = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `jadwal_ta`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`id_jadwal_ta` = '$_GET[id]'";
  $sql_ta_detail = mysqli_query($mysqli,$query_ta_detail);
  $query_ta_absen_list = "SELECT * FROM jadwal_ta INNER JOIN dosen INNER JOIN absen_ta INNER JOIN absen_ta_detail ON `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_ta`.`id_jadwal_ta` = `absen_ta_detail`.`id_jadwal_ta` AND `absen_ta`.`id_absen_ta` = `absen_ta_detail`.`id_absen_ta` WHERE `absen_ta_detail`.`id_jadwal_ta` = '$_GET[id]'";
  $sql_ta_absen_list = mysqli_query($mysqli,$query_ta_absen_list);
  $query_ta_absen = "SELECT *,absen_ta_detail.status as status_detail,absen_ta.status as status_absen,absen_ta.id_absen_ta as id_absen,jadwal_ta.id_jadwal_ta as id_jadwal FROM jadwal_ta INNER JOIN absen_ta LEFT JOIN absen_ta_detail ON absen_ta.id_absen_ta = absen_ta_detail.id_absen_ta AND jadwal_ta.id_dosen = absen_ta.id_dosen AND jadwal_ta.id_jadwal_ta = absen_ta_detail.id_jadwal_ta WHERE `jadwal_ta`.`id_jadwal_ta` = '$_GET[id]' AND `jadwal_ta`.`status` = 'Disetujui' ";
  $sql_ta_absen = mysqli_query($mysqli,$query_ta_absen);
  $query_ta_absen_detail = "SELECT * FROM absen_ta INNER JOIN absen_ta_detail ON `absen_ta`.`id_absen_ta` = `absen_ta_detail`.`id_absen_ta` WHERE `absen_ta_detail`.`id_jadwal_ta` = '$_GET[id]'";
  $sql_ta_absen_detail = mysqli_query($mysqli,$query_ta_absen_detail);

  /*INSTRUCTION FOR USERS DETAILS*/
  $query_mahasiswa_details = "SELECT * FROM mahasiswa INNER JOIN jurusan ON `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE nim = '$_GET[id]'";
  $sql_mahasiswa_details = mysqli_query($mysqli,$query_mahasiswa_details);
  $query_dosen_details = "SELECT * FROM dosen WHERE id_dosen = '$_GET[id]'";
  $sql_dosen_details = mysqli_query($mysqli,$query_dosen_details);

}


$query_alert_kp = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`status` = 'Menunggu'";
$sql_alert_kp = mysqli_query($mysqli,$query_alert_kp);

$query_alert_ta = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`status` = 'Menunggu'";
$sql_alert_ta = mysqli_query($mysqli,$query_alert_ta);

$alert_jkp = mysqli_num_rows($sql_alert_kp);
$alert_jta = mysqli_num_rows($sql_alert_ta);



if (!empty($_GET['nim'])) {

  $query_surat_kp_nim = "SELECT * FROM surat_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_kp`.`nim` = '$_GET[nim]'";
  $sql_surat_kp_nim = mysqli_query($mysqli,$query_surat_kp_nim);

  $query_surat_ta_nim = "SELECT * FROM surat_ta INNER JOIN mahasiswa INNER JOIN jurusan ON `surat_ta`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `surat_ta`.`nim` = '$_GET[nim]'";
  $sql_surat_ta_nim = mysqli_query($mysqli,$query_surat_ta_nim);

  $query_absen_kp_nim = "SELECT * FROM jadwal_kp INNER JOIN jadwal_kp_detail ON `jadwal_kp`.`id_jadwal_kp` = `jadwal_kp_detail`.`id_jadwal_kp` WHERE `jadwal_kp`.`nim` = '$_GET[nim]'";
  $sql_absen_kp_nim = mysqli_query($mysqli,$query_absen_kp_nim);

  $query_absen_ta_nim = "SELECT * FROM jadwal_ta INNER JOIN jadwal_ta_detail ON `jadwal_ta`.`id_jadwal_ta` = `jadwal_ta_detail`.`id_jadwal_ta` WHERE `jadwal_ta`.`nim` = '$_GET[nim]'";
  $sql_absen_ta_nim = mysqli_query($mysqli,$query_absen_ta_nim);

  $query_profil_jadwal_kp = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan ON `jadwal_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `jadwal_kp`.`nim` = '$_GET[nim]'";
  $sql_profil_jadwal_kp = mysqli_query($mysqli,$query_profil_jadwal_kp);

  $query_profil_jadwal_ta = "SELECT * FROM jadwal_ta INNER JOIN mahasiswa INNER JOIN jurusan ON `jadwal_ta`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` WHERE `jadwal_ta`.`nim` = '$_GET[nim]'";
  $sql_profil_jadwal_ta = mysqli_query($mysqli,$query_profil_jadwal_ta);

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
  $query_absen_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN jadwal_ta_detail INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` AND `jadwal_ta`.`id_jadwal_ta` = `jadwal_ta_detail`.`id_jadwal_ta` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]' AND `jadwal_ta_detail`.`id_jadwal_ta` = '$_GET[id_ta]'";
  $sql_absen_ta = mysqli_query($mysqli,$query_absen_ta);
  $query_jadwal_ta = "SELECT * FROM mahasiswa INNER JOIN jurusan INNER JOIN jadwal_ta INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_ta`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_ta`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_ta`.`nim` = '$_SESSION[id]' AND `jadwal_ta`.`id_jadwal_ta` = '$_GET[id_ta]'";
  $sql_jadwal_ta = mysqli_query($mysqli,$query_jadwal_ta);
}



?>
