<?php
//session_start();
//include '../../koneksi/koneksi.php';
$tanggal_bimbingan = $_POST['tanggal_bimbingan'];
$tempat_bimbingan = $_POST['tempat_bimbingan'];
$pembahasan_bimbingan = $_POST['pembahasan_bimbingan'];
$id_dosen = $_SESSION['id'];
$tipe_aksi = $_POST['tipe_aksi'];
$tipe_absen = $_POST['tipe_absen'];
if ($tipe_absen == "absen_kp") {
  $query = "SELECT max(id_absen_kp) as maxKode FROM absen_kp";
  $hasil = $mysqli->query($query);
  $data  = mysqli_fetch_array($hasil);
  $kodeTrans = $data['maxKode'];
  $noUrut = (int) substr($kodeTrans, 8, 4);
  $noUrut++;
  $char = "ABS".date("Ymd");
  $id_absen = $char . sprintf("%04s", $noUrut);

  if (
    !empty($tanggal_bimbingan) AND
    !empty($tempat_bimbingan) AND
    !empty($pembahasan_bimbingan) AND
    !empty($id_dosen)
  ) {
        $queryinsert_absen = "INSERT INTO absen_kp
        (
          id_absen_kp,
          id_dosen,
          tanggal_bimbingan,
          tempat_bimbingan,
          pembahasan_bimbingan,
          status
        )
        VALUES
        (
          '$id_absen',
          '$id_dosen',
          '$tanggal_bimbingan',
          '$tempat_bimbingan',
          '$pembahasan_bimbingan',
          'Terbuka'
        )
        ";
        $sqlinsert_absen = $mysqli->query($queryinsert_absen);
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
          window.location.href="?p=KP_absen";
        </script>
      <?php
    }
}
elseif ($tipe_absen == "absen_ta") {
  $query = "SELECT max(id_absen_ta) as maxKode FROM absen_ta";
  $hasil = $mysqli->query($query);
  $data  = mysqli_fetch_array($hasil);
  $kodeTrans = $data['maxKode'];
  $noUrut = (int) substr($kodeTrans, 8, 4);
  $noUrut++;
  $char = "ABS".date("Ymd");
  $id_absen = $char . sprintf("%04s", $noUrut);

  if (
    !empty($tanggal_bimbingan) AND
    !empty($tempat_bimbingan) AND
    !empty($pembahasan_bimbingan) AND
    !empty($id_dosen)
  ) {
        $queryinsert_absen = "INSERT INTO absen_ta
        (
          id_absen_ta,
          id_dosen,
          tanggal_bimbingan,
          tempat_bimbingan,
          pembahasan_bimbingan,
          status
        )
        VALUES
        (
          '$id_absen',
          '$id_dosen',
          '$tanggal_bimbingan',
          '$tempat_bimbingan',
          '$pembahasan_bimbingan',
          'Terbuka'
        )
        ";
        $sqlinsert_absen = $mysqli->query($queryinsert_absen);
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
          window.location.href="?p=TA_absen";
        </script>
      <?php
    }
}
  else {
    ?>
    <script>
    alert('Data TIDAK Berhasil Disimpan!');
    window.location.href="?p=";
    </script>
    <?php
  }




?>
