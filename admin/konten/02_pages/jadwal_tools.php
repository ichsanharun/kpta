<?php

  if  (
        (!empty($_GET['ts'])) AND
        (!empty($_GET['id'])) AND
        (!empty($_GET['act']))
      ) {
          $ts = $_GET['ts'];
          $id = $_GET['id'];
          $act = $_GET['act'];
        }
  else {
    ?>
      <script>
        alert('Data Tidak Valid!');
        window.location.href="?";
      </script>
    <?php
  }

  if ($ts == 'kp') {
    if ($act == 'detail')
      {
        include 'konten/02_pages/jkp_detail.php';
      }
    elseif ($act == 'ubah')
      {
        include 'konten/02_pages/jkp_ubah.php';
      }
    elseif ($act == 'v')
      {
        $query_acc_jadwal = "UPDATE jadwal_kp SET
          status = 'Disetujui'
          WHERE id_jadwal_kp = '$id'
        ";
        if ($sql_acc_jadwal = $mysqli->query($query_acc_jadwal)) {
          ?>
          <script>
            alert('Data jadwal berhasil disetujui!');
            window.location.href="?p=jadwal_tools&ts=kp&id=<?php echo $id; ?>&act=detail";
          </script>
          <?php
        }
        else {
          ?>
          <script>
            alert('Data tidak valid!');
            window.location.href="?p=jadwal_tools&ts=kp&id=<?php echo $id; ?>&act=detail";
          </script>
          <?php
        }
      }
    elseif ($act == 'x')
      {
        $query_acc_jadwal = "UPDATE jadwal_kp SET
          status = 'Ditolak'
          WHERE id_jadwal_kp = '$id'
        ";
        if ($sql_acc_jadwal = $mysqli->query($query_acc_jadwal)) {
          ?>
          <script>
            alert('Data surat berhasil ditolak!');
            window.location.href="?p=jadwal_tools&ts=kp&id=<?php echo $id; ?>&act=detail";
          </script>
          <?php
        }
        else {
          ?>
          <script>
            alert('Data tidak valid!');
            window.location.href="?p=jadwal_tools&ts=kp&id=<?php echo $id; ?>&act=detail";
          </script>
          <?php
        }
      }
      elseif ($act == 'update')
        {
          $query_acc_jadwal = "UPDATE jadwal_kp SET
            status = 'Disetujui'
            WHERE id_jadwal_kp = '$id'
          ";
          if ($sql_acc_jadwal = $mysqli->query($query_acc_jadwal)) {
            ?>
            <script>
              alert('Data jadwal berhasil disetujui!');
              window.location.href="?p=jadwal_tools&ts=kp&id=<?php echo $id; ?>&act=detail";
            </script>
            <?php
          }
          else {
            ?>
            <script>
              alert('Data tidak valid!');
              window.location.href="?p=jadwal_tools&ts=kp&id=<?php echo $id; ?>&act=detail";
            </script>
            <?php
          }
        }
  }
  elseif ($ts == 'ta') {
    if ($act == 'detail')
      {
        include 'konten/02_pages/jta_detail.php';
      }
    elseif ($act == 'ubah')
      {
        include 'konten/02_pages/jta_ubah.php';
      }
    elseif ($act == 'v')
      {
        $query_acc_jadwal = "UPDATE jadwal_ta SET
          status = 'Disetujui'
          WHERE id_jadwal_ta = '$id'
        ";
        if ($sql_acc_jadwal = $mysqli->query($query_acc_jadwal)) {
          ?>
          <script>
            alert('Data surat berhasil disetujui!');
            window.location.href="?p=jadwal_tools&ts=ta&id=<?php echo $id; ?>&act=detail";
          </script>
          <?php
        }
        else {
          ?>
          <script>
            alert('Data tidak valid!');
            window.location.href="?p=jadwal_tools&ts=ta&id=<?php echo $id; ?>&act=detail";
          </script>
          <?php
        }
      }
    elseif ($act == 'x')
      {
        $query_acc_jadwal = "UPDATE jadwal_ta SET
          status = 'Ditolak'
          WHERE id_jadwal_ta = '$id'
        ";
        if ($sql_acc_jadwal = $mysqli->query($query_acc_jadwal)) {
          ?>
          <script>
            alert('Data surat berhasil ditolak!');
            window.location.href="?p=jadwal_tools&ts=ta&id=<?php echo $id; ?>&act=detail";
          </script>
          <?php
        }
        else {
          ?>
          <script>
            alert('Data tidak valid!');
            window.location.href="?p=jadwal_tools&ts=ta&id=<?php echo $id; ?>&act=detail";
          </script>
          <?php
        }
      }
  }
?>
