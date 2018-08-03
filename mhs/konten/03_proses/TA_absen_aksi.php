<?php

  if (!empty($_GET['id']) AND !empty($_GET['act']) AND !empty($_GET['abs'])) {
    $id = $_GET['id'];
    $act = $_GET['act'];
    $abs = $_GET['abs'];
    $query = "SELECT * FROM absen_ta_detail WHERE id_jadwal_ta = '$_GET[id]' AND id_absen_ta = '$_GET[abs]'";
    $sql = mysqli_query($mysqli,$query);
    if ($act == "ikuti") {
      if (mysqli_num_rows($sql) > 0) {
        $query_update_absen = "UPDATE absen_ta_detail SET
          status = 'Akan Hadir' WHERE id_absen_ta = '$abs'
        ";

      }
      else {
        $query_update_absen = "INSERT INTO absen_ta_detail
          (
            id_absen_ta,
            id_jadwal_ta,
            catatan_pembimbing,
            status
          )
          VALUES
          (
            '$abs',
            '$id',
            '',
            'Akan Hadir'
          )
        ";
      }
    }
    elseif ($act == "tikuti") {
      if (mysqli_num_rows($sql) > 0) {
        $query_update_absen = "UPDATE absen_ta_detail SET
          status = 'Tidak Akan Hadir' WHERE id_absen_ta = '$abs'
        ";

      }
      else {
        $query_update_absen = "INSERT INTO absen_ta_detail
          (
            id_absen_ta,
            id_jadwal_ta,
            catatan_pembimbing,
            status
          )
          VALUES
          (
            '$abs',
            '$id',
            '',
            'Tidak Akan Hadir'
          )
        ";
      }
    }
    $sql_update_absen = $mysqli->query($query_update_absen);
    if ($sql_update_absen) {
      ?>
        <script>
          alert('Bimbingan telah selesai disimpan!');
          window.location.href="?p=TA_absen_lihat&id=<?php echo $id; ?>";
        </script>
      <?php
    }
    else {
      ?>
        <script>
          alert('Data tidak tersimpan!');
          window.location.href="?p=TA_absen_lihat&id=<?php echo $id; ?>";
        </script>
      <?php
    }
  }
  else {
      ?>
        <script>
          alert('Data tidak Valid!');
          window.location.href="?p=TA_absen_lihat&id=<?php echo $id; ?>";
        </script>
      <?php
    }
?>
