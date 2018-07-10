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
          <th>Nilai</th>
        </tr>
      </thead>
      </tbody>
      <?php
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
        ?>
    </table>
    <?php
    if (mysqli_num_rows($sql_daftar_kp) > 0) {
      ?>
        <a href="?p=TA_daftar_baru" class="btn btn-info">Daftar Baru</a>
      <?php
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
