<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Kerja Praktek</li>
  <li class="breadcrumb-item active">Absen Bimbingan</li>
</ol>
<!-- Area Dashboard-->
<div class="row">
  <div class="col-lg-12">
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahJbing">
      Tambah Jadwal Bimbingan
    </button>
    <table class="table table-bordered table-hovered">
      <thead class="thead-light">
        <tr>
          <th>No</th>
          <th>Tanggal</th>
          <th>Tempat</th>
          <th>Pembahasan</th>
          <th>Keterangan</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      $no = 0;
      foreach ($sql_absen_kp_id as $key) {
        extract($key);
        $no++;
        ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $tanggal_bimbingan; ?></td>
            <td><?php echo $tempat_bimbingan; ?></td>
            <td><?php echo $pembahasan_bimbingan; ?></td>
            <td><?php echo $status; ?></td>
            <td>
              <a href="?p=KP_absen_lihat&id=<?php echo $id_absen_kp; ?>" class="btn btn-info">Atur Jadwal</a>
              <a href="?p=KP_absen_kehadiran&id=<?php echo $id_absen_kp; ?>" class="btn btn-info">Kehadiran</a>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
<div class="modal fade" id="tambahJbing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Tambah Jadwal Bimbingan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="?p=absen_aksi" method="POST" class="" enctype="multipart/form-data">
          <input name="tipe_absen" type="hidden" value="absen_kp">
          <input name="tipe_aksi" type="hidden" value="tambah">
            <div class="form-group">
              <div class="input-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tanggal Bimbingan</label>
                  </div>
                  <input class="form-control is-warning" id="tanggal_bimbingan" name="tanggal_bimbingan" type="date" required autofocus>
                </div>
              </div>
              <div class="input-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tempat</label>
                  </div>
                  <input class="form-control " placeholder="Tempat Bimbingan" id="tempat_bimbingan" name="tempat_bimbingan" type="text" required>
                </div>
              </div>
              <div class="input-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Topik</label>
                  </div>
                  <input class="form-control" placeholder="Pembahasan" name="pembahasan_bimbingan" type="text" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" id="submit" class="btn btn-md btn-primary btn-block" value="Next">Submit</button>
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
