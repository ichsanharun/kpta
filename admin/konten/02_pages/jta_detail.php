<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">
    <a href="?p=permohonan_SIK">Permohonan Surat Izin Kerja</a>
  </li>
  <li class="breadcrumb-item active">
    Detail Permohonan Surat Izin Kerja
  </li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-6">
      <form action="?a=jadwal_tools&act=update&ts=ta" method="get">
        <input type="hidden" name="p" value="jadwal_tools" >
        <input type="hidden" name="act" value="update" >
        <input type="hidden" name="ts" value="ta" >
      <table class="table table-sm table-hover ">
        <?php
        foreach ($sql_ta_detail as $key) {
          extract($key);
          $id = $id_jadwal_ta;
          $nama = $nama_mahasiswa;
          $foto = $foto_mahasiswa;
          $status = $status;
          ?>
               <tr>
                   <th width="40%">NIM</th>
                   <td>:</td>
                   <td><input type="hidden" name="id" value="<?php echo $id_jadwal_ta; ?>" required><?php echo $nim; ?></td>
               </tr>

               <tr>
                   <th width="40%">Nama Mahasiswa</th>
                   <td>:</td>
                   <td><?php echo $nama_mahasiswa; ?></td>
               </tr>

               <tr>
                   <th width="40%">Program Studi</th>
                   <td>:</td>
                   <td><?php echo $nama_jurusan; ?></td>
               </tr>

               <tr>
                   <th width="40%">Peminatan</th>
                   <td>:</td>
                   <td><?php echo $kode_jurusan; ?></td>
               </tr>

               <tr>
                   <th width="40%">Nama Instansi</th>
                   <td>:</td>
                   <td><?php echo $nama_instansi; ?></td>
               </tr>

               <tr>
                   <th width="40%">Alamat Instansi</th>
                   <td>:</td>
                   <td><?php echo $alamat_instansi; ?></td>
               </tr>

               <tr>
                   <th width="40%">Status Permohonan</th>
                   <td>:</td>
                   <td><?php echo $status; ?></td>
               </tr>

               <tr>
                   <th width="40%">Dosen Pembimbing</th>
                   <td>:</td>
                   <td>
                      <?php echo $id_dosen; ?>
                   </td>
               </tr>

               <?php
             }
              ?>
      </table>
        <a href="?p=KP_daftar_list" class="btn btn-secondary btn-sm">
          <i class="fa fa-fw fa-arrow-circle-left"></i>Kembali</a>
        <a href="?p=jadwal_tools&ts=ta&id=<?php echo $id; ?>&act=x" class="btn btn-danger btn-sm">
          <i class="fa fa-fw fa-times-circle"></i>Tolak</a>
        <button type="submit" class="btn btn-success btn-sm">
          <i class="fa fa-fw fa-check-circle"></i>Setujui</a>
      </form>
    </div>
    <div class="col-lg-6 text-center">
      <img src="../mhs/img/<?php echo $foto ?>" alt="profil" height="200"><br>
      <hr>
      <h5><?php echo $nim; ?></h5>
      <h5><?php echo $nama; ?></h5>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered">
      <thead class="thead-light">
        <tr>
          <th>No.</th>
          <th>Tanggal</th>
          <th>Catatan Dosen Pembimbing</th>
          <th>Status</th>

        </tr>
      </thead>
      </tbody>
      <?php
      $no=0;
      foreach ($sql_ta_absen_list as $key) {
        extract($key);
        $no++;
        ?>
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $tanggal_bimbingan; ?></td>
            <td><?php echo $pembahasan_bimbingan; ?></td>
            <td><?php echo $status; ?></td>

          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
