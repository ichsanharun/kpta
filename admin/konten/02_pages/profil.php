<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Profil</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">

    <div class="col-lg-6">
      <table class="table table-sm table-hover ">
        <?php
        foreach ($sql_profil as $key) {
          extract($key);
          ?>
               <tr>
                   <th>ID Admin</th>
                   <td width="5%">:</td>
                   <td><?php echo $id_admin; ?></td>
               </tr>

               <tr>
                   <th>Nama Admin</th>
                   <td width="5%">:</td>
                   <td><?php echo $nama_admin; ?></td>
               </tr>

               <tr>
                   <th>E-Mail Admin</th>
                   <td width="5%">:</td>
                   <td><?php echo $email_admin; ?></td>
               </tr>

               <tr>
                   <th>Tempat, Tanggal Lahir</th>
                   <td width="5%">:</td>
                   <td><?php echo $tempat_lahir_admin.", ".$tanggal_lahir_admin; ?></td>
               </tr>

               <tr>
                   <th>Agama</th>
                   <td width="5%">:</td>
                   <td><?php echo $agama_admin; ?></td>
               </tr>

               <tr>
                   <th>Alamat</th>
                   <td width="5%">:</td>
                   <td><?php echo $alamat_admin; ?></td>
               </tr>

               <tr>
                   <th>Jenis Kelamin</th>
                   <td width="5%">:</td>
                   <td><?php echo $jk_admin; ?></td>
               </tr>



               <tr>
                   <th>Status</th>
                   <td width="5%">:</td>
                   <td><?php echo $status_kerja; ?></td>
               </tr>

               <?php
             }
              ?>
      </table>
      <a href="?p=profil_ubah" class="btn btn-info">Ubah Profil</a>
    </div>

    <!--div class="col-lg-6 text-center">
      <img src="img/<?php echo $foto ?>" alt="profil" height="200"><br>
      <hr>
      <h5><?php echo $nim; ?></h5>
      <h5><?php echo $nama; ?></h5>
      <a href="?p=profil_ubah" class="btn btn-info">Ubah Profil</a>
    </div-->
  </div>
</div>
