<?php


$tipe = $_POST['tipe'];
if ($tipe == "KP") {
  $nim = $_POST['nim'];
  $nama_instansi = $_POST['nama_instansi'];
  $alamat_instansi = $_POST['alamat_instansi'];
  $id_dosen = $_POST['id_dosen'];

  $judul_kp = $_POST['judul_kp'];
  $query = "SELECT max(id_jadwal_kp) as maxKode FROM jadwal_kp";
  $hasil = $mysqli->query($query);
  $data  = mysqli_fetch_array($hasil);
  $kodeTrans = $data['maxKode'];
  $noUrut = (int) substr($kodeTrans, 8, 4);
  $noUrut++;
  $char = "KP".date("Ym");
  $id_surat = $char . sprintf("%04s", $noUrut);

  if (
    !empty($nim) AND
    !empty($nama_instansi) AND
    !empty($alamat_instansi) AND
    !empty($id_dosen) AND
    !empty($judul_kp)
  ) {
        $queryupdate_surat = "INSERT INTO jadwal_kp
        (
          id_jadwal_kp,
          judul_kp,
          nim,
          nama_instansi,
          alamat_instansi,
          id_dosen,
          status
        )
        VALUES
        (
          '$id_surat',
          '$judul_kp',
          '$nim',
          '$nama_instansi',
          '$alamat_instansi',
          '$id_dosen',
          'Menunggu'
        )
        ";
        $sqlupdate_surat = $mysqli->query($queryupdate_surat);
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
          window.location.href="?p=KP_daftar_baru";
        </script>
      <?php
    }
}
elseif ($tipe == "TA") {
  $nim = $_POST['nim'];
  $nama_instansi = $_POST['nama_instansi'];
  $alamat_instansi = $_POST['alamat_instansi'];
  $id_dosen = $_POST['id_dosen'];

  $judul_ta = $_POST['judul_ta'];
  $query = "SELECT max(id_jadwal_ta) as maxKode FROM jadwal_ta";
  $hasil = $mysqli->query($query);
  $data  = mysqli_fetch_array($hasil);
  $kodeTrans = $data['maxKode'];
  $noUrut = (int) substr($kodeTrans, 8, 4);
  $noUrut++;
  $char = "TA".date("Ym");
  $id_surat = $char . sprintf("%04s", $noUrut);

  if (
    !empty($nim) AND
    !empty($nama_instansi) AND
    !empty($alamat_instansi) AND
    !empty($judul_ta)
  ) {
        $queryupdate_surat = "INSERT INTO jadwal_ta
        (
          id_jadwal_ta,
          judul_ta,
          nim,
          nama_instansi,
          id_dosen,
          alamat_instansi,
          status
        )
        VALUES
        (
          '$id_surat',
          '$judul_ta',
          '$nim',
          '$nama_instansi',
          '$id_dosen',
          '$alamat_instansi',
          'Menunggu'
        )
        ";
        $sqlupdate_surat = $mysqli->query($queryupdate_surat);
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
          window.location.href="?p=TA_daftar_baru";
        </script>
      <?php
    }
}

elseif ($tipe == "sidang") {

  if (!empty($_POST['id_jadwal']) AND
      !empty($_POST['tipe_sidang'])
  ) {
      $id_jadwal = $_POST['id_jadwal'];
      $tipe_sidang = $_POST['tipe_sidang'];
      $ruang_sidang = $_POST['ruang_sidang'];
      if ($tipe_sidang == "KP") {
        $tanggal_sidang_kp_start = $_POST['tanggal_sidang']." ".$_POST['waktu_sidang_start'];
        $tanggal_sidang_kp_end = $_POST['tanggal_sidang']." ".$_POST['waktu_sidang_end'];
        $query_cek_jadwal = "SELECT * FROM jadwal_kp WHERE tanggal_sidang_kp_start = '$tanggal_sidang_kp_start' AND ruang_sidang_kp = '$ruang_sidang' AND id_jadwal_kp != '$id_jadwal'";
        $sql_cek = $mysqli->query($query_cek_jadwal);
        if (mysqli_num_rows($sql_cek)>0) {
          ?>
            <script>
              alert('Maaf, silahkan pilih waktu yang lain!');
              window.location.href="?p=ta_tools&id=<?php echo $id_jadwal; ?>";
            </script>
          <?php
        }
        else {
          $query_update_kp = "UPDATE jadwal_kp SET
                              status_sidang_kp = 'Didaftarkan',
                              tanggal_sidang_kp_start = '$tanggal_sidang_kp_start',
                              ruang_sidang_kp = '$ruang_sidang',
                              tanggal_sidang_kp_end = '$tanggal_sidang_kp_end'
                              WHERE id_jadwal_kp = '$id_jadwal'";
          $sql_update_kp = $mysqli->query($query_update_kp);
          
        }

        
        if ($sql_update_ta) {
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
              window.location.href="?p=TA_kelola_sidang";
            </script>
          <?php
        }
        //
      }
      elseif ($tipe_sidang == "TA") {
        $tanggal_sidang_ta_start = $_POST['tanggal_sidang']." ".$_POST['waktu_sidang_start'];
        $tanggal_sidang_ta_end = $_POST['tanggal_sidang']." ".$_POST['waktu_sidang_end'];
        $query_cek_jadwal = "SELECT * FROM jadwal_ta WHERE tanggal_sidang_ta_start = '$tanggal_sidang_ta_start' AND ruang_sidang_ta = '$ruang_sidang' AND id_jadwal_ta != '$id_jadwal'";
        $sql_cek = $mysqli->query($query_cek_jadwal);
        if (mysqli_num_rows($sql_cek)>0) {
          ?>
            <script>
              alert('Maaf, silahkan pilih waktu yang lain!');
              window.location.href="?p=ta_tools&id=<?php echo $id_jadwal; ?>";
            </script>
          <?php
        }
        else {
          $query_update_ta = "UPDATE jadwal_ta SET
                              status_sidang_ta = 'Didaftarkan',
                              tanggal_sidang_ta_start = '$tanggal_sidang_ta_start',
                              ruang_sidang_ta = '$ruang_sidang',
                              tanggal_sidang_ta_end = '$tanggal_sidang_ta_end'
                              WHERE id_jadwal_ta = '$id_jadwal'";
          $sql_update_ta = $mysqli->query($query_update_ta);
        }

        //$query_cek_ta_dosen = "SELECT"
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
      }
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
