<?php
if (
  !empty($_POST['tanggal_sidang']) AND
  !empty($_POST['ruang_sidang']) AND
  !empty($_POST['id_jadwal_ta'])
) {
  $tanggal_sidang = $_POST['tanggal_sidang'];
  $ruang_sidang = $_POST['ruang_sidang'];

  //echo $w2;
}
else {
  ?>
    <script>
      alert('Maaf, data yang anda masukkan tidak valid!');
      window.location.href="?p=TA_sidang_penguji";
    </script>
  <?php
}
 ?>
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
      <div class="form-group row py-0 mb-0">
        <label class="col-sm-4 col-form-label font-weight-bold">Tanggal</label>
        <label class="col-sm-1 col-form-label">:</label>
        <label class="col-sm-4 col-form-label"><?php echo $tanggal_sidang; ?></label>
      </div>
      <div class="form-group row mb-0">
        <label class="col-sm-4 col-form-label font-weight-bold">Kode Ruang</label>
        <label class="col-sm-1 col-form-label">:</label>
        <label class="col-sm-4 col-form-label"><?php echo $ruang_sidang; ?></label>
      </div>


      <a href="?p=KP_kelola_sidang" class="btn btn-secondary btn-sm">
        <i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>

    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <form action="?a=sidang_aksi&ts=update_ta" method="post">
      <input type="hidden" name="tanggal_sidang" value="<?php echo $tanggal_sidang; ?>">
      <input type="hidden" name="ruang_sidang" value="<?php echo $ruang_sidang; ?>">
      <?php foreach ($_POST['id_jadwal_ta'] as $key => $value) {?>
        <input type="hidden" name="id_sidang_ta[]" value="<?php echo $value; ?>">
      <?php } ?>
    <table class="table table-bordered table-hovered" id="dataTable" cellspacing=0 cellpadding=0>
      <thead class="thead-light">
        <tr>
          <th><input type="checkbox" name="check_all" id="check_all" onclick="cek(this)" disabled></th>
          <th>ID</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Ruang</th>
          <th>Opsi</th>
        </tr>
      </thead>
      </tbody>
      <?php

      foreach ($sql_ta_sidang_dosen as $key) {
        extract($key);
        ?>
          <tr>
            <td><input type="checkbox" id="id_dosen[]" name="id_dosen[]" value="<?php echo $id_dosen; ?>" onchange="limit_checkbox(3,'id_dosen');"/></input></td>
            <td><?php echo $id_dosen; ?></td>
            <td><?php echo $nama_dosen; ?></td>
            <td><?php echo $jk_dosen; ?></td>
            <td><?php echo $ID_R; ?></td>
            <td>
              <a href="?p=user_tools&user=dosen&id=<?php echo $id_dosen; ?>&act=detail" class="btn btn-info btn-sm">
                <i class="fa fa-fw fa-arrow-circle-right"></i>Detail</a>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
    <div class="form-group mb-2 col-md-4">
      <button type="submit" class="form-control btn btn-info btn-sm">
        <i class="fa fa-fw fa-check"></i>Submit</button>
    </div>
    </form>
  </div>
</div>
