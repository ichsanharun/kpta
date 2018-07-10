<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Permohonan Surat Izin Kerja</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-6">
      <form action="?a=permohonan_aksi" method="post">
        <input type="hidden" name="tipe" value="SIK">
      <table class="table table-sm table-hover ">
        <?php
        foreach ($sql_profil as $key) {
          extract($key);
          $nim = $nim;
          $nama = $nama_mahasiswa;
          ?>
               <tr>
                   <th>NIM</th>
                   <td width="5%">:</td>
                   <td><input type="hidden" name="nim" value="<?php echo $nim; ?>" required><?php echo $nim; ?></td>
               </tr>

               <tr>
                   <th>Nama Mahasiswa</th>
                   <td width="5%">:</td>
                   <td><?php echo $nama_mahasiswa; ?></td>
               </tr>

               <tr>
                   <th>Program Studi</th>
                   <td width="5%">:</td>
                   <td><?php echo $nama_jurusan; ?></td>
               </tr>

               <tr>
                   <th>Peminatan</th>
                   <td width="5%">:</td>
                   <td><?php echo $kode_jurusan; ?></td>
               </tr>

               <tr>
                   <th>Nama Instansi</th>
                   <td width="5%">:</td>
                   <td><input class="form-control" type="text" name="nama_instansi" value="" required></td>
               </tr>

               <tr>
                   <th>Alamat Instansi</th>
                   <td width="5%">:</td>
                   <td><input class="form-control" type="text" name="alamat_instansi" value="" required></td>
               </tr>

               <tr>
                   <th>Kebutuhan Yang Diminta (Opsi)</th>
                   <td width="5%">:</td>
                   <td><textarea class="form-control" name="kebutuhan" required></textarea></td>
               </tr>

               <?php
             }
              ?>
      </table>
      <button type="submit" class="btn btn-info">Ajukan</button>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered">
      <thead class="thead-light">
        <tr>
          <th>Nama Instansi</th>
          <th>Alamat Instansi</th>
          <th>Status Permohonan</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_surat_kp as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $nama_instansi; ?></td>
            <td><?php echo $alamat_instansi; ?></td>
            <td><?php echo $status; ?></td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
