<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Daftar Baru Kerja Praktek</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-8">
      <form action="?a=daftar_aksi" method="post">
        <input type="hidden" name="tipe" value="KP">
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
                 <th>Judul Penelitian</th>
                 <td width="5%">:</td>
                 <td><input class="form-control" type="text" name="judul_kp" value="" required></td>
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
                   <th>Pembimbing Usulan</th>
                   <td width="5%">:</td>
                   <td>
                      <div class="row">
                        <div class="col-lg-6">
                         <input type="text" class="form-control" name="id_dosen" id="id_dosen" required readonly>
                        </div>
                        <div class="col-lg-6">
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#daftarDosen">
                           Lihat Daftar
                         </button>
                        </div>
                      </div>
                   </td>
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


<!-- Modal -->
<div class="modal fade" id="daftarDosen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Daftar Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hovered" id="dataTable">
          <thead class="thead-light">
            <tr>
              <th>ID Dosen</th>
              <th>Nama Dosen</th>
              <th>Klik u/ Pilih</th>
            </tr>
          </thead>
          </tbody>
          <?php foreach ($sql_dosen as $key) {
            extract($key); ?>
              <tr>
                <td><?php echo $id_dosen; ?></td>
                <td><?php echo $nama_dosen; ?></td>
                <td><a href="#" onclick="tampilkan_iddosen('<?php echo $id_dosen; ?>')" class="btn btn-info btn-sm">Pilih</a></td>
              </tr>
            <?php } ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
