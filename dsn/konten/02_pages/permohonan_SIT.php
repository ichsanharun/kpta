<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active"> Daftar Permohonan Surat Izin TA</li>
</ol>
<!-- Area Dashboard-->
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered" id="dataTable">
      <thead class="thead-light">
        <tr>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Nama Instansi</th>
          <th>Semester</th>
          <th>Status Permohonan</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_surat_ta as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $nim; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $nama_instansi; ?></td>
            <td><?php echo $semester_mahasiswa; ?></td>
            <td><?php echo $status; ?></td>
            <td>
              <a href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=detail" class="btn btn-info btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Detail</a>
              <?php
                if (($status == 'Disetujui') OR ($status == 'Ditolak')) {
                  ?>
                  <a href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=ubah" class="btn btn-warning btn-sm">
                    <i class="fa fa-fw fa-edit"></i>Ubah</a>
                  <?php
                }
                else{
                  ?>
                  <a href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=v" class="btn btn-success btn-sm">
                    <i class="fa fa-fw fa-check-circle"></i>Setujui</a>
                  <a href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=x" class="btn btn-danger btn-sm">
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
