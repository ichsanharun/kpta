<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="?p=TA_absen">Tugas Akhir</a>
  </li>
  <li class="breadcrumb-item active">Absen Bimbingan Tugas Akhir</li>
</ol>
<!-- Area Dashboard-->
<h2>Atur Jadwal Bimbingan</h2>
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-8">
      <table class="table table-sm table-hover ">
        <?php
        foreach ($sql_absen_ta_head as $key) {
          extract($key);
          ?>
               <tr>
                   <th>Bimbingan Tanggal</th>
                   <td width="5%">:</td>
                   <td><?php echo $tanggal_bimbingan; ?></td>
               </tr>

               <tr>
                   <th>Tempat</th>
                   <td width="5%">:</td>
                   <td><?php echo $tempat_bimbingan; ?></td>
               </tr>

               <tr>
                   <th>Pokok Bahasan</th>
                   <td width="5%">:</td>
                   <td><?php echo $pembahasan_bimbingan; ?></td>
               </tr>

               <?php
             }
              ?>
      </table>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <form action="?a=TA_absen_simpan" method="post">
      <input type="hidden" name="id_absen_ta" value="<?php echo $id_absen_ta; ?>">
      <input type="hidden" name="tanggal_bimbingan" value="<?php echo $tanggal_bimbingan; ?>">
      <input type="hidden" name="tipe_aksi" value="atur_jadwal">
    <table class="table table-bordered table-hovered" id="dataTable">
      <thead class="thead-light">
        <tr>
          <th><input type="checkbox" name="check_all" id="check_all" onclick="cek(this)"> Select All</th>
          <th>ID Jadwal</th>
          <th>Nama</th>
          <th>Judul</th>
          <th>Nama Instansi</th>
          <th>Profil</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_absen_ta_list as $key) {
        extract($key);
        ?>
          <tr>
            <td><input type="checkbox" id="id_jadwal_ta[]" name="id_jadwal_ta[]" value="<?php echo $id_jadwal_ta; ?>"></td>
            <td><?php echo $id_jadwal_ta; ?></td>
            <td><?php echo $nama_mahasiswa; ?></td>
            <td><?php echo $judul_ta; ?></td>
            <td><?php echo $nama_instansi; ?></td>
            <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo "#lihat".$nim; ?>">
                Lihat
              </button>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
    <button type="submit" class="btn btn-success btn-sm">Simpan Jadwal Bimbingan</button>
    </form>
  </div>
</div>
<?php
foreach ($sql_absen_ta_list as $key) {
  extract($key);
  ?>
<div class="modal fade" id="<?php echo "lihat".$nim; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="daftarDosenLabel">Profil Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-hover ">
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
              <th>Peminatan</th>
              <td width="5%">:</td>
              <td><?php echo $kode_jurusan; ?></td>
          </tr>

          <tr>
              <th>Telepon</th>
              <td width="5%">:</td>
              <td><?php echo $telepon_mahasiswa; ?></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php } ?>
