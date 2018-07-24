index.php<?php

include ('koneksi/koneksi.php');

$id = $_POST['id'];
$password = $_POST['passcode'];

    $admin = mysqli_query($mysqli, "SELECT * FROM admin WHERE id_admin = '$id' AND password_admin='$password'");

    $row=mysqli_fetch_array($admin);

    if ($row['id_admin'] == $id AND $row['password_admin'] == $password)
        {
          session_start();
          $_SESSION['id'] = $row['id_admin'];
          $_SESSION['nama']= $row['nama_admin'];
          $_SESSION['hak'] = "admin";
          header('location:admin/index.php');
        }

    elseif ($row['id_admin'] != $id AND $row['tanggal_lahir_admin'] != $password)
        {
          $dosen = mysqli_query($mysqli, "SELECT * FROM dosen WHERE id_dosen = '$id' AND password_dosen='$password'");
          $rowdosen=mysqli_fetch_array($dosen);

          if ($rowdosen['id_dosen'] == $id AND $rowdosen['password_dosen'] == $password)
              {
                session_start();
                $_SESSION['hak'] = "dosen";
                $_SESSION['id'] = $rowdosen['id_dosen'];
                $_SESSION['nama']= $rowdosen['nama_dosen'];
                header('location:dsn/index.php');
              }

          elseif ($rowdosen['id_dosen'] != $id AND $rowdosen['password_dosen'] != $password)
              {
                $sqlm = "SELECT * FROM mahasiswa WHERE nim = '$id' AND password_mahasiswa='$password'";
                $m = $mysqli->query($sqlm);
                $rowm=mysqli_fetch_array($m);

                if ($rowm['nim'] == $id AND $rowm['password_mahasiswa'] == $password)
                    {
                      session_start();
                      $_SESSION['hak'] = 'mahasiswa';
                      $_SESSION['id'] = $rowm['nim'];
                      $_SESSION['nama']= $rowm['nama_mahasiswa'];
                      header('location:mhs/index.php');
                    }

                else{
                          ?>
                          <script>
                          alert('Anda harus mengisi data dengan benar !');
                          window.location.href="index.php";
                          </script>
                          <?php
                    }

              }

          else
            {
              ?>
              <script>
              alert('Anda harus mengisi data dengan benar !');
              window.location.href="index.php";
              </script>
              <?php
            }
        }

    else
      {
          ?>
          <script>
          alert('Anda harus mengisi data dengan benar !');
          window.location.href="index.php";
          </script>
          <?php
      }

?>
