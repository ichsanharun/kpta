<?php


$tipe = $_GET['ts'];
if ($tipe == "ta") {

  if (!empty($_POST['id_jadwal_ta']) AND
      !empty($_POST['tanggal_sidang']) AND
          !empty($_POST['waktu_sidang_start']) AND
              !empty($_POST['waktu_sidang_end']) AND
                  !empty($_POST['ruang_sidang']) AND
                      !empty($_POST['kloter'])
  ) {
      $id_jadwal = $_POST['id_jadwal_ta'];
      $tanggal_sidang = $_POST['tanggal_sidang'];
      $waktu_sidang_start = $_POST['waktu_sidang_start'];
      $waktu_sidang_end = $_POST['waktu_sidang_end'];
      $ruang_sidang = $_POST['ruang_sidang'];
      $kloter = $_POST['kloter'];
      $mulai = (int) substr($waktu_sidang_start, 0, 2);
      $akhir = (int) substr($waktu_sidang_end, 0, 2);
      $jumlah = count($id_jadwal);
      for ($i=0; $i < $jumlah ; $i++) {
        if ($mulai<10 ) {
          $tmulai = "0".$mulai.":00";
          $takhir = $mulai+1;
          $takhir = $takhir.":00";
        }
        else {
          $tmulai = $mulai.":00";
          $takhir = $mulai+1;
          $takhir = $takhir.":00";
        }
        $tanggal_start = $tanggal_sidang." ".$tmulai;
        $tanggal_end = $tanggal_sidang." ".$takhir;
        $query_update_sidang_ta = "UPDATE jadwal_ta SET
                                  status_sidang_ta = 'Didaftarkan',
                                  tanggal_sidang_ta_start = '$tanggal_start',
                                  ruang_sidang_ta = '$ruang_sidang',
                                  tanggal_sidang_ta_end = '$tanggal_end'
                                  WHERE id_jadwal_ta = '$id_jadwal[$i]'";
        $query_insert_sidang_ta = "INSERT INTO sidang_ta
                                  (
                                    id_jadwal_ta,
                                    id_ruang,
                                    tanggal_sidang_ta_start,
                                    tanggal_sidang_ta_end
                                  )
                                  VALUES
                                  (
                                    '$id_jadwal[$i]',
                                    '$ruang_sidang',
                                    '$tanggal_start',
                                    '$tanggal_end'
                                  )";

        $sql_update_ta = $mysqli->query($query_update_sidang_ta);
        $sql_insert_ta = $mysqli->query($query_insert_sidang_ta);
        $mulai++;
      }

        if ($sql_update_ta) {
          ?>
            <script>
              alert('Sidang telah didaftarkan!');
              window.location.href="?p=TA_kelola_sidang";
            </script>
          <?php
        }
        else {
          ?>
            <script>
              alert('Maaf, data yang anda masukkan tidak valid!');
              window.location.href="?p=TA_kelola_sidang";
            </script>
          <?php
        }
        //
      }
  else {
    ?>
      <script>
        alert('Mohon masukkan data dengan benar!');
        window.location.href="?p=TA_kelola_sidang";
      </script>
    <?php
  }
}
elseif ($tipe == "kp") {

  if (!empty($_POST['id_jadwal_kp']) AND
      !empty($_POST['tanggal_sidang']) AND
          !empty($_POST['waktu_sidang_start']) AND
              !empty($_POST['waktu_sidang_end']) AND
                  !empty($_POST['ruang_sidang']) AND
                      !empty($_POST['kloter'])
  ) {
      $id_jadwal = $_POST['id_jadwal_kp'];
      $tanggal_sidang = $_POST['tanggal_sidang'];
      $waktu_sidang_start = $_POST['waktu_sidang_start'];
      $waktu_sidang_end = $_POST['waktu_sidang_end'];
      $ruang_sidang = $_POST['ruang_sidang'];
      $kloter = $_POST['kloter'];
      $mulai = (int) substr($waktu_sidang_start, 0, 2);
      $akhir = (int) substr($waktu_sidang_end, 0, 2);
      $jumlah = count($id_jadwal);
      for ($i=0; $i < $jumlah ; $i++) {
        if ($mulai<10 ) {
          $tmulai = "0".$mulai.":00";
          $takhir = $mulai+1;
          $takhir = $takhir.":00";
        }
        else {
          $tmulai = $mulai.":00";
          $takhir = $mulai+1;
          $takhir = $takhir.":00";
        }
        $tanggal_start = $tanggal_sidang." ".$tmulai;
        $tanggal_end = $tanggal_sidang." ".$takhir;
        $query_update_sidang_kp = "UPDATE jadwal_kp SET
                                  status_sidang_kp = 'Didaftarkan',
                                  tanggal_sidang_kp_start = '$tanggal_start',
                                  ruang_sidang_kp = '$ruang_sidang',
                                  tanggal_sidang_kp_end = '$tanggal_end'
                                  WHERE id_jadwal_kp = '$id_jadwal[$i]'";
        $query_insert_sidang_kp = "INSERT INTO sidang_kp
                                  (
                                    id_jadwal_kp,
                                    id_ruang,
                                    tanggal_sidang_kp_start,
                                    tanggal_sidang_kp_end
                                  )
                                  VALUES
                                  (
                                    '$id_jadwal[$i]',
                                    '$ruang_sidang',
                                    '$tanggal_start',
                                    '$tanggal_end'
                                  )";

        $sql_update_kp = $mysqli->query($query_update_sidang_kp);
        $sql_insert_kp = $mysqli->query($query_insert_sidang_kp);
        $mulai++;
      }

        if ($sql_update_kp) {
          ?>
            <script>
              alert('Sidang telah didaftarkan!');
              window.location.href="?p=KP_kelola_sidang";
            </script>
          <?php
        }
        else {
          ?>
            <script>
              alert('Maaf, data yang anda masukkan tidak valid!');
              window.location.href="?p=KP_kelola_sidang";
            </script>
          <?php
        }
        //
      }
  else {
    ?>
      <script>
        alert('Mohon masukkan data dengan benar!');
        window.location.href="?p=KP_kelola_sidang";
      </script>
    <?php
  }
}
elseif ($tipe == "update_ta") {

  if (!empty($_POST['id_dosen']) AND
      !empty($_POST['id_sidang_ta'])
  ) {
      $id_dosen = $_POST['id_dosen'];
      $tanggal_sidang = $_POST['tanggal_sidang'];
      $id_sidang_ta = $_POST['id_sidang_ta'];
      $ruang_sidang = $_POST['ruang_sidang'];
      foreach ($id_dosen as $key => $value) {
        if ($key == 0) {
          $d1 = $value;
        }
        elseif ($key == 1) {
          $d2 = $value;
        }
        elseif ($key == 2) {
          $d3 = $value;
        }
      }
      echo
      $query_select_sidang_ta = "SELECT * FROM `sidang_ta_detail` RIGHT JOIN `sidang_ta` ON `sidang_ta_detail`.`id_sidang_ta` = `sidang_ta`.`id_sidang_ta` WHERE `sidang_ta`.`id_ruang` != '$ruang_sidang' AND id_dosen_penguji = '$d1' OR `sidang_ta`.`id_ruang` != '$ruang_sidang' AND id_dosen_penguji = '$d2' OR `sidang_ta`.`id_ruang` != '$ruang_sidang' AND id_dosen_penguji = '$d3'";
      $sql_select = $mysqli->query($query_select_sidang_ta);
      if (mysqli_num_rows($sql_select)>0) {
        ?>
          <script>
            alert('Maaf, dosen yang dipilih sudah ditetapkan di ruang lain!');
            window.location.href="?p=TA_kelola_sidang";
          </script>
        <?php
      }
      else {
        foreach ($id_sidang_ta as $key => $value) {
          $query_cek_dos = "SELECT * FROM `sidang_ta_detail` WHERE id_sidang_ta = '$value'";
          $sql_cek_dos = $mysqli->query($query_cek_dos);
          if (mysqli_num_rows($sql_cek_dos)>0) {
            $query_delete_penguji = "DELETE FROM sidang_ta_detail WHERE id_sidang_ta = '$value'";
            $sql_delete_penguji = $mysqli->query($query_delete_penguji);

          }
          else {

          }
          foreach ($id_dosen as $key_1 => $value_1) {
            $query_insert_penguji = "INSERT INTO sidang_ta_detail
                                      (
                                        id_sidang_ta,
                                        id_dosen_penguji
                                      )
                                      VALUES
                                      (
                                        '$value',
                                        '$value_1'
                                      )";
            $sql_insert_penguji = $mysqli->query($query_insert_penguji);
          }
        }
      }


        if ($sql_insert_penguji) {
          ?>
            <script>
              alert('Penguji telah diupdate!');
              window.location.href="?p=TA_kelola_sidang";
            </script>
          <?php
        }
        else {
          ?>
            <script>
              alert('Maaf, data yang anda masukkan tidak valid!');
              window.location.href="?p=TA_kelola_sidang";
            </script>
          <?php
        }
        //
      }
  else {
    ?>
      <script>
        alert('Mohon masukkan data dengan benar!');
        window.location.href="?p=TA_kelola_sidang";
      </script>
    <?php
  }
}
  else {
    ?>
    <script>
    alert('Data TIDAK Berhasil Disimpan!');
    window.location.href="?p=profil";
    </script>
    <?php
  }




?>
