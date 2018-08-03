<?php

  if  (
        (!empty($_GET['user'])) AND
        (!empty($_GET['id'])) AND
        (!empty($_GET['act']))
      ) {
          $user = $_GET['user'];
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

  if ($user == 'dosen') {
    if ($act == 'detail')
      {
        include 'konten/02_pages/dosen_detail.php';
      }
    elseif ($act == 'ubah')
      {
        include 'konten/02_pages/dosen_ubah.php';
      }

  }
  elseif ($user == 'mhs') {
    if ($act == 'detail')
      {
        include 'konten/02_pages/mhs_detail.php';
      }
    elseif ($act == 'ubah')
      {
        include 'konten/02_pages/mhs_ubah.php';
      }

  }
?>
