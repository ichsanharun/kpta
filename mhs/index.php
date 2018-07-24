<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
    include '../koneksi/koneksi.php';
    include 'controller.php';
    ?>
<head>
  <?php include 'konten/01_header/head.php'; ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" onload="CoolClock.findAndCreateClocks()">

  <!-- Navigation-->
  <?php include 'konten/01_header/menu.php'; ?>
  <!-- END Of Navigation-->

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- KONTEN-->
      <?php
        if (!empty($_GET['p'])) {
          $p = $_GET['p'];
          if (file_exists("konten/02_pages/$p.php")) {
            include 'konten/02_pages/'.$p.'.php';
          }
          else {
            include 'not_found.php';
          }
        }
        elseif (!empty($_GET['a'])) {
          $a = $_GET['a'];
          if (file_exists("konten/03_proses/$a.php")) {
            include 'konten/03_proses/'.$a.'.php';
          }
          else {
            include 'not_found.php';
          }
        }
        elseif (empty($_GET['a'])) {
          include 'konten/02_pages/home.php';
        }
       ?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="assets/js/sb-admin-datatables.min.js"></script>
    <script src="assets/js/sb-admin-charts.min.js"></script>
    <script src="../assets/js/custom.js"></script>
  </div>
</body>

</html>
