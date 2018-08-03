<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="?p=TA_absen">Kerja Praktek</a>
  </li>
  <li class="breadcrumb-item active">Penilaian Sidang</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div data-toggle="collapse" data-target="#collapseHead">
    <label class="h3">Detail Sidang</label>
    <hr>
  </div>
  <div class="col-lg-8 collapse" id="collapseHead" aria-labelledby="headingOne" data-parent="#accordion">
    <?php
    $query_penilaian = "SELECT * FROM `sidang_kp_detail` WHERE `sidang_kp`.`id_sidang_kp` = '$_GET[id]'";
    $sql_penilaian = $mysqli->query($query_penilaian);
    $query_profil_mhs_sidang = "SELECT * FROM `sidang_kp` INNER JOIN jadwal_kp INNER JOIN mahasiswa INNER JOIN jurusan INNER JOIN dosen INNER JOIN ruang ON `sidang_kp`.`id_jadwal_kp` = `jadwal_kp`.`id_jadwal_kp`AND `jadwal_kp`.`nim` = `mahasiswa`.`nim` AND `mahasiswa`.`kode_jurusan` = `jurusan`.`kode_jurusan` AND `jadwal_kp`.`id_dosen` = `dosen`.`id_dosen` AND `sidang_kp`.`id_ruang` = `ruang`.`id_ruang` WHERE `sidang_kp`.`id_sidang_kp` = '$_GET[id]'";
    $sql_profil_mhs_sidang = $mysqli->query($query_profil_mhs_sidang);
    foreach ($sql_profil_mhs_sidang as $key) {
      extract($key);
      $id = $id_sidang_kp;
      $nim = $nim;
      $nama = $nama_mahasiswa;
      ?>
        <div class="form-group row py-0 mb-0">
          <label class="col-sm-4 col-form-label font-weight-bold">NIM</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $nim; ?></label>
        </div>
        <div class="form-group row mb-0">
          <label class="col-sm-4 col-form-label font-weight-bold">Nama Mahasiswa</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $nama_mahasiswa; ?></label>
        </div>
        <div class="form-group row mb-0">
          <label class="col-sm-4 col-form-label font-weight-bold">Program Studi</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $nama_jurusan; ?></label>
        </div>
        <div class="form-group row py-0 mb-0">
          <label class="col-sm-4 col-form-label font-weight-bold">Peminatan</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $kode_jurusan; ?></label>
        </div>
        <div class="form-group row mb-0">
          <label class="col-sm-4 col-form-label font-weight-bold">Judul Penelitian</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $judul_kp; ?></label>
        </div>
        <div class="form-group row mb-0">
          <label class="col-sm-4 col-form-label font-weight-bold">Nama Instansi</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $nama_instansi; ?></label>
        </div>
        <div class="form-group row py-0 mb-0">
          <label class="col-sm-4 col-form-label font-weight-bold">Alamat Instansi</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $alamat_instansi; ?></label>
        </div>
        <div class="form-group row mb-0">
          <label class="col-sm-4 col-form-label font-weight-bold">Pembimbing</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $id_dosen; ?></label>
        </div>
        <div class="form-group row mb-0">
          <label class="col-sm-4 col-form-label font-weight-bold">Ruang Sidang</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $nama_ruang; ?></label>
        </div>
      <?php
      }
      ?>
  </div>
</div>
<form action="?a=update_nilai_sidang&ts=kp" method="post">
<div class="row">
  <div class="col-lg-12">
    <div class="form-group row">
      <input type="hidden" id="id" name="id_sidang" value="<?php echo $_GET['id']; ?>">
      <input type="hidden" id="id" name="id_jadwal" value="<?php echo $id_jadwal_kp; ?>">
      <label for="staticEmail" class="col-sm-3 col-form-label">Sikap dan Penampilan</label>
      <?php
      foreach ($sql_skp as $key) {
        extract($key);
        if ($n_1 == '') {
          $n_1 = 0;
        }
        if ($n_2 == '') {
          $n_2 = 0;
        }
        if ($n_3 == '') {
          $n_3 = 0;
        }
        if ($n_4 == '') {
          $n_4 = 0;
        }
        if ($n_5 == '') {
          $n_5 = 0;
        }
        if ($n_6 == '') {
          $n_6 = 0;
        }
        if ($n_total == '') {
          $n_total = 0;
        }
      ?>
      <div class="col-sm-2">
        <input class="form-control" type="number" name="n_1" id="n_1" value="<?php echo $n_1 ?>" onkeyup="kalk_n()" required>
      </div>
      <div class="col-sm-4">
        <label for="staticEmail" class="col-sm-4 col-form-label">Bobot 10%</label>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-3 col-form-label">Kesiapan Presentasi</label>
      <div class="col-sm-2">
        <input class="form-control" type="number" name="n_2" id="n_2" value="<?php echo $n_2 ?>" onkeyup="kalk_n()" required>
      </div>
      <div class="col-sm-4">
        <label for="staticEmail" class="col-sm-4 col-form-label">Bobot 10%</label>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-3 col-form-label">Isi Materi Presentasi</label>
      <div class="col-sm-2">
        <input class="form-control" type="number" name="n_3" id="n_3" value="<?php echo $n_3 ?>" onkeyup="kalk_n()" required>
      </div>
      <div class="col-sm-4">
        <label for="staticEmail" class="col-sm-4 col-form-label">Bobot 20%</label>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-3 col-form-label">Kemampuan Penguasaan Materi</label>
      <div class="col-sm-2">
        <input class="form-control" type="number" name="n_4" id="n_4" value="<?php echo $n_4 ?>" onkeyup="kalk_n()" required>
      </div>
      <div class="col-sm-4">
        <label for="staticEmail" class="col-sm-4 col-form-label">Bobot 10%</label>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-3 col-form-label">Isi Materi Laporan</label>
      <div class="col-sm-2">
        <input class="form-control" type="number" name="n_5" id="n_5" value="<?php echo $n_5 ?>" onkeyup="kalk_n()" required>
      </div>
      <div class="col-sm-4">
        <label for="staticEmail" class="col-sm-4 col-form-label">Bobot 30%</label>
      </div>
    </div>
    <div class="form-group row">
      <label for="staticEmail" class="col-sm-3 col-form-label">Kemampuan Penguasaan Pertanyaan</label>
      <div class="col-sm-2">
        <input class="form-control" type="number" name="n_6" id="n_6" value="<?php echo $n_6 ?>" onkeyup="kalk_n()" required>
      </div>
      <div class="col-sm-4">
        <label for="staticEmail" class="col-sm-4 col-form-label">Bobot 20%</label>
      </div>
    </div>

    <div class="form-group row">
      <label for="staticEmail" class="col-sm-3 col-form-label">Total Nilai</label>
      <div class="col-sm-2">
        <input class="form-control" type="text" name="n_total" id="n_total" value="<?php echo $n_total ?>" onkeyup="kalk_n()" required readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="staticEmail" class="col-sm-3 col-form-label">Catatan Penguji</label>
      <div class="col-sm-7">
        <textarea class="form-control" name="catatan_penguji" required ><?php echo $catatan_penguji; ?></textarea>
      </div>
    </div>
    <?php } ?>
    <button type="submit" class="btn btn-primary btn-sm">
      <i class="fa fa-fw fa-arrow-circle-right"></i>Submit</button>
  </div>
</div>
</form>
