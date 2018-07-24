<?php

  if (!empty($_POST['selesai'])) {
    $selesai = $_POST['selesai'];
    $query_update_absen = "UPDATE absen_ta SET
      status = 'Selesai' WHERE id_absen_ta = '$selesai'
    ";
    $sql_update_absen = $mysqli->query($query_update_absen);
    if ($sql_update_absen) {
      ?>
        <script>
          alert('Bimbingan telah selesai disimpan!');
          window.location.href="?p=TA_absen";
        </script>
      <?php
    }
    else {
      ?>
        <script>
          alert('Data tidak tersimpan!');
          window.location.href="?p=TA_absen";
        </script>
      <?php
    }
  }
  else {
    if (!empty($_POST['tipe_aksi'])) {
      $aksi = $_POST['tipe_aksi'];
    }
    else {
      ?>
        <script>
          alert('Data tidak Valid!');
          window.location.href="?p=TA_absen";
        </script>
      <?php
    }

    if ($aksi == 'atur_jadwal') {
      if (!empty($_POST['id_jadwal_ta']) AND !empty($_POST['id_absen_ta']) AND !empty($_POST['tanggal_bimbingan'])) {
        $id_jadwal_ta = $_POST['id_jadwal_ta'];
        $id_absen_ta = $_POST['id_absen_ta'];
        $tanggal_bimbingan = $_POST['tanggal_bimbingan'];
      }
      else {
        ?>
          <script>
            alert('Tidak ada data yang berubah!');
            window.location.href="?p=TA_absen";
          </script>
        <?php
      }
      foreach ($id_jadwal_ta as $key => $value) {
        $id_jadwal_ta = $_POST['id_jadwal_ta'][$key];
        $query_insert_absen = "INSERT INTO absen_ta_detail
          (
            id_absen_ta,
            id_jadwal_ta,
            status
          )
          VALUES
          (
            '$id_absen_ta',
            '$id_jadwal_ta',
            'Aktif'
          )
        ";
        $sql_insert_absen = $mysqli->query($query_insert_absen);
      }
      if ($sql_insert_absen) {
        ?>
          <script>
            alert('Data tersimpan!');
            window.location.href="?p=TA_absen";
          </script>
        <?php
      }
      else {
        ?>
          <script>
            alert('Data tidak tersimpan!');
            window.location.href="?p=TA_absen";
          </script>
        <?php
      }
    }
    elseif ($aksi == 'kehadiran') {
      if (!empty($_POST['id_jadwal_ta']) AND !empty($_POST['catatan_pembimbing']) AND !empty($_POST['kehadiran'])) {
        $id_jadwal_ta = $_POST['id_jadwal_ta'];
        foreach ($id_jadwal_ta as $key => $value) {
          $id_jadwal_ta = $_POST['id_jadwal_ta'][$key];
          $catatan_pembimbing = $_POST['catatan_pembimbing'][$key];
          $kehadiran = $_POST['kehadiran'][$key];

          $query_update_absen = "UPDATE absen_ta_detail SET
            catatan_pembimbing = '$catatan_pembimbing',
            status = '$kehadiran' WHERE id_jadwal_ta = '$value'
          ";
          $sql_update_absen = $mysqli->query($query_update_absen);
          //echo "$key";
        }
        if ($sql_update_absen) {
          ?>
            <script>
              alert('Data tersimpan!');
              window.location.href="?p=TA_absen";
            </script>
          <?php
        }
        else {
          ?>
            <script>
              alert('Data tidak tersimpan!');
              window.location.href="?p=TA_absen";
            </script>
          <?php
        }

      }
      else {
        ?>
          <script>
            alert('Tidak ada data yang berubah!');
            window.location.href="?p=TA_absen";
          </script>
        <?php
      }

    }
  }


?>
