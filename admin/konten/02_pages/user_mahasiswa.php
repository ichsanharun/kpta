<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">Kelola user</li>
  <li class="breadcrumb-item active">User Mahasiswa</li>
</ol>
<!-- Area Dashboard-->
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered" id="dataTable" cellspacing=0 cellpadding=0>
      <thead class="thead-light">
        <tr>
          <th>NIM</th>
          <th>Nama</th>
          <th>Jurusan</th>
          <th>Semester</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_mahasiswa as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $nim; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $nama_jurusan; ?></td>
            <td><?php echo $semester_mahasiswa; ?></td>
            <td>
              <a href="?p=user_tools&user=mhs&id=<?php echo $nim; ?>&act=detail" class="btn btn-info btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Detail</a>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
