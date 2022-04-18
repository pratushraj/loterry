<?php
// session_start();
$user = $_SESSION['USER_ROLE'];
$NAME = $_SESSION['NAME'];
// var_dump($_SESSION);
if($user == 1) {
  $who = "Super Admin";
} else if($user == 2) {
  $who = "Distributer";
} else if($user == 3) {
  $who = "Dealer";
}

include 'conn.php';
if($user == 1) {
  $dis = '<li class="nav-item"> <a class="nav-link" href="dealer.php">Dealer</a></li>';
} else if($user == 2) {
  $dis = '<li class="nav-item"> <a class="nav-link" href="dealer.php">Suppliers</a></li>';
}
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="../../index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item profile">
        <div class="profile-desc">
          <div class="profile-pic">
            <div class="count-indicator">
              <img class="img-xs rounded-circle " src="assets/images/faces/face15.jpg" alt="">
              <span class="count bg-success"></span>
            </div>
            <div class="profile-name">
              <h5 class="mb-0 font-weight-normal"><?php echo $NAME;?></h5>
              <span><?php echo $who;?></span>
            </div>
          </div>
          <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
          <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-settings text-primary"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-onepassword  text-info"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <div class="preview-icon bg-dark rounded-circle">
                  <i class="mdi mdi-calendar-today text-success"></i>
                </div>
              </div>
              <div class="preview-item-content">
                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
              </div>
            </a>
          </div>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="../../index.html">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#dashboard" aria-expanded="false" aria-controls="dashboard">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Master Data</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="dashboard">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="distributer.php">Distributors</a></li>
            <?php echo $dis?>
            <!-- <li class="nav-item"> <a class="nav-link" href="dealer.php">Dealer</a></li> -->
            <li class="nav-item"> <a class="nav-link" href="session.php">Sessions</a></li>
            <li class="nav-item"> <a class="nav-link" href="series.php">Series</a></li>
            <li class="nav-item"> <a class="nav-link" href="tickets.php">Tickets</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#purchase" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Purchase</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="purchase">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Purchase List</a></li>
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Add Purchase</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Direct Purchase Sale</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Add</a></li>
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">List</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#unsold" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Unsold</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="unsold">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Unsold List</a></li>
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Add Unsold</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#wining" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Wining</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="wining">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Add winning game</a></li>
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Winning game List</a></li>
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" data-bs-toggle="collapse" href="#report" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Report</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="report">
          <ul class="nav flex-column sub-menu">
          <li class="nav-item menu-items"> 
          <a class="nav-link" data-bs-toggle="collapse" href="#w-report" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Wining Report</span>
          <i class="menu-arrow"></i>
          </a>
            <div class="collapse" id="w-report">
            <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Game Wise</a></li>
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Customer Wise</a></li>
          </ul>
            </div>
        </li>
            <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Stokist Report</a></li>
          </ul>
        </div>
      </li>
      
    </ul>
  </nav>
  <div class="container-fluid page-body-wrapper">