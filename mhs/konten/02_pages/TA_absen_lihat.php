<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="?p=TA_absen">Tugas Akhir</a>
  </li>
  <li class="breadcrumb-item active">Absen Bimbingan Tugas Akhir</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div data-toggle="collapse" data-target="#collapseHead">
    <label class="h3">Kehadiran Bimbingan</label>
    <hr>
  </div>
  <div class="col-lg-8 collapse" id="collapseHead" aria-labelledby="headingOne" data-parent="#accordion">
    <?php
    foreach ($sql_ta_detail as $key) {
      extract($key);
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
          <label class="col-sm-4 col-form-label"><?php echo $judul_ta; ?></label>
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
          <label class="col-sm-4 col-form-label font-weight-bold">Status</label>
          <label class="col-sm-1 col-form-label">:</label>
          <label class="col-sm-4 col-form-label"><?php echo $status; ?></label>
        </div>
      <?php
      }
      ?>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered">
      <thead class="thead-light">
        <tr>
          <th>Tanggal</th>
          <th>Pembahasan</th>
          <th>Status</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_ta_absen as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $tanggal_bimbingan; ?></td>
            <td><?php echo $pembahasan_bimbingan; ?></td>
            <td><?php echo $status_detail; ?></td>
            <td>
              <?php if ($status_absen == "Selesai") {
                echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#detailAbsen$id_jadwal_ta$id_absen_ta'>
                      Lihat Daftar
                      </button>";
              }else {
                echo "<a href='?a=TA_absen_aksi&id=$id_jadwal&abs=$id_absen&act=ikuti' class='btn btn-info m-1'>Ikuti</a><br>";
                echo "<a href='?a=TA_absen_aksi&id=$id_jadwal&abs=$id_absen&act=tikuti' class='btn btn-info m-1'>Tidak Ikuti</a>";
              } ?>

            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>

<?php foreach ($sql_ta_absen_detail as $key) {
  extract($key);?>
<div class="modal fade" id="detailAbsen<?php echo $id_jadwal_ta.$id_absen_ta; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Detail Bimbingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-8 collapse show" id="collapseHead" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="form-group row py-0 mb-0">
            <label class="col-sm-4 col-form-label font-weight-bold">Tanggal Bimbingan</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-4 col-form-label"><?php echo $tanggal_bimbingan; ?></label>
          </div>
          <div class="form-group row py-0 mb-0">
            <label class="col-sm-4 col-form-label font-weight-bold">Catatan Pembimbing</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-4 col-form-label"><?php echo $catatan_pembimbing; ?></label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
