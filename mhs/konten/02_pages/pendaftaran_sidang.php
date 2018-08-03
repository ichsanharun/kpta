<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Daftar Baru Tugas Akhir</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-8">
      <form action="?a=daftar_aksi" method="post" enctype="multipart/form-data">
        <input type="hidden" name="tipe" value="sidang">
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
                 <th>Pilih Kat. Sidang</th>
                 <td width="5%">:</td>
                 <td>
                   <select class="form-control" name="tipe_sidang" onchange="pilih()" id="option" required>
                     <option value="">-Pilih-</option>
                     <option value="KP">Kerja Praktek</option>
                     <option value="TA">Tugas Akhir</option>
                   </select>
                 </td>
               </tr>

               <tr>
                   <th>Pilih Penelitian</th>
                   <td width="5%">:</td>
                   <td>
                      <div class="row">
                        <div class="col-lg-6">
                         <input type="text" class="form-control" name="id_jadwal" id="id_jadwal" required readonly>
                        </div>
                        <div class="col-lg-6">
                         <a id="pilih_kategori" class="btn btn-primary" data-toggle="modal" href="">
                           Lihat Daftar
                         </a>
                        </div>
                      </div>
                   </td>
               </tr>

               <tr>
                   <th>Upload File TA(Maks. 1MB)</th>
                   <td width="5%">:</td>
                   <td>
                     <input type="file" class="form-control" name="file" required>
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
<?php for ($i=0; $i <= 1; $i++) {
  if ($i == 0) {
    $var = "KP";
    $val = "kp";
    $query_sidang = "SELECT `jadwal_kp`.`id_jadwal_kp` AS id_jadwal, `jadwal_kp`.`judul_kp` AS judul, COUNT(`absen_kp_detail`.`id_jadwal_kp`) AS N FROM `jadwal_kp` INNER JOIN `absen_kp_detail` ON jadwal_kp.id_jadwal_kp = absen_kp_detail.id_jadwal_kp WHERE `jadwal_kp`.`nim` = '$_SESSION[id]'";
    $sql_sidang = $mysqli->query($query_sidang);
    //$jumlah_akp = mysqli_fetch_array($sql_kp);
  }
  elseif ($i == 1)  {
    $var = "TA";
    $val = "ta";
    $query_sidang = "SELECT `jadwal_ta`.`id_jadwal_ta` AS id_jadwal, `jadwal_ta`.`judul_ta` AS judul, COUNT(`absen_ta_detail`.`id_jadwal_ta`) AS N FROM `jadwal_ta` INNER JOIN `absen_ta_detail` ON jadwal_ta.id_jadwal_ta = absen_ta_detail.id_jadwal_ta WHERE `jadwal_ta`.`nim` = '$_SESSION[id]'";
    $sql_sidang = $mysqli->query($query_sidang);
    //$jumlah_ata = mysqli_fetch_array($sql_ta);
  }
?>
<div class="modal fade" id="daftar_<?php echo $var; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Daftar <?php echo $var; ?> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hovered" id="dataTable">
          <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th>Judul</th>
              <th>Jumlah Bimbingan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          </tbody>
          <?php foreach ($sql_sidang as $key) {
            extract($key); ?>
              <tr>
                <td><?php echo $id_jadwal; ?></td>
                <td><?php echo $judul; ?></td>
                <td><?php echo $N; ?></td>
                <td><a href="#" onclick="pilih_sidang('<?php echo $N."','".$id_jadwal; ?>')" class="btn btn-info btn-sm">Pilih</a></td>
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
