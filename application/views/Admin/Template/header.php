<?php
if ($this->session->userdata('admin')) {
  $this->session->userdata('admin', 'Success as a admin.');
} else {
  redirect('Login');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title><?= $title; ?></title>

  <!-- Bootstrap -->
  <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css') ?>" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?php echo base_url('assets/vendors/iCheck/skins/flat/green.css') ?>" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="<?php echo base_url('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') ?>" rel="stylesheet">
  <!-- JQVMap -->
  <link href="<?php echo base_url('assets/vendors/jqvmap/dist/jqvmap.min.css') ?>" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') ?>" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?php echo base_url('assets/build/css/custom.min.css') ?>" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" integrity="sha512-KXkS7cFeWpYwcoXxyfOumLyRGXMp7BTMTjwrgjMg0+hls4thG2JGzRgQtRfnAuKTn2KWTDZX4UdPg+xTs8k80Q==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css" integrity="sha512-rxThY3LYIfYsVCWPCW9dB0k+e3RZB39f23ylUYTEuZMDrN/vRqLdaCBo/FbvVT6uC2r0ObfPzotsfKF9Qc5W5g==" crossorigin="anonymous" />


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

  <!-- <?php echo base_url('') ?> -->

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container" style="background-color:#2b2b2b;">
      <div class="col-md-3 left_col" style="background-color:#2b2b2b;">
        <div class="left_col scroll-view" style="background-color:#2b2b2b;">
          <div class="navbar nav_title" style="border: 0; background-color:#2b2b2b;">
            <a href="<?= site_url('Admin') ?>" class="site_title"><span class="ml-4">Donasi - Prototype</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo base_url('assets/images/user.png') ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?= $user['nama'] ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="<?= site_url('Admin') ?>"><i class="fa fa-dashboard"></i> Dasboard <span class="fa fa-chevron pull-right"></span></a></li>
                <li><a href="<?= site_url('Admin/Users') ?>"><i class="fa fa-archive"></i> Data User <span class="fa fa-chevron pull-right"></span></a></li>
                <li><a href="<?= site_url('Admin/anakAsuhAdmin') ?>"><i class="fa fa-archive"></i> Anak Asuh <span class="fa fa-chevron pull-right"></span></a></li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo base_url('assets/images/user.png') ?>" alt=""><?= $user['nama'] ?>
                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <!-- <a class="dropdown-item" href="javascript:;"> Profile</a>
                  <a class="dropdown-item" href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                  </a>
                  <a class="dropdown-item" href="javascript:;">Help</a> -->
                  <!-- <a class="dropdown-item" href="<?= site_url('admin/profil') ?>"><i class="fa fa-user pull-right"></i> Profil</a> -->
                  <a class="dropdown-item" href="<?= site_url('Login/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </div>
              </li>
            
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      

      <!-- page content -->
      <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block;">

        </div>
        <!-- /top tiles -->