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
    <form class="form-control" action="?a=profil_ubah_aksi" method="post" enctype="multipart/form-data">
        <?php
        foreach ($sql_profil as $key) {
          extract($key);
          $nim = $nim;
          $nama = $nama_mahasiswa;
          ?>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">NIM</label>
            <div class="col-sm-8">
              <input class="form-control" type="hidden" name="nim" value="<?php echo $nim; ?>"><?php echo $nim; ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Nama Mahasiswa</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="nama_mahasiswa" value="<?php echo $nama_mahasiswa; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">E-Mail Mahasiswa</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="email_mahasiswa" value="<?php echo $email_mahasiswa; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Tempat Lahir</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="tempat_lahir_mahasiswa" value="<?php echo $tempat_lahir_mahasiswa; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-8">
              <input type="date" class="form-control" name="tanggal_lahir_mahasiswa" value="<?php echo $tanggal_lahir_mahasiswa; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Agama</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="agama_mahasiswa" value="<?php echo $agama_mahasiswa; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="alamat_mahasiswa" value="<?php echo $alamat_mahasiswa; ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-8">
              <select name="jk_mahasiswa" class="form-control" required>
                <option value="L" <?php if ($jk_mahasiswa == 'L') {echo "selected";}else {}?> >Laki-laki</option>
                <option value="P" <?php if ($jk_mahasiswa == 'P') {echo "selected";}else {}?> >Perempuan</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Telepon</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" name="telepon_mahasiswa" value="<?php echo $telepon_mahasiswa; ?>" required>
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
          <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Upload Foto</label>
            <div class="col-sm-8">
              <input class="form-control" type="file" name="foto_mahasiswa">
            </div>
          </div>

      <?php
        }
      ?>
      <button type="submit" class="btn btn-info">Simpan</button>
    </form>
  </div>
</div>
