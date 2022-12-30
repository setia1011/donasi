<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#ffffff">
  <!-- <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/ico" /> -->
  <title>Donasi</title>
  <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/assets2/css/theme.css'); ?>">
  <script src="<?= base_url('assets/vendors/jquery/dist/jquery.min.js'); ?>"></script>
  <style>
    .dropdown-menu {
      top: 162% !important;
    }
    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {

      .carousel-inner img {

        height: 1000px;

      }


    }
  </style>


</head>

<body>

    <?php
      $donatur = $this->db->query("SELECT * FROM `tbl_donasi` JOIN `tbl_user` ON `tbl_donasi`.`id_user` = `tbl_user`.`id_user` JOIN `tbl_penggalangan` ON `tbl_donasi`.`id_penggalangan` = `tbl_penggalangan`.`id_penggalangan`")->result_array();
      $penyaluran = $this->db->query("SELECT * FROM `tbl_penyaluran` JOIN `tbl_penggalangan` ON `tbl_penyaluran`.`id_penggalangan` = `tbl_penggalangan`.`id_penggalangan`")->result_array();
    ?>

  <main class="main" id="top">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block navbar-klean" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container"><a class="navbar-brand d-flex align-items-center fw-semi-bold fs-3" href="index.html"> <img class="me-3" src="assets/img/gallery/logo.png" alt="" /></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <div>
            <a href="<?php echo site_url('Login'); ?>" class="btn btn-light shadow-klean order-0"><span class="text-gradient fw-bold">Sign in</span></a>
            <a href="<?php echo site_url('Login/register'); ?>" class="btn btn-light shadow-klean order-0"><span class="text-gradient fw-bold">Sign up</span></a>
            <a href="<?php echo site_url('Dashboard'); ?>" class="btn btn-light shadow-klean order-0"><span class="text-gradient fw-bold">Home</span></a>
            <!-- Download -->
            <div class="dropdown d-inline">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Download
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item" onclick="csvLaporan('donasi')">Laporan Donasi</button>
                <button class="dropdown-item" onclick="csvLaporan('penyaluran')">Laporan Penyaluran</button>
                </div>
            </div>
            </div>
        </div>
        </div>
    </nav>

    <script>
        function csvLaporan(v) {
            var baseurl = "<?= base_url() ?>";
            $.ajax({
            type: 'POST',
            url: baseurl+'dashboard/csvLaporan',
            data: {
                ref: v
            },
            success: function(res) {
                if (res.filename != undefined && res.filename.length > 0) {
                if (v == 'donasi') {
                    window.open(baseurl+'assets/laporan/donasi.csv');
                }
                if (v == 'penyaluran') {
                    window.open(baseurl+'assets/laporan/penyaluran.csv');
                }
                }
            },
            });
        }
    </script>