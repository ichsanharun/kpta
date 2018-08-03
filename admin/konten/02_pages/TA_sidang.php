<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">
    List Sidang Tugas Akhir
  </li>

</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-12">
      <h4>List Jadwal Sidang TA</h4>
      <a href="?p=KP_kelola_sidang" class="btn btn-secondary btn-sm">
        <i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
      <a href="?p=TA_sidang_penguji" class="btn btn-success btn-sm">
        <i class="fa fa-fw fa-arrow-circle-right"></i>Update Penguji</a>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered" id="example" cellspacing=0>
      <thead class="thead-light">
        <tr>
          <th>No.</th>
          <th>Ruang</th>
          <th>Tanggal</th>
          <th>Waktu</th>

        </tr>
      </thead>
      </tbody>
      <?php
      $no=0;
      foreach ($sql_ta_sidang as $key) {
        extract($key);
        $no++;
        ?>
          <tr>
            <td><?php echo $no; ?></td>
            <?php $waktu1 = explode(" ",$tanggal_sidang_ta_start);
            $waktu2 = explode(" ",$tanggal_sidang_ta_end); ?>
            <td><?php echo $nama_ruang; ?></td>
            <td><?php echo $waktu1[0]; ?></td>
            <td><?php echo $waktu1[1]." s.d ".$waktu2[1]; ?></td>
            <td><?php echo $nama_dosen; ?></td>


          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
