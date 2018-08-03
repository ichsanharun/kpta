<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">List Tugas Akhir</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-12">

        <div class="form-group mb-2">
          <a href="?p=TA_pilih_waktu" type="submit" class="form-control btn btn-info">
            <i class="fa fa-fw fa-arrow-circle-right"></i>Buat Jadwal Sidang</a>
        </div>

    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered" id="dataTable" cellspacing=0 cellpadding=0>
      <thead class="thead-light">
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Pembimbing</th>
          <th>Status</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php
      $no=0;
      foreach ($sql_jadwal_ta_sidang as $key) {
        extract($key);
        $no++;
        ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $nim; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $nama_dosen; ?></td>
            <td><?php echo $status_sidang_ta; ?></td>
            <td>
              <a href="?p=ta_detail&id=<?php echo $id_jadwal_ta; ?>" class="btn btn-info btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Detail</a>

            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
