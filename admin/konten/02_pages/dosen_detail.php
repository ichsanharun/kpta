<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">Kelola user</li>
  <li class="breadcrumb-item">
    <a href="?p=user_dosen">User Dosen</a>
  </li>
  <li class="breadcrumb-item active">Details</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row justify-content-end">

    <div class="col-lg-6">
      <table class="table table-sm table-hover ">
        <?php
        foreach ($sql_dosen_details as $key) {
          extract($key);
          $id_dosen = $id_dosen;
          $nama = $nama_dosen;
          $foto = $foto_dosen;
          ?>
               <tr>
                   <th>NIM</th>
                   <td width="5%">:</td>
                   <td><?php echo $id_dosen; ?></td>
               </tr>

               <tr>
                   <th>Nama Dosen</th>
                   <td width="5%">:</td>
                   <td><?php echo $nama_dosen; ?></td>
               </tr>

               <tr>
                   <th>E-Mail Dosen</th>
                   <td width="5%">:</td>
                   <td><?php echo $email_dosen; ?></td>
               </tr>

               <tr>
                   <th>Tempat, Tanggal Lahir</th>
                   <td width="5%">:</td>
                   <td><?php echo $tempat_lahir_dosen.", ".$tanggal_lahir_dosen; ?></td>
               </tr>

               <tr>
                   <th>Agama</th>
                   <td width="5%">:</td>
                   <td><?php echo $agama_dosen; ?></td>
               </tr>

               <tr>
                   <th>Alamat</th>
                   <td width="5%">:</td>
                   <td><?php echo $alamat_dosen; ?></td>
               </tr>

               <tr>
                   <th>Jenis Kelamin</th>
                   <td width="5%">:</td>
                   <td><?php echo $jk_dosen; ?></td>
               </tr>



               <!--tr>
                   <th>Telepon</th>
                   <td width="5%">:</td>
                   <td><?php echo $telepon_dosen; ?></td>
               </tr-->

               <?php
             }
              ?>
      </table>
      <a href="?p=KP_daftar_list" class="btn btn-secondary btn-sm">
        <i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
      <a href="?p=user_tools&user=dosen&id=<?php echo $id_dosen; ?>&act=ubah" class="btn btn-warning btn-sm">
        <i class="fa fa-fw fa-arrow-circle-right"></i>Ubah</a>
    </div>

    <div class="col-lg-6 text-center">
      <img src="../dsn/img/<?php echo $foto_dosen; ?>" alt="profil" height="200"><br>
      <hr>
      <h5><?php echo $id_dosen; ?></h5>
      <h5><?php echo $nama; ?></h5>

    </div>
  </div>
</div>
