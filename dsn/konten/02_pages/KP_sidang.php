<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">
    List Sidang Kerja Praktek
  </li>

</ol>
<!-- Area Dashboard-->
<form action="?p=KP_sidang_penguji_ubah" method="post">
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-12">
      <h4>List Jadwal Sidang KP</h4>
      <div class="form-inline">
        <div class="form-group mb-2">
          <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal: </label>
          <div class="col-sm-2">
            <input type="date" class="form-control form-control-sm" name="tanggal_sidang" value="" id="t_sidang">
          </div>
        </div>

        <div class="form-group mb-2 ">
          <label for="staticEmail" class="col-sm-2 col-form-label">Ruang: </label>
          <div class="col-sm-10">

            <select name="ruang_sidang" class="form-control col-sm-10 form-control-sm" id="r_sidang3">
              <?php foreach ($sql_ruang as $key) {
                extract($key);?>

                <option value="<?php echo $id_ruang; ?>"><?php echo $nama_ruang; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <!--div class="form-group mb-2">
          <label for="staticEmail" class="col-sm-7 col-form-label">Waktu Mulai :</label>
          <div class="col-sm-3">
            <input type="time" class="form-control" name="waktu_sidang_start" value="" >
          </div>
        </div>

        <div class="form-group mb-2">
          <label for="staticEmail" class="col-sm-7 col-form-label">Waktu Berakhir :</label>
          <div class="col-sm-3">
            <input type="time" class="form-control" name="waktu_sidang_end" value="" >
          </div>
        </div-->


      </div>

    </div>

  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered" id="example" cellspacing=0>
      <thead class="thead-light">
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Ruang</th>
          <th>Opsi</th>

        </tr>
      </thead>
      </tbody>
      <?php
      $no=0;
      foreach ($sql_kp_sidang_list as $key) {
        extract($key);
        $no++;
        ?>
          <tr>
            <td><?php echo $no; ?></td>
            <?php $waktu1 = explode(" ",$tanggal_sidang_kp_start);
            $waktu2 = explode(" ",$tanggal_sidang_kp_end); ?>
            <td><?php echo $waktu1[0]; ?></td>
            <td><?php echo $waktu1[1]." s.d ".$waktu2[1]; ?></td>
            <td><?php echo $nama_ruang; ?></td>
            <td>
              <a href="#lihat_<?php echo $ID; ?>" data-toggle="modal" class="btn btn-success btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Lihat Detail Penguji</a>
              <a href="?p=KP_kelola_nilai_sidang&id=<?php echo $ID; ?>" class="btn btn-primary btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Penilaian</a>
            </td>

          </tr>

        <?php
        }
        ?>
    </table>
    <div class="form-group mb-2">
      <button type="submit" class="form-control btn btn-info btn-sm">
        <i class="fa fa-fw fa-check"></i>Pilih List</button>
    </div>
  </div>
</div>
</form>
<?php
foreach ($sql_kp_sidang_list as $key) {
  extract($key);
  ?>
<div class="modal fade" id="<?php echo "lihat_".$ID; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Detail Penguji</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-hover ">
          <?php
          $no = 0;
          $query_kp_sidang_penguji = "SELECT * FROM sidang_kp INNER JOIN sidang_kp_detail INNER JOIN dosen ON `sidang_kp`.`id_sidang_kp` = `sidang_kp_detail`.`id_sidang_kp` AND `sidang_kp_detail`.`id_dosen_penguji` = `dosen`.`id_dosen` WHERE `sidang_kp_detail`.`id_sidang_kp` = '$ID'";
          $sql_kp_sidang_penguji = mysqli_query($mysqli,$query_kp_sidang_penguji);
          foreach ($sql_kp_sidang_penguji as $key) {
            extract($key);
            $no++;
            ?>
          <tr>
              <th>Penguji <?php echo $no; ?></th>
              <td width="5%">:</td>
              <td><?php echo $nama_dosen; ?></td>
          </tr>

          <?php } ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
