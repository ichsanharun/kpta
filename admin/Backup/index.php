<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'konten/01_header/head.php'; ?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top" onload="CoolClock.findAndCreateClocks()">

  <!-- Navigation-->
  <?php include 'konten/01_header/menu.php'; ?>
  <!-- END Of Navigation-->

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Area Dashboard-->
      <div class="row">
        <div class="col-lg-8">
          <!-- Example Date and Clock Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-calendar"></i> Date</div>
            <div class="card-body">
              <div class="row justify-content-center">
                <?php
                include 'widget/calendar.php';
                echo draw_calendar(7,2013);
                //include 'widget/jam.php';
                ?>
              </div>
            </div>
            <div class="card-footer small text-muted">Has Been Updated</div>
          </div>
        </div>
        <div class="col-lg-4">
          <!-- Example Clock-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-clock-o"></i> Clock</div>
            <div class="card-body" style="">
              <div class="row justify-content-center">
              <canvas id="clockid" class="CoolClock:fancy:130:gmtOffset::showDigital" width="300" height="300"></canvas>
              </div>
            </div>
            <div class="card-footer small text-muted">Has Been Updated</div>
          </div>
          <!-- Example Notifications Card-->

        </div>
      </div>
      <!-- Example DataTables Card-->

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
            <a class="btn btn-primary" href="login.html">Logout</a>
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
  </div>
</body>

</html>
