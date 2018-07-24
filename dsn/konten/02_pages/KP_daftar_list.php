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
          <th>NIM</th>
          <th>Nama</th>
          <th>Pembimbing</th>
          <th>Status</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_jadwal_kp as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $nim; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $nama_dosen; ?></td>
            <td><?php echo $status; ?></td>
            <td>
              <a href="?p=jadwal_tools&ts=kp&id_kpta=<?php echo $id_jadwal_kp; ?>&act=detail" class="btn btn-info btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Detail</a>
              <?php
                if (($status == 'Disetujui') OR ($status == 'Ditolak')) {
                }
                else{
                  ?>
                  <a href="?p=jadwal_tools&ts=kp&id_kpta=<?php echo $id_jadwal_kp; ?>&act=v" class="btn btn-success btn-sm">
                    <i class="fa fa-fw fa-check-circle"></i>Setujui</a>
                  <a href="?p=jadwal_tools&ts=kp&id_kpta=<?php echo $id_jadwal_kp; ?>&act=x" class="btn btn-danger btn-sm">
                    <i class="fa fa-fw fa-times-circle"></i>Tolak</a>
                  <?php
                }
              ?>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
