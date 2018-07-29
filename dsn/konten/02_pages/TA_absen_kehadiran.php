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
    <div class="col-lg-8 collapse show" id="collapseHead" aria-labelledby="headingOne" data-parent="#accordion">
      <table class="table table-sm">
        <?php
        foreach ($sql_absen_ta_head as $key) {
          extract($key);
          if ($tanggal_bimbingan < date("Y-m-d")) {
            $disable = "disabled";
          }
          else {
            $disable = '';
          }
          ?>
          <div class="form-group row py-0 mb-0">
            <label class="col-sm-3 col-form-label font-weight-bold">Tempat</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-3 col-form-label"><?php echo $tempat_bimbingan; ?></label>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label font-weight-bold">Tanggal</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-3 col-form-label"><?php echo $tanggal_bimbingan; ?></label>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-3 col-form-label font-weight-bold">Pokok Bahasan</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-3 col-form-label"><?php echo $pembahasan_bimbingan; ?></label>
          </div>

               <?php
             }
              ?>
      </table>
    </div>

</div>

<div class="row">
  <div class="col-lg-12">
    <form action="?a=TA_absen_simpan" method="post">
      <input type="hidden" name="tipe_aksi" value="kehadiran">
    <table class="table table-bordered table-hovered" cellspacing="0" cellpadding="0" id="dataTable">
      <thead class="thead-light">
        <tr>
          <th>ID Jadwal</th>
          <th>Nama</th>
          <th>Judul</th>
          <th>Nama Instansi</th>
          <th>Catatan</th>
          <th>Kehadiran</th>
        </tr>
      </thead>
      </tbody>
      <?php
      $no = 0;
      foreach ($sql_absen_ta_kehadiran as $key) {
        extract($key);
        $no++;
        ?>
          <tr>
            <input type="hidden" name="id_jadwal_ta[<?php echo $no; ?>]" value="<?php echo $id_jadwal_ta; ?>">
            <input type="hidden" name="id_absen_ta[<?php echo $no; ?>]" value="<?php echo $id_absen_ta; ?>">
            <td><?php echo $id_jadwal_ta; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $judul_ta; ?></td>
            <td><?php echo $nama_instansi; ?></td>
            <td><textarea name="catatan_pembimbing[<?php echo $no; ?>]" class="form-control"><?php echo $catatan_pembimbing; ?></textarea></td>
            <td class="">
              <div class="form-check form-check-inline">
                <input type="radio" name="kehadiran[<?php echo $no; ?>]" class="form-control" value="Hadir" <?php if($ab_status == "Hadir" OR $ab_status == "Akan Hadir"){echo "checked ";} echo $disable; ?>>
                <label class="form-check-label" for="inlineRadio1">Hadir</label>
                <input type="radio" name="kehadiran[<?php echo $no; ?>]" class="form-control" value="Tidak Hadir" <?php if($ab_status == "Tidak Hadir" OR $ab_status == "Tidak Akan Hadir"){echo "checked ";} echo $disable; ?>>
                <label class="form-check-label" for="inlineRadio2">Tidak Hadir</label>
              </div>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
    <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-save"></i> Simpan Absen Bimbingan</button>
    <button type="submit" name="selesai" value="<?php echo $id_absen_ta; ?>" class="btn btn-success"><i class="fa fa-fw fa-check"></i> Selesai Bimbingan</button>
    </form>
  </div>
</div>
<?php
foreach ($sql_absen_ta_list as $key) {
  extract($key);
  ?>
<div class="modal fade" id="<?php echo "lihat".$nim; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Profil Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-hover ">
          <tr>
              <th>NIM</th>
              <td width="5%">:</td>
              <td><?php echo $nim; ?></td>
          </tr>

          <tr>
              <th>Nama Mahasiswa</th>
              <td width="5%">:</td>
              <td><?php echo $nama_mahasiswa; ?></td>
          </tr>

          <tr>
              <th>E-Mail Mahasiswa</th>
              <td width="5%">:</td>
              <td><?php echo $email_mahasiswa; ?></td>
          </tr>

          <tr>
              <th>Tempat, Tanggal Lahir</th>
              <td width="5%">:</td>
              <td><?php echo $tempat_lahir_mahasiswa.", ".$tanggal_lahir_mahasiswa; ?></td>
          </tr>

          <tr>
              <th>Agama</th>
              <td width="5%">:</td>
              <td><?php echo $agama_mahasiswa; ?></td>
          </tr>

          <tr>
              <th>Alamat</th>
              <td width="5%">:</td>
              <td><?php echo $alamat_mahasiswa; ?></td>
          </tr>

          <tr>
              <th>Jenis Kelamin</th>
              <td width="5%">:</td>
              <td><?php echo $jk_mahasiswa; ?></td>
          </tr>


          <tr>
              <th>Peminatan</th>
              <td width="5%">:</td>
              <td><?php echo $kode_jurusan; ?></td>
          </tr>

          <tr>
              <th>Telepon</th>
              <td width="5%">:</td>
              <td><?php echo $telepon_mahasiswa; ?></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
