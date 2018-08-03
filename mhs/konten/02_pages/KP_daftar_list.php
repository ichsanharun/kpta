<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">List Kerja Praktek</li>
</ol>
<!-- Area Dashboard-->
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered">
      <thead class="thead-light">
        <tr>
          <th>Judul Penelitian</th>
          <th>Status</th>
          <th>Pembimbing</th>
          <th>Nilai</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_kp_list as $key) {
        extract($key);
        ?>
        <tr>
          <td><?php echo $judul_kp; ?></td>
          <td><?php echo $status; ?></td>
          <td><?php echo $nama_dosen; ?></td>
          <td><?php echo $hasil_sidang_kp; ?></td>
          <td>
            <a href="?p=KP_absen_lihat&id=<?php echo $id_jadwal_kp; ?>" class="btn btn-info">Lihat</a>
          </td>
        </tr>
        <?php
      }
      ?>

    </table>
    <?php if (mysqli_num_rows($sql_kp_list) == 0) { ?>
      <a href="?p=KP_daftar_baru" class="btn btn-info">Daftar Baru</a>
    <?php }else{} ?>
  </div>
</div>


<?php
foreach ($sql_kp_list as $key) {
  extract($key);
  ?>
<div class="modal fade" id="detailDosen<?php echo $id_jadwal_kp; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Daftar Pembimbing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hovered" id="dataTable">
          <?php foreach ($sql_kp_detail_dosen as $key) {
            extract($key); ?>
              <tr>
                <td>P1</td>
                <td>:</td>
                <td><?php echo $nama_dosen; ?></td>
                <td><?php echo $status; ?></td>
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
<?php } ?>
