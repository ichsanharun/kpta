<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="?p=">Dashboard</a>
  </li>
  <li class="breadcrumb-item">
    <a href="?p=KP_absen">Kerja Praktek</a>
  </li>
  <li class="breadcrumb-item active">Absen Bimbingan Kerja Praktek</li>
</ol>
<!-- Area Dashboard-->
<div class="jumbotron" style="padding:10px">
  <div class="row">
    <div class="col-lg-8">
      <form action="?a=daftar_aksi" method="post">
        <input type="hidden" name="tipe" value="KP">
      <table class="table table-sm table-hover ">
        <?php
        foreach ($sql_jadwal_kp as $key) {
          extract($key);
          $nim = $nim;
          $nama = $nama_mahasiswa;
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
                 <td><?php echo $judul_kp; ?></td>
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
                   <th>Pembimbing</th>
                   <td width="5%">:</td>
                   <td>
                     <?php echo $id_dosen; ?>
                   </td>
               </tr>

               <?php
             }
              ?>
      </table>
      <a href="?p=KP_absen_lihat_cetak&id_cetak_kp=<?php echo $id_jadwal_kp; ?>" class="btn btn-info">Cetak</a>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <table class="table table-bordered table-hovered">
      <thead class="thead-light">
        <tr>
          <th>Tanggal</th>
          <th>Catatan Dosen Pembimbing</th>
          <th>Status</th>
        </tr>
      </thead>
      </tbody>
      <?php
      foreach ($sql_absen_kp as $key) {
        extract($key);
        ?>
          <tr>
            <td><?php echo $tanggal_bimbingan; ?></td>
            <td><?php echo $pembahasan_bimbingan; ?></td>
            <td><?php echo $status; ?></td>
            <td>
              <a href="?KP_absen_lihat&id_kp=<?php echo $id_jadwal_kp; ?>" class="btn btn-info">Lihat</a>
            </td>
          </tr>

        <?php
        }
        ?>
    </table>
  </div>
</div>
