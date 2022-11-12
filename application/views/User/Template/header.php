<?php
if ($this->session->userdata('user')) {
  $this->session->userdata('user', 'Success as a user.');
} else {
  redirect('Login');
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#ffffff">
  
  <!-- <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/ico" /> -->
  

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Donasi</title>


  <link rel="stylesheet" href="<?php echo base_url('assets/assets2/css/theme.css'); ?>">
  
  

  <style>
    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {

      .carousel-inner img {

        height: 1000px;

      }


    }
  </style>


</head>

<body>


  <main class="main" id="top">

    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block navbar-klean" data-navbar-on-scroll="data-navbar-on-scroll">
      <div class="container"><a class="navbar-brand d-flex align-items-center fw-semi-bold fs-3" href="index.html"> <img class="me-3" src="assets/img/gallery/logo.png" alt="" /></a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto pt-2 pt-lg-0 font-base">
            <a class="nav-link fw-medium active" aria-current="page" href="<?= site_url('User') ?>">Home</a>
            <a class="nav-link" href="<?= site_url('User/penggalanganDana') ?>">Donasi</a>
          </ul>
          <h5 class="nav-link">Selamat Datang, <?= $user['nama'] ?></h5>
          <a href="<?php echo site_url('User/profil'); ?>" class="btn btn-light shadow-klean order-0"><span class="text-gradient fw-bold">Profil</span></a>
          <a href="<?= site_url('Login/logout') ?>" class="btn btn-light shadow-klean order-0"><span class="text-gradient fw-bold">Logout</span></a>

        </div>
      </div>
    </nav>