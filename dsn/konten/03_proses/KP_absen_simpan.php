<?php

  if (!empty($_POST['selesai'])) {
    $selesai = $_POST['selesai'];
    $query_update_absen = "UPDATE absen_kp SET
      status = 'Selesai' WHERE id_absen_kp = '$selesai'
    ";
    $sql_update_absen = $mysqli->query($query_update_absen);
    if ($sql_update_absen) {
      ?>
        <script>
          alert('Bimbingan telah selesai disimpan!');
          window.location.href="?p=KP_absen_kehadiran&id=<?php echo $selesai; ?>";
        </script>
      <?php
    }
    else {
      ?>
        <script>
          alert('Data tidak tersimpan!');
          window.location.href="?p=KP_absen_kehadiran&id=<?php echo $selesai; ?>";
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
          window.location.href="?p=KP_absen_kehadiran&id=<?php echo $id_absen_kp; ?>";
        </script>
      <?php
    }

    if ($aksi == 'atur_jadwal') {
      if (!empty($_POST['id_jadwal_kp']) AND !empty($_POST['id_absen_kp']) AND !empty($_POST['tanggal_bimbingan'])) {
        $id_jadwal_kp = $_POST['id_jadwal_kp'];
        $id_absen_kp = $_POST['id_absen_kp'];
        $tanggal_bimbingan = $_POST['tanggal_bimbingan'];
      }
      else {
        ?>
          <script>
            alert('Tidak ada data yang berubah!');
            window.location.href="?p=KP_absen_kehadiran&id=<?php echo $id_absen_kp; ?>";
          </script>
        <?php
      }
      foreach ($id_jadwal_kp as $key => $value) {
        $id_jadwal_kp = $_POST['id_jadwal_kp'][$key];
        $query_insert_absen = "INSERT INTO absen_kp_detail
          (
            id_absen_kp,
            id_jadwal_kp,
            status
          )
          VALUES
          (
            '$id_absen_kp',
            '$id_jadwal_kp',
            'Aktif'
          )
        ";
        $sql_insert_absen = $mysqli->query($query_insert_absen);
      }
      if ($sql_insert_absen) {
        ?>
          <script>
            alert('Data tersimpan!');
            window.location.href="?p=KP_absen_kehadiran&id=<?php echo $id_absen_kp; ?>";
          </script>
        <?php
      }
      else {
        ?>
          <script>
            alert('Data tidak tersimpan!');
            window.location.href="?p=KP_absen_kehadiran&id=<?php echo $id_absen_kp; ?>";
          </script>
        <?php
      }
    }
    elseif ($aksi == 'kehadiran') {
      if (!empty($_POST['id_jadwal_kp']) AND !empty($_POST['catatan_pembimbing']) AND !empty($_POST['kehadiran'])) {
        $id_jadwal_kp = $_POST['id_jadwal_kp'];
        foreach ($id_jadwal_kp as $key => $value) {
          $id_absen_kp = $_POST['id_absen_kp'][$key];
          $id_jadwal_kp = $_POST['id_jadwal_kp'][$key];
          $catatan_pembimbing = $_POST['catatan_pembimbing'][$key];
          $kehadiran = $_POST['kehadiran'][$key];

          $query_update_absen = "UPDATE absen_kp_detail SET
            catatan_pembimbing = '$catatan_pembimbing',
            status = '$kehadiran' WHERE id_jadwal_kp = '$value' AND id_absen_kp = '$id_absen_kp'
          ";
          $sql_update_absen = $mysqli->query($query_update_absen);
          //echo "$key";
        }
        if ($sql_update_absen) {
          ?>
            <script>
              alert('Data tersimpan!');
              window.location.href="?p=KP_absen_kehadiran&id=<?php echo $id_absen_kp; ?>";
            </script>
          <?php
        }
        else {
          ?>
            <script>
              alert('Data tidak tersimpan!');
              window.location.href="?p=KP_absen_kehadiran&id=<?php echo $id_absen_kp; ?>";
            </script>
          <?php
        }

      }
      else {
        ?>
          <script>
            alert('Tidak ada data yang berubah!');
            window.location.href="?p=KP_absen_kehadiran&id=<?php echo $id_absen_kp; ?>";
          </script>
        <?php
      }

    }
  }


?>
