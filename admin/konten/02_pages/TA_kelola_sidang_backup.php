<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">List Tugas Akhir</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-12">
      <form action="?a=daftar_aksi&tipe=sidang&ts=ta" method="post" class="form-inline">
        <div class="form-group mb-2">
          <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal: </label>
          <div class="col-sm-2">
            <input type="date" class="form-control" name="tanggal_sidang" value="" id="t_sidang">
          </div>
        </div>

        <div class="form-group mb-2">
          <label for="staticEmail" class="col-sm-7 col-form-label">Waktu Mulai :</label>
          <div class="col-sm-3">
            <input type="time" class="form-control" name="waktu_sidang_start" value="" id="w_sidang">
          </div>
        </div>

        <div class="form-group mb-2">
          <label for="staticEmail" class="col-sm-7 col-form-label">Waktu Berakhir :</label>
          <div class="col-sm-3">
            <input type="time" class="form-control" name="waktu_sidang_end" value="" id="w_sidang_end">
          </div>
        </div>

        <div class="form-group mb-2 ">
          <label for="staticEmail" class="col-sm-2 col-form-label">Ruang: </label>
          <div class="col-sm-7">

            <select name="ruang_sidang" class="form-control col-sm-10" id="r_sidang">
              <?php foreach ($sql_ruang as $key) {
                extract($key);?>
                <option value="<?php echo $id_ruang; ?>"><?php echo $nama_ruang; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <input type="hidden" name="id_jadwal" value="<?php echo $_GET['id']; ?>">
        <input type="hidden" name="tipe" value="sidang">
        <input type="hidden" name="tipe_sidang" value="TA">

        <div class="form-group mb-2">
          <button type="submit" class="form-control btn btn-info">
            <i class="fa fa-fw fa-check"></i>Pilih Waktu</button>
        </div>

      </form>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
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
      foreach ($sql_jadwal_ta_sidang as $key) {
        extract($key);
        $no++;
        ?>
          <tr>
            <td><input type="checkbox" id="id_jadwal_kp[]" name="id_jadwal_kp[]" value="<?php echo $id_jadwal_kp; ?>"></input></td>
            <td><?php echo $no; ?></td>
            <td><?php echo $nim; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $nama_dosen; ?></td>
            <td><?php echo $status_sidang_ta; ?></td>
            <td>
              <a href="?p=ta_detail&id=<?php echo $id_jadwal_ta; ?>" class="btn btn-info btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Detail</a>

            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
