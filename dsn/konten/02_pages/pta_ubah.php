<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">
    <a href="?p=permohonan_SIT">Permohonan Surat Izin TA</a>
  </li>
  <li class="breadcrumb-item active">
    Detail Permohonan Surat Izin TA
  </li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-6">
      <form action="?a=permohonan_aksi" method="post">
        <input type="hidden" name="tipe" value="SIT">
      <table class="table table-sm table-hover ">
        <?php
        foreach ($sql_surat_ta_nim as $key) {
          extract($key);
          $nim = $nim;
          $nama = $nama_mahasiswa;
          $foto = $foto_mahasiswa;
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
                   <td><?php echo $nama_instansi; ?></td>
               </tr>

               <tr>
                   <th>Alamat Instansi</th>
                   <td width="5%">:</td>
                   <td><?php echo $alamat_instansi; ?></td>
               </tr>

               <tr>
                   <th>Kebutuhan Yang Diminta</th>
                   <td width="5%">:</td>
                   <td><?php echo $kebutuhan_instansi; ?></td>
               </tr>

               <tr>
                   <th>Status Permohonan</th>
                   <td width="5%">:</td>
                   <td><?php echo $status; ?></td>
               </tr>

               <?php
             }
              ?>
      </table>
      <a href="?p=permohonan_SIT" class="btn btn-secondary btn-sm">
        <i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
        <?php
        if ($status == 'Disetujui') {
          ?>
          <a href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=x" class="btn btn-danger btn-sm">
            <i class="fa fa-fw fa-times-circle"></i>Tolak</a>
          <?php
        }
        else{
          ?>
          <a href="?p=permohonan_tools&ts=ta&nim=<?php echo $nim; ?>&act=v" class="btn btn-success btn-sm">
            <i class="fa fa-fw fa-check-circle"></i>Setujui</a>
          <?php
        }
        ?>

      </form>
    </div>
    <div class="col-lg-6 text-center">
      <img src="img/<?php echo $foto ?>" alt="profil" height="200"><br>
      <hr>
      <h5><?php echo $nim; ?></h5>
      <h5><?php echo $nama; ?></h5>
    </div>
  </div>
</div>
