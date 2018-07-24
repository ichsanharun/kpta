<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">
    <a href="?p=permohonan_SIK">Permohonan Surat Izin Kerja</a>
  </li>
  <li class="breadcrumb-item active">
    Detail Permohonan Surat Izin Kerja
  </li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-6">
      <form action="?a=jadwal_tools&act=update&ts=kp" method="get">
        <input type="hidden" name="p" value="jadwal_tools" >
        <input type="hidden" name="act" value="update" >
        <input type="hidden" name="ts" value="kp" >
      <table class="table table-sm table-hover ">
        <?php
        foreach ($sql_profil_jadwal_kp as $key) {
          extract($key);
          $nim = $nim;
          $nama = $nama_mahasiswa;
          $foto = $foto_mahasiswa;
          $status = $status;
          ?>
               <tr>
                   <th width="40%">NIM</th>
                   <td>:</td>
                   <td><input type="hidden" name="nim" value="<?php echo $nim; ?>" required><?php echo $nim; ?></td>
               </tr>

               <tr>
                   <th width="40%">Nama Mahasiswa</th>
                   <td>:</td>
                   <td><?php echo $nama_mahasiswa; ?></td>
               </tr>

               <tr>
                   <th width="40%">Program Studi</th>
                   <td>:</td>
                   <td><?php echo $nama_jurusan; ?></td>
               </tr>

               <tr>
                   <th width="40%">Peminatan</th>
                   <td>:</td>
                   <td><?php echo $kode_jurusan; ?></td>
               </tr>

               <tr>
                   <th width="40%">Nama Instansi</th>
                   <td>:</td>
                   <td><?php echo $nama_instansi; ?></td>
               </tr>

               <tr>
                   <th width="40%">Alamat Instansi</th>
                   <td>:</td>
                   <td><?php echo $alamat_instansi; ?></td>
               </tr>

               <tr>
                   <th width="40%">Status Permohonan</th>
                   <td>:</td>
                   <td><?php echo $status; ?></td>
               </tr>

               <tr>
                   <th width="40%">Dosen Pembimbing</th>
                   <td>:</td>
                   <td>
                      <?php echo $id_dosen; ?>
                   </td>
               </tr>

               <?php
             }
              ?>
      </table>
        <a href="?p=KP_daftar_list" class="btn btn-secondary btn-sm">
          <i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
        <a href="?p=jadwal_tools&ts=kp&nim=<?php echo $nim; ?>&act=x" class="btn btn-danger btn-sm">
          <i class="fa fa-fw fa-times-circle"></i>Tolak</a>
        <button type="submit" class="btn btn-success btn-sm">
          <i class="fa fa-fw fa-check-circle"></i>Setujui</a>
      </form>
    </div>
    <div class="col-lg-6 text-center">
      <img src="../mhs/img/<?php echo $foto ?>" alt="profil" height="200"><br>
      <hr>
      <h5><?php echo $nim; ?></h5>
      <h5><?php echo $nama; ?></h5>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered">
      <thead class="thead-light">
        <tr>
          <th>Tanggal</th>
          <th>Catatan Dosen Pembimbing</th>
          <th>Status</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_absen_kp_id as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $tanggal_bimbingan; ?></td>
            <td><?php echo $pembahasan_bimbingan; ?></td>
            <td><?php echo $status; ?></td>
            <td>
              <a href="?KP_absen_lihat&id_kp=<?php echo $id_jadwal_kp; ?>" class="btn btn-info">Lihat</a>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="daftarDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Daftar Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-hovered" id="dataTable">
          <thead class="thead-light">
            <tr>
              <th>ID Dosen</th>
              <th>Nama Dosen</th>
            </tr>
          </thead>
          </tbody>
          <?php foreach ($sql_dosen as $key) {
            extract($key); ?>
              <tr>
                <td><?php echo $id_dosen; ?></td>
                <td><?php echo $nama_dosen; ?></td>
              </tr>
            <?php } ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
