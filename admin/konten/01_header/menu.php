<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="index.html">Aplikasi KPTA 2018</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="?">
          <i class="fa fa-fw fa-home"></i>
          <span class="nav-link-text">Home</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
        <a class="nav-link" href="?p=profil">
          <i class="fa fa-fw fa-user"></i>
          <span class="nav-link-text">Profil</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePermohonan" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-edit"></i>
          <span class="nav-link-text">
            Permohonan
            <?php
              if (($alert_skp > 0) OR ($alert_sta > 0)) {
                ?>
                <span class="indicator text-warning">
                  <i class="fa fa-fw fa-circle"></i>
                </span>
                <?php
              }
            ?>
          </span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapsePermohonan">
          <li>
            <a href="?p=permohonan_SIK">
              <i class="fa fa-fw fa-file"></i>
              Surat Izin Kerja
              <span class="badge badge-pill badge-warning"><?php echo $alert_skp; ?> New</span></a>
            </a>
          </li>
          <li>
            <a href="?p=permohonan_SIT">
              <i class="fa fa-fw fa-file"></i>
              Surat Izin
              <span class="badge badge-pill badge-warning"><?php echo $alert_sta; ?> New</span></a>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseKP" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-edit"></i>
          <span class="nav-link-text">
            Kerja Praktek
            <?php
              if ($alert_jkp > 0) {
                ?>
                <span class="indicator text-warning">
                  <i class="fa fa-fw fa-circle"></i>
                </span>
                <?php
              }
            ?>
          </span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseKP">
          <li>
            <a href="?p=KP_daftar_list">
              <i class="fa fa-fw fa-address-card"></i>
              Daftar
              <span class="badge badge-pill badge-warning"><?php echo $alert_jkp; ?> New</span></a>
          </li>
          <li>
            <a href="?p=KP_absen">
              <i class="fa fa-fw fa-calendar"></i>
              Absen Bimbingan</a>
          </li>
        </ul>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTA" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-edit"></i>
          <span class="nav-link-text">
            Tugas Akhir
            <?php
              if ($alert_sta > 0) {
                ?>
                <span class="indicator text-warning d-none d-lg-block">
                  <i class="fa fa-fw fa-circle"></i>
                </span>
                <?php
              }
            ?>
          </span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseTA">
          <li>
            <a href="?p=TA_daftar_list">
              <i class="fa fa-fw fa-address-card"></i>
              Daftar
              <span class="badge badge-pill badge-warning"><?php echo $alert_jta; ?> New</span></a>
            </a>
          </li>
          <li>
            <a href="?p=TA_absen">
              <i class="fa fa-fw fa-calendar"></i>
              Absen Bimbingan</a>
          </li>
        </ul>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSidang" data-parent="#exampleAccordion">
          <i class="fa fa-fw fa-edit"></i>
          <span class="nav-link-text">Daftar Sidang</span>
        </a>
        <ul class="sidenav-second-level collapse" id="collapseSidang">
          <li>
            <a href="navbar.html">
              <i class="fa fa-fw fa-clipboard"></i>
              Sidang KP</a>
          </li>
          <li>
            <a href="cards.html">
              <i class="fa fa-fw fa-clipboard"></i>
              Sidang TA</a>
          </li>
        </ul>
      </li>
    </ul>


    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <!--li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-fw fa-envelope"></i>
          <span class="d-lg-none">Messages
            <span class="badge badge-pill badge-primary">12 New</span>
          </span>
          <span class="indicator text-primary d-none d-lg-block">
            <i class="fa fa-fw fa-circle"></i>
          </span>
          <span class="d-none d-lg-inline">
            Notif
          </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="messagesDropdown">
          <h6 class="dropdown-header">New Messages:</h6>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <strong>David Miller</strong>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <strong>Jane Smith</strong>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <strong>John Doe</strong>
            <span class="small float-right text-muted">11:21 AM</span>
            <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item small" href="#">View all messages</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <i class="fa fa-fw fa-bell"></i>

          <span class="d-lg-none">Pembaruan KP
            <?php $alert = mysqli_num_rows($sql_notif_surat_kp); ?>
            <span class="badge badge-pill badge-warning"><?php echo $alert; ?> New</span>
          </span>
          <span class="indicator text-warning d-none d-lg-block">
            <i class="fa fa-fw fa-circle"></i>
          </span>
          <span class="d-none d-lg-inline">
            KP
          </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">New Alerts:</h6>
          <?php
            foreach ($sql_notif_surat_kp as $key) {
              extract($key);
           ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="?p=">
            <span class="text-success">
              <strong>
                <i class="fa fa-long-arrow-up fa-fw"></i>Pembaruan Surat KP <?php echo $id_surat_kp; ?></strong>
            </span>
            <span class="small float-right text-muted"></span>
            <div class="dropdown-message small">Terdapat permohonan baru dengan kode <?php echo $id_surat_kp; ?></div>
          </a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item small" href="?p=permohonan_SIK">View all alerts</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <i class="fa fa-fw fa-bell"></i>

          <span class="d-lg-none">Pembaruan TA
            <?php $alert = mysqli_num_rows($sql_notif_surat_ta); ?>
            <span class="badge badge-pill badge-warning"><?php echo $alert; ?> New</span>
          </span>
          <span class="indicator text-warning d-none d-lg-block">
            <i class="fa fa-fw fa-circle"></i>
          </span>
          <span class="d-none d-lg-inline">
            TA
          </span>
        </a>
        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
          <h6 class="dropdown-header">New Alerts:</h6>
          <?php
            foreach ($sql_notif_surat_ta as $key) {
              extract($key);
           ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">
            <span class="text-success">
              <strong>
                <i class="fa fa-long-arrow-up fa-fw"></i>Pembaruan Surat TA <?php echo $id_surat_ta; ?></strong>
            </span>
            <span class="small float-right text-muted"></span>
            <div class="dropdown-message small">Terdapat permohonan baru dengan kode <?php echo $id_surat_ta; ?></div>
          </a>
          <?php } ?>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item small" href="?p=permohonan_SIT">View all alerts</a>
        </div>
      </li-->


      <li class="nav-item">
        <form class="form-inline my-2 my-lg-0 mr-lg-2">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for...">
            <span class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
