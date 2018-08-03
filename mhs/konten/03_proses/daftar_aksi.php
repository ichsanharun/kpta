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
  $id = $char . sprintf("%04s", $noUrut);

  if (
    !empty($nim) AND
    !empty($nama_instansi) AND
    !empty($alamat_instansi) AND
    !empty($id_dosen) AND
    !empty($judul_kp)
  ) {
      if ($password == $konfirmasi_password) {

        $queryupdate_jadwal = "INSERT INTO jadwal_kp
        (
          id_jadwal_kp,
          judul_kp,
          nim,
          nama_instansi,
          alamat_instansi,
          id_dosen,
          status,
          file_kp
        )
        VALUES
        (
          '$id',
          '$judul_kp',
          '$nim',
          '$nama_instansi',
          '$alamat_instansi',
          '$id_dosen',
          'Menunggu',
          '$nama'
        )
        ";
        $sqlupdate_jadwal = $mysqli->query($queryupdate_jadwal);
        ?>
          <script>
            alert('Data Berhasil Disimpan!');
            window.location.href="?p=KP_absen";
          </script>
        <?php
      }
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
  $id = $char . sprintf("%04s", $noUrut);

  if (
    !empty($nim) AND
    !empty($nama_instansi) AND
    !empty($alamat_instansi) AND
    !empty($judul_ta)
  ) {
        $queryupdate_jadwal = "INSERT INTO jadwal_ta
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
          '$id',
          '$judul_ta',
          '$nim',
          '$nama_instansi',
          '$id_dosen',
          '$alamat_instansi',
          'Menunggu'
        )
        ";
        $sqlupdate_jadwal = $mysqli->query($queryupdate_jadwal);
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
      if ($tipe_sidang == "KP") {
        $ekstensi_diperbolehkan	= array('pdf','doc','docx');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          if($ukuran < 1044070){
            move_uploaded_file($file_tmp, '../mhs/file/'.$nama);


          $query_update_kp = "UPDATE jadwal_kp SET status_sidang_kp = 'Menunggu',file_kp = '$nama' WHERE id_jadwal_kp = '$id_jadwal'";
          $sql_update_kp = $mysqli->query($query_update_kp);
          if ($sql_update_kp) {
            ?>
              <script>
                alert('Sidang telah didaftarkan. Silahkan menunggu 3x24 Jam untuk pembaharuan jadwal sidang anda!');
                window.location.href="?p=pendaftaran_sidang";
              </script>
            <?php
          }
          else {
            ?>
              <script>
                alert('Maaf, data yang anda masukkan tidak valid!');
                window.location.href="?p=pendaftaran_sidang";
              </script>
            <?php
          }
          }
          else{
            ?>
              <script>
                alert('UKURAN FILE TERLALU BESAR!');
                window.location.href="?p=pendaftaran_sidang";
              </script>
            <?php
          }
        }
        else{
          ?>
            <script>
              alert('EKSTENSI TIDAK DIPERBOLEHKAN!');
              window.location.href="?p=pendaftaran_sidang";
            </script>
          <?php
        }
      }
      elseif ($tipe_sidang == "TA") {
        $ekstensi_diperbolehkan	= array('pdf','doc','docx');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['file']['size'];
        $file_tmp = $_FILES['file']['tmp_name'];
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
          if($ukuran < 1044070){
            move_uploaded_file($file_tmp, '../mhs/file/'.$nama);

            $query_update_ta = "UPDATE jadwal_ta SET status_sidang_ta = 'Menunggu', file_ta = '$nama' WHERE id_jadwal_ta = '$id_jadwal'";
            $sql_update_ta = $mysqli->query($query_update_ta);
            if ($sql_update_ta) {
              ?>
                <script>
                  alert('Sidang telah didaftarkan. Silahkan menunggu 3x24 Jam untuk pembaharuan jadwal sidang anda!');
                  window.location.href="?p=pendaftaran_sidang";
                </script>
              <?php
            }
            else {
              ?>
                <script>
                  alert('Maaf, data yang anda masukkan tidak valid!');
                  window.location.href="?p=pendaftaran_sidang";
                </script>
              <?php
            }
            }
            else{
              ?>
                <script>
                  alert('UKURAN FILE TERLALU BESAR!');
                  window.location.href="?p=pendaftaran_sidang";
                </script>
              <?php
            }
          }
          else{
            ?>
              <script>
                alert('EKSTENSI TIDAK DIPERBOLEHKAN!');
                window.location.href="?p=pendaftaran_sidang";
              </script>
            <?php
          }
        }
      }

  else {
    ?>
      <script>
        alert('Mohon masukkan data dengan benar!');
        window.location.href="?p=pendaftaran_sidang";
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
