<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="?p=KP_daftar_list">Kerja Praktek</a>
  </li>
  <li class="breadcrumb-item active">Absen Bimbingan</li>
</ol>
<!-- Area Dashboard-->
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered">
      <thead class="thead-light">
        <tr>
          <th>Judul Penelitian</th>
          <th>Tempat Penelitian</th>
          <th>Nama</th>
          <th>NIM</th>
          <th>Pembimbing</th>
          <th>Status</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_kp_list as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $judul_kp; ?></td>
            <td><?php echo $nama_instansi; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $nim; ?></td>
            <td><?php echo $id_dosen; ?></td>
            <td><?php echo $status; ?></td>
            <td>
              <a href="?p=KP_absen_lihat&id=<?php echo $id_jadwal_kp; ?>" class="btn btn-info">Lihat</a>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
