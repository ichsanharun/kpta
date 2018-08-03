<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">Kelola user</li>
  <li class="breadcrumb-item active">User Dosen</li>
</ol>
<!-- Area Dashboard-->
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered" id="dataTable" cellspacing=0 cellpadding=0>
      <thead class="thead-light">
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>E-Mail</th>
          <th>Jenis Kelamin</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_dosen as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $id_dosen; ?></td>
            <td><?php echo $nama_dosen; ?></td>
            <td><?php echo $email_dosen; ?></td>
            <td><?php echo $jk_dosen; ?></td>
            <td>
              <a href="?p=user_tools&user=dosen&id=<?php echo $id_dosen; ?>&act=detail" class="btn btn-info btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Detail</a>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
