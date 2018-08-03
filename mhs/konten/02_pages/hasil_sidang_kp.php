<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">List Tugas Akhir</li>
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
          <th>Hasil</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_hasil_kp as $key) {
        extract($key);
        ?>
        <tr>
          <td><?php echo $judul_kp; ?></td>
          <td><?php echo $status; ?></td>
          <td><?php echo $id_dosen; ?></td>
          <td><?php echo $hasil_sidang_kp; ?></td>
          <td>
            <a href="?p=hasil_sidang_kp_detail&id=<?php echo $id_jadwal_kp; ?>" class="btn btn-info">Lihat</a>
          </td>
        </tr>
        <?php
      }
      ?>

    </table>

  </div>
</div>

<?php foreach ($sql_hasil_kp as $key) {
  extract($key);?>
<div class="modal fade" id="lihat_<?php echo $id_sidang_kp; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Detail Hasil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-hover ">
          <?php
          $no = 0;
          $query_kp_sidang_penguji = "SELECT * FROM sidang_kp INNER JOIN sidang_kp_detail INNER JOIN dosen ON `sidang_kp`.`id_sidang_kp` = `sidang_kp_detail`.`id_sidang_kp` AND `sidang_kp_detail`.`id_dosen_penguji` = `dosen`.`id_dosen` WHERE `sidang_kp_detail`.`id_sidang_kp` = '$id_sidang_kp'";
          $sql_kp_sidang_penguji = mysqli_query($mysqli,$query_kp_sidang_penguji);
          foreach ($sql_kp_sidang_penguji as $key) {
            extract($key);
            $no++;
            $waktu1 = explode(" ",$tanggal_sidang_kp_start);
            $waktu2 = explode(" ",$tanggal_sidang_kp_end);
            $n_maks = $n_akhir;
            $t1 = $tanggal_sidang_kp_start;
            $t2 = $tanggal_sidang_kp_end;
            ?>
          <tr>
              <th>Penguji <?php echo $no; ?></th>
              <td width="5%">:</td>
              <td><?php echo $nama_dosen; ?></td>
          </tr>

          <?php } ?>
          <tr>
              <th>Tanggal</th>
              <td width="5%">:</td>
              <td><?php echo $waktu1[0]; ?></td>
          </tr>
          <tr>
              <th>Waktu</th>
              <td width="5%">:</td>
              <td><?php echo $waktu1[1]." s.d ".$waktu2[1]; ?></td>
          </tr>
          <tr>
              <th>Nilai</th>
              <td width="5%">:</td>
              <td><?php echo $n_maks; ?></td>
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
