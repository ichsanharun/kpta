<?php
if (
  !empty($_POST['tanggal_sidang']) AND
  !empty($_POST['ruang_sidang']) AND
  !empty($_POST['waktu_sidang_start']) AND
  !empty($_POST['waktu_sidang_end'])
) {
  $tanggal_sidang = $_POST['tanggal_sidang'];
  $ruang_sidang = $_POST['ruang_sidang'];
  $w1 = $_POST['waktu_sidang_start'];
  $w2 = $_POST['waktu_sidang_end'];
  $w3 = $w2 - $w1;
  //echo $w2;
}
else {
  ?>
    <script>
      alert('Maaf, data yang anda masukkan tidak valid!');
      window.location.href="?p=KP_kelola_sidang";
    </script>
  <?php
}
 ?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
      <a href="?p=TA_kelola_sidang">Kelola Pendaftaran Sidang</a>
  </li>
  <li class="breadcrumb-item active">Buat Jadwal Sidang</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group row py-0 mb-0">
        <label class="col-sm-4 col-form-label font-weight-bold">Tanggal</label>
        <label class="col-sm-1 col-form-label">:</label>
        <label class="col-sm-4 col-form-label"><?php echo $tanggal_sidang; ?></label>
      </div>
      <div class="form-group row mb-0">
        <label class="col-sm-4 col-form-label font-weight-bold">Waktu Dimulai</label>
        <label class="col-sm-1 col-form-label">:</label>
        <label class="col-sm-4 col-form-label"><?php echo $w1; ?></label>
      </div>
      <div class="form-group row mb-0">
        <label class="col-sm-4 col-form-label font-weight-bold">Waktu Berakhir</label>
        <label class="col-sm-1 col-form-label">:</label>
        <label class="col-sm-4 col-form-label"><?php echo $w2; ?></label>
      </div>
      <div class="form-group row mb-0">
        <label class="col-sm-4 col-form-label font-weight-bold">Jumlah Kloter</label>
        <label class="col-sm-1 col-form-label">:</label>
        <label class="col-sm-4 col-form-label"><?php echo $w3; ?></label>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <form action="?a=sidang_aksi&ts=kp" method="post">
      <input type="hidden" name="tanggal_sidang" value="<?php echo $tanggal_sidang; ?>">
      <input type="hidden" name="ruang_sidang" value="<?php echo $ruang_sidang; ?>">
      <input type="hidden" name="waktu_sidang_start" value="<?php echo $w1; ?>">
      <input type="hidden" name="waktu_sidang_end" value="<?php echo $w2; ?>">
      <input type="hidden" name="kloter" value="<?php echo $w3; ?>">
    <table class="table table-bordered table-hovered" id="dataTable" cellspacing=0 cellpadding=0>
      <thead class="thead-light">
        <tr>
          <th><input type="checkbox" name="check_all" id="check_all" onclick="cek(this)"></th>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Pembimbing</th>
          <th>Status</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      $no=0;
      $query_pta_num = "SELECT * FROM jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen ON `mahasiswa`.`nim` = `jadwal_kp`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` WHERE `jadwal_kp`.`status_sidang_kp` = 'Menunggu' LIMIT $w3";
      $sql_pta_num = mysqli_query($mysqli,$query_pta_num);
      foreach ($sql_pta_num as $key) {
        extract($key);
        $no++;
        ?>
          <tr>
            <td><input type="checkbox" id="id_jadwal_kp[]" name="id_jadwal_kp[]" value="<?php echo $id_jadwal_kp; ?>"></input></td>
            <td><?php echo $no; ?></td>
            <td><?php echo $nim; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $nama_dosen; ?></td>
            <td><?php echo $status_sidang_kp; ?></td>
            <td>
              <a href="?p=ta_detail&id=<?php echo $id_jadwal_kp; ?>" class="btn btn-info btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Detail</a>

            </td>
          </tr>

        <?php
        }
        ?>
    </table>
    <div class="form-group mb-2">
      <button type="submit" class="form-control btn btn-info">
        <i class="fa fa-fw fa-check"></i>Submit</button>
    </div>
    </form>
  </div>
</div>
