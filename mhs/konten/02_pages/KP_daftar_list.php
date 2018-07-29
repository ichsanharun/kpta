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
