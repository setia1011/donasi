<?php
if ($this->session->userdata('petugas')) {
  $this->session->userdata('petugas', 'Success as a petugas.');
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

  <style>
    .hiddenAksi{
      display: none;
    }
  </style>

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

  <script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>

  <link rel="stylesheet" href="<?= base_url('assets/vendors/fullcalendar/dist/fullcalendar.min.css'); ?>"/>
  <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>"/>

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container" style="background-color:#2b2b2b;">
      <div class="col-md-3 left_col" style="background-color:#2b2b2b;">
        <div class="left_col scroll-view" style="background-color:#2b2b2b;">
          <div class="navbar nav_title" style="border: 0; background-color:#2b2b2b;">
            <a href="<?= site_url('Petugas') ?>" class="site_title"><span class="ml-4">Donasi - Prototype</span></a>
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
                <li><a href="<?= site_url('Petugas') ?>"><i class="fa fa-dashboard"></i> Dasboard <span class="fa fa-chevron pull-right"></span></a></li>
                <li><a href="<?= site_url('Petugas/donasi') ?>"><i class="fa fa-archive"></i> Donasi <span class="fa fa-chevron pull-right"></span></a></li>
                <li><a href="<?= site_url('Petugas/anakAsuh') ?>"><i class="fa fa-archive"></i> Anak Asuh <span class="fa fa-chevron pull-right"></span></a></li>
                <li><a href="<?= site_url('Petugas/informasi') ?>"><i class="fa fa-archive"></i> Informasi <span class="fa fa-chevron pull-right"></span></a></li>
                <li><a href="<?= site_url('Petugas/penggalangan') ?>"><i class="fa fa-bar-chart"></i> Penggalangan Dana <span class="fa fa-chevron pull-right"></span></a></li>
                <li><a href="<?= site_url('Petugas/kategori') ?>"><i class="fa fa-list"></i> Kategori <span class="fa fa-chevron pull-right"></span></a></li>
                <li><a href="<?= site_url('Petugas/kegiatan') ?>"><i class="fa fa-users"></i> Kegiatan <span class="fa fa-chevron pull-right"></span></a></li>
                <li><a href="<?= site_url('Petugas/penyaluran') ?>"><i class="fa fa-line-chart"></i> Penyaluran Donasi <span class="fa fa-chevron"></span></a></li>
                <li><a href="<?= site_url('Petugas/homebanner') ?>"><i class="fa fa-image"></i> Home Banner <span class="fa fa-chevron"></span></a></li>

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
                  <!-- <a class="dropdown-item" href="<?= site_url('Petugas/profil') ?>"><i class="fa fa-user pull-right"></i> Profil</a> -->
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