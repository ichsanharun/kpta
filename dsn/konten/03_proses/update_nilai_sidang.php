<?php
if (
  !empty($_POST['id_sidang']) AND
  !empty($_POST['id_jadwal']) AND
  !empty($_POST['n_1']) AND
  !empty($_POST['n_2']) AND
  !empty($_POST['n_3']) AND
  !empty($_POST['n_4']) AND
  !empty($_POST['n_5']) AND
  !empty($_POST['n_6']) AND
  !empty($_POST['n_total'])
) {
$id_sidang = $_POST['id_sidang'];
$id_jadwal = $_POST['id_jadwal'];
$n_1 = $_POST['n_1'];
$n_2 = $_POST['n_2'];
$n_3 = $_POST['n_3'];
$n_4 = $_POST['n_4'];
$n_5 = $_POST['n_5'];
$n_6 = $_POST['n_6'];
$n_total = $_POST['n_total'];
$catatan_penguji = $_POST['catatan_penguji'];
}
$tipe = $_GET['ts'];
if ($tipe == "kp") {
  $queryupdate_surat = "UPDATE sidang_kp_detail SET
  n_1 = '$n_1',
  n_2 = '$n_2',
  n_3 = '$n_3',
  n_4 = '$n_4',
  n_5 = '$n_5',
  n_6 = '$n_6',
  n_total = '$n_total',
  catatan_penguji = '$catatan_penguji'
  WHERE id_sidang_kp = '$id_sidang' AND id_dosen_penguji = '$_SESSION[id]'
  ";
  $sqlupdate_surat = $mysqli->query($queryupdate_surat);
  $query_sel = "SELECT * FROM sidang_kp_detail WHERE id_sidang_kp = '$id_sidang'";
  $sql_sel = $mysqli->query($query_sel);
  $j_sel = mysqli_num_rows($sql_sel);
  $n_sidang = 0;
  foreach ($sql_sel as $key => $value) {
    for ($i=0; $i < $j_sel; $i++) {
      if ($key == $i) {
        if ($value['n_total'] != '') {
          $n = $value['n_total'];
        }
        else {
          $n = 0;
        }
        $n_sidang = $n_sidang + $n;
      }
    }

  }
    $n_sidang = $n_sidang/$j_sel;
    if ($n_sidang > 70) {
      $hasil = "LULUS";
    }
    else {
      $hasil = "TIDAK LULUS";
    }
    echo $n_sidang;
    echo $id_jadwal;
    echo $hasil;
    $query_up = "UPDATE sidang_kp, jadwal_kp SET sidang_kp.n_akhir = '$n_sidang', jadwal_kp.hasil_sidang_kp = '$hasil' WHERE sidang_kp.id_sidang_kp = '$id_sidang' AND jadwal_kp.id_jadwal_kp = '$id_jadwal'";
    $sql_up = $mysqli->query($query_up);

  if ($sqlupdate_surat AND $sql_up) {
    ?>
      <script>
        alert('Data Berhasil Disimpan!');
        window.location.href="?p=KP_kelola_nilai_sidang&id=<?php echo $id_sidang; ?>";
      </script>
    <?php
  }


  else{
    ?>
      <script>
        alert('Mohon masukkan data dengan benar!');
        window.location.href="?p=TA_kelola_nilai_sidang&id=<?php echo $id_sidang; ?>";
      </script>
    <?php
  }
}
elseif ($tipe == "ta") {

        $queryupdate_surat = "UPDATE sidang_ta_detail SET
        n_1 = '$n_1',
        n_2 = '$n_2',
        n_3 = '$n_3',
        n_4 = '$n_4',
        n_5 = '$n_5',
        n_6 = '$n_6',
        n_total = '$n_total',
        catatan_penguji = '$catatan_penguji'
        WHERE id_sidang_ta = '$id_sidang' AND id_dosen_penguji = '$_SESSION[id]'
        ";
        $sqlupdate_surat = $mysqli->query($queryupdate_surat);
        $query_sel = "SELECT * FROM sidang_ta_detail WHERE id_sidang_ta = '$id_sidang'";
        $sql_sel = $mysqli->query($query_sel);
        $j_sel = mysqli_num_rows($sql_sel);
        $n_sidang = 0;
        foreach ($sql_sel as $key => $value) {
          for ($i=0; $i < $j_sel; $i++) {
            if ($key == $i) {
              if ($value['n_total'] != '') {
                $n = $value['n_total'];
              }
              else {
                $n = 0;
              }
              $n_sidang = $n_sidang + $n;
            }
          }

        }
          $n_sidang = $n_sidang/$j_sel;
          if ($n_sidang > 70) {
            $hasil = "LULUS";
          }
          else {
            $hasil = "TIDAK LULUS";
          }
          echo $n_sidang;
          echo $id_jadwal;
          echo $hasil;
          $query_up = "UPDATE sidang_ta, jadwal_ta SET sidang_ta.n_akhir = '$n_sidang', jadwal_ta.hasil_sidang_ta = '$hasil' WHERE sidang_ta.id_sidang_ta = '$id_sidang' AND jadwal_ta.id_jadwal_ta = '$id_jadwal'";
          $sql_up = $mysqli->query($query_up);

        if ($sqlupdate_surat AND $sql_up) {
          ?>
            <script>
              alert('Data Berhasil Disimpan!');
              window.location.href="?p=TA_kelola_nilai_sidang&id=<?php echo $id_sidang; ?>";
            </script>
          <?php
        }


        else{
          ?>
            <script>
              alert('Mohon masukkan data dengan benar!');
              window.location.href="?p=TA_kelola_nilai_sidang&id=<?php echo $id_sidang; ?>";
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
