<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Permohonan Surat Izin Kerja</li>
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
      foreach ($sql_profil_ta as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $judul_ta; ?></td>
            <td><?php echo $nama_instansi; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $nim; ?></td>
            <td><?php echo $id_dosen; ?></td>
            <td><?php echo $status; ?></td>
            <td>
              <a href="?p=TA_absen_lihat&id_ta=<?php echo $id_jadwal_ta; ?>" class="btn btn-info">Lihat</a>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
