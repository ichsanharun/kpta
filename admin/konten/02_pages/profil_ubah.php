<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="?p=profil">Profil</a>
  </li>
  <li class="breadcrumb-item active">Ubah Profil</li>
</ol>
<!-- Area Dashboard-->
<div class="col-lg-8">
  <div class="row">
    <form class="form-control" action="?a=profil_ubah_aksi" method="post">
        <?php
        foreach ($sql_profil as $key) {
          extract($key);
          ?>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">ID Admin</label>
            <div class="col-sm-8">
              <input class="form-control" type="hidden" name="id_admin" value="<?php echo $id_admin; ?>"><?php echo $id_admin; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Admin</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="nama_admin" value="<?php echo $nama_admin; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">E-Mail Admin</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="email_admin" value="<?php echo $email_admin; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="tempat_lahir_admin" value="<?php echo $tempat_lahir_admin; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="tanggal_lahir_admin" value="<?php echo $tanggal_lahir_admin; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Agama</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="agama_admin" value="<?php echo $agama_admin; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="alamat_admin" value="<?php echo $alamat_admin; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-8">
              <select name="jk_admin" class="form-control" required>
                <option value="L" <?php if ($jk_admin == 'L') {echo "selected";}else {}?> >Laki-laki</option>
                <option value="P" <?php if ($jk_admin == 'P') {echo "selected";}else {}?> >Perempuan</option>
              </select>
            </div>
          </div>
          
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Password Baru</label>
            <div class="col-sm-8">
              <input class="form-control" type="password" name="password" value="" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-8">
              <input class="form-control" type="password" name="konfirmasi_password" value="" required>
            </div>
          </div>

      <?php
        }
      ?>
      <button type="submit" class="btn btn-info">Simpan</button>
    </form>
  </div>
</div>
