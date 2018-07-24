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
      if (mysqli_num_rows($sql_profil_ta) > 0) {
        foreach ($sql_profil_ta as $key) {
          extract($key);
          ?>
            <tr>
              <td><?php echo $judul_ta; ?></td>
              <td><?php echo $status; ?></td>
              <td><?php echo $nama_dosen; ?></td>
              <td><?php echo $hasil_sidang_ta; ?></td>
            </tr>
          <?php
        }
      }else {
        foreach ($sql_daftar_ta as $key) {
          extract($key);
          ?>
            <tr>
              <td><?php echo $judul_ta; ?></td>
              <td><?php echo $status; ?></td>
              <td>-</td>
              <td>-</td>
              <td><a href="?p=TA_daftar_baru&sta=<?php echo $id_surat_ta; ?>" class="btn btn-info">Daftar Baru</a></td>
            </tr>
          <?php
        }
      }
          ?>

    </table>
    <?php
    if (mysqli_num_rows($sql_daftar_ta) > 0) {

    }else {
      ?>
        <script>
          alert('Belum ada permohonan yang diterima!');
        </script>
      <?php
    }
    ?>
  </div>
</div>
