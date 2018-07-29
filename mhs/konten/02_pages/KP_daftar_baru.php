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

               <!--tr>
                   <th>Pembimbing Usulan 1</th>
                   <td width="5%">:</td>
                   <td>
                      <div class="row">
                        <div class="col-lg-6">
                         <input type="text" class="form-control" name="id_dosen" id="id_dosen_1" onchange="valid_dosen()" required readonly>
                        </div>
                        <div class="col-lg-6">
                         <button type="button" id="bd_1" class="btn btn-primary" data-toggle="modal" data-target="#daftarDosen1">
                           Lihat Daftar
                         </button>
                        </div>
                      </div>
                   </td>
               </tr>
               <tr>
                   <th>Pembimbing Usulan 2</th>
                   <td width="5%">:</td>
                   <td>
                      <div class="row">
                        <div class="col-lg-6">
                         <input type="text" class="form-control" name="id_dosen2" id="id_dosen_2" onchange="valid_dosen()" required readonly>
                        </div>
                        <div class="col-lg-6">
                         <button type="button" id="bd_2" class="btn btn-primary" data-toggle="modal" data-target="#daftarDosen2">
                           Lihat Daftar
                         </button>
                        </div>
                      </div>
                   </td>
               </tr>
               <tr>
                   <th>Pembimbing Usulan 3</th>
                   <td width="5%">:</td>
                   <td>
                      <div class="row">
                        <div class="col-lg-6">
                         <input type="text" class="form-control" name="id_dosen3" id="id_dosen_3" onchange="valid_dosen()" required readonly>
                        </div>
                        <div class="col-lg-6">
                         <button type="button" id="bd_3" class="btn btn-primary" data-toggle="modal" data-target="#daftarDosen3">
                           Lihat Daftar
                         </button>
                        </div>
                      </div>
                   </td>
               </tr-->

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
<?php for ($i=1; $i <= 3 ; $i++) {?>
<div class="modal fade" id="daftarDosen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <th></th>
              <th>ID Dosen</th>
              <th>Nama Dosen</th>
              <th>Klik u/ Pilih</th>
            </tr>
          </thead>
          </tbody>
          <?php foreach ($sql_dosen as $key) {
            extract($key); ?>
              <tr>
                <td><input type="checkbox" name="id_dosen[]" value="<?php echo $id_dosen; ?>" onchange="limit_checkbox(1,'id_dosen')"></td>
                <td><?php echo $id_dosen; ?></td>
                <td><?php echo $nama_dosen; ?></td>
                <td><button href="#" name="pil[]" id="pilih_<?php echo $i; ?>_<?php echo $id_dosen; ?>" onclick="tampilkan_iddose('<?php echo $id_dosen; ?>',<?php echo $i; ?>)" class="btn btn-info btn-sm">Pilih</button></td>
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
<?php } ?>
