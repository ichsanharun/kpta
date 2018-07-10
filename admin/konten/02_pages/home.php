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
