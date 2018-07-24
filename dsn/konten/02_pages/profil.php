<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Profil</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron p-3 pl-4">
  <div class="row">

    <div class="col-lg-6">

        <?php
        foreach ($sql_profil as $key) {
          extract($key);
          ?>
          <div class="form-group row py-0 mb-0">
            <label class="col-sm-5 col-form-label font-weight-bold">ID</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-5 col-form-label"><?php echo $id_dosen; ?></label>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label font-weight-bold">Nama</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-5 col-form-label"><?php echo $nama_dosen; ?></label>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label font-weight-bold">E-Mail</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-5 col-form-label"><?php echo $email_dosen; ?></label>
          </div>
          <div class="form-group row py-0 mb-0">
            <label class="col-sm-5 col-form-label font-weight-bold">Tempat, Tanggal Lahir</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-5 col-form-label"><?php echo $tempat_lahir_dosen.", ".$tanggal_lahir_dosen; ?></label>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label font-weight-bold">Agama</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-5 col-form-label"><?php echo $agama_dosen; ?></label>
          </div>
          <div class="form-group row mb-0">
            <label class="col-sm-5 col-form-label font-weight-bold">Alamat</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-5 col-form-label"><?php echo $alamat_dosen; ?></label>
          </div>
          <div class="form-group row py-0 mb-0">
            <label class="col-sm-5 col-form-label font-weight-bold">Jenis Kelamin</label>
            <label class="col-sm-1 col-form-label">:</label>
            <label class="col-sm-5 col-form-label"><?php echo $jk_dosen; ?></label>
          </div>
               <?php
             }
              ?>
    </div>

    <div class="col-lg-6 text-center">
      <img src="img/<?php echo $foto_dosen ?>" alt="profil" height="200"><br>
      <hr>
      <h5><?php echo $id_dosen; ?></h5>
      <h5><?php echo $nama_dosen; ?></h5>
      <a href="?p=profil_ubah" class="btn btn-info">Ubah Profil</a>
    </div>
  </div>
</div>
