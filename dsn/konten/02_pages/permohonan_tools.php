<?php

  if  (
        (!empty($_GET['ts'])) AND
        (!empty($_GET['nim'])) AND
        (!empty($_GET['act']))
      ) {
          $ts = $_GET['ts'];
          $nim = $_GET['nim'];
          $act = $_GET['act'];
        }
  else {
    ?>
      <script>
        alert('Data Tidak Valid!');
        window.location.href="?p=permohonan_SIK";
      </script>
    <?php
  }

  if ($ts == 'kp') {
    if ($act == 'detail')
      {
        include 'konten/02_pages/pkp_detail.php';
      }
    elseif ($act == 'ubah')
      {
        include 'konten/02_pages/pkp_ubah.php';
      }
    elseif ($act == 'v')
      {
        $query_acc_surat = "UPDATE surat_kp SET
          status = 'Disetujui',
          notif = 'Tertutup'
          WHERE nim = '$nim'
        ";
        if ($sql_acc_surat = $mysqli->query($query_acc_surat)) {
          ?>
          <script>
            alert('Data surat berhasil disetujui!');
            window.location.href="?p=permohonan_tools&ts=kp&nim=<?php echo $nim; ?>&act=detail";
          </script>
          <?php
        }
        else {
          ?>
          <script>
            alert('Data tidak valid!');
            window.location.href="?p=permohonan_tools&ts=kp&nim=<?php echo $nim; ?>&act=detail";
          </script>
          <?php
        }
      }
    elseif ($act == 'x')
      {
        $query_acc_surat = "UPDATE surat_kp SET
          status = 'Ditolak',
          notif = 'Tertutup'
          WHERE nim = '$nim'
        ";
        if ($sql_acc_surat = $mysqli->query($query_acc_surat)) {
          ?>
          <script>
            alert('Data surat berhasil ditolak!');
            window.location.href="?p=permohonan_tools&ts=kp&nim=<?php echo $nim; ?>&act=detail";
          </script>
          <?php
        }
        else {
          ?>
          <script>
            alert('Data tidak valid!');
            window.location.href="?p=permohonan_tools&ts=kp&nim=<?php echo $nim; ?>&act=detail";
          </script>
          <?php
        }
      }
  }
  elseif ($ts == 'ta') {
    if ($act == 'detail')
      {
        include 'konten/02_pages/pta_detail.php';
      }
    elseif ($act == 'ubah')
      {
        include 'konten/02_pages/pta_ubah.php';
      }
    elseif ($act == 'v')
      {
        $query_acc_surat = "UPDATE surat_ta SET
          status = 'Disetujui',
          notif = 'Tertutup'
          WHERE nim = '$nim'
        ";
        if ($sql_acc_surat = $mysqli->query($query_acc_surat)) {
          ?>
          <script>
            alert('Data surat berhasil disetujui!');
            window.location.href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=detail";
          </script>
          <?php
        }
        else {
          ?>
          <script>
            alert('Data tidak valid!');
            window.location.href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=detail";
          </script>
          <?php
        }
      }
    elseif ($act == 'x')
      {
        $query_acc_surat = "UPDATE surat_ta SET
          status = 'Ditolak',
          notif = 'Tertutup'
          WHERE nim = '$nim'
        ";
        if ($sql_acc_surat = $mysqli->query($query_acc_surat)) {
          ?>
          <script>
            alert('Data surat berhasil ditolak!');
            window.location.href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=detail";
          </script>
          <?php
        }
        else {
          ?>
          <script>
            alert('Data tidak valid!');
            window.location.href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=detail";
          </script>
          <?php
        }
      }
  }
?>
