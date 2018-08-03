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
      <form action="?p=TA_jadwal_sidang" method="post" class="form-inline">
        <div class="form-group mb-2">
          <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal: </label>
          <div class="col-sm-2">
            <input type="date" class="form-control" name="tanggal_sidang" value="" id="t_sidang">
          </div>
        </div>

        <div class="form-group mb-2">
          <label for="staticEmail" class="col-sm-7 col-form-label">Waktu Mulai :</label>
          <div class="col-sm-3">
            <input type="time" class="form-control" name="waktu_sidang_start" value="" id="w_sidang">
          </div>
        </div>

        <div class="form-group mb-2">
          <label for="staticEmail" class="col-sm-7 col-form-label">Waktu Berakhir :</label>
          <div class="col-sm-3">
            <input type="time" class="form-control" name="waktu_sidang_end" value="" id="w_sidang_end">
          </div>
        </div>

        <div class="form-group mb-2 ">
          <label for="staticEmail" class="col-sm-2 col-form-label">Ruang: </label>
          <div class="col-sm-7">

            <select name="ruang_sidang" class="form-control col-sm-10" id="r_sidang">
              <?php foreach ($sql_ruang as $key) {
                extract($key);?>
                <option value="<?php echo $id_ruang; ?>"><?php echo $nama_ruang; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        
        <div class="form-group mb-2">
          <button type="submit" class="form-control btn btn-info">
            <i class="fa fa-fw fa-check"></i>Pilih Waktu</button>
        </div>

      </form>
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

        </tr>
      </thead>
      </tbody>
      <?php
      $no=0;
      foreach ($sql_ta_sidang_list as $key) {
        extract($key);
        $no++;
        ?>
          <tr>
            <td><?php echo $no; ?></td>
            <?php $waktu1 = explode(" ",$tanggal_sidang_ta_start);
            $waktu2 = explode(" ",$tanggal_sidang_ta_end); ?>
            <td><?php echo $waktu1[0]; ?></td>
            <td><?php echo $waktu1[1]; ?></td>
            <td><?php echo $nama_ruang; ?></td>


          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
