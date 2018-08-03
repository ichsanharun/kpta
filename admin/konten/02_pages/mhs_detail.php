<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">Kelola user</li>
  <li class="breadcrumb-item">
    <a href="?p=user_mahasiswa">User Mahasiswa</a>
  </li>
  <li class="breadcrumb-item active">Details</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row justify-content-end">

    <div class="col-lg-6">
      <table class="table table-sm table-hover ">
        <?php
        foreach ($sql_mahasiswa_details as $key) {
          extract($key);
          $nim = $nim;
          $nama = $nama_mahasiswa;
          $foto = $foto_mahasiswa;
          ?>
               <tr>
                   <th>NIM</th>
                   <td width="5%">:</td>
                   <td><?php echo $nim; ?></td>
               </tr>

               <tr>
                   <th>Nama Mahasiswa</th>
                   <td width="5%">:</td>
                   <td><?php echo $nama_mahasiswa; ?></td>
               </tr>

               <tr>
                   <th>E-Mail Mahasiswa</th>
                   <td width="5%">:</td>
                   <td><?php echo $email_mahasiswa; ?></td>
               </tr>

               <tr>
                   <th>Tempat, Tanggal Lahir</th>
                   <td width="5%">:</td>
                   <td><?php echo $tempat_lahir_mahasiswa.", ".$tanggal_lahir_mahasiswa; ?></td>
               </tr>

               <tr>
                   <th>Agama</th>
                   <td width="5%">:</td>
                   <td><?php echo $agama_mahasiswa; ?></td>
               </tr>

               <tr>
                   <th>Alamat</th>
                   <td width="5%">:</td>
                   <td><?php echo $alamat_mahasiswa; ?></td>
               </tr>

               <tr>
                   <th>Jenis Kelamin</th>
                   <td width="5%">:</td>
                   <td><?php echo $jk_mahasiswa; ?></td>
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
                   <th>Telepon</th>
                   <td width="5%">:</td>
                   <td><?php echo $telepon_mahasiswa; ?></td>
               </tr>

               <?php
             }
              ?>
      </table>
      <a href="?p=KP_daftar_list" class="btn btn-secondary btn-sm">
        <i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
      <a href="?p=user_tools&user=mhs&id=<?php echo $nim; ?>&act=ubah" class="btn btn-warning btn-sm">
        <i class="fa fa-fw fa-arrow-circle-right"></i>Ubah</a>
    </div>

    <div class="col-lg-6 text-center">
      <img src="../mhs/img/<?php echo $foto; ?>" alt="profil" height="200"><br>
      <hr>
      <h5><?php echo $nim; ?></h5>
      <h5><?php echo $nama; ?></h5>

    </div>
  </div>
</div>