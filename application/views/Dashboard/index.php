<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#ffffff">

  <!-- Bootstrap CSS -->


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

        max-height: 600px;

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
        $.ajax({
        type: 'POST',
        url: 'dashboard/csvLaporan',
        data: {
          ref: v
        },
        success: function(res) {
          if (res.filename != undefined && res.filename.length > 0) {
            if (v == 'donasi') {
              window.open('assets/laporan/donasi.csv');
            }
            if (v == 'penyaluran') {
              window.open('assets/laporan/penyaluran.csv');
            }
          }
        },
      });
      }
    </script>

    <section class="py-0" id="service">
      <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <?php
                  foreach ($banners as $key => $value) : ?>
                    <?php
                      $active = $key == 0 ? 'active' : '';
                    ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" class="<?= $active?>"></li>
                  
                  <?php endforeach; ?>
                  
                  <!-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                </ol>

                <div class="carousel-inner">
                  <?php
                  foreach ($banners as $key => $value) : ?>
                  <?php
                      $active = $key == 0 ? 'active' : '';
                    ?>
                    <div class="carousel-item <?= $active?>">
                      <img class="d-block w-100" src="<?= base_url('assets/images/'. $value['gambar']) ?>" alt="First slide">
                    </div>
                  <?php endforeach; ?>

                </div>
              </div>
            </div>
          </div>
      </div>
    </section>

    <section class="py-0" id="service">

      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-xxl-5 mx-auto text-center py-4">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-1">Informasi</h5>
            <!-- <p class="mb-0">Klean is an elegant HTML5 template and a perfect starting point for your next SaaS oriented site, carefully curated by <span class="fw-bold">ThemeWagon</span></p> -->
          </div>
        </div>



        <div class="row flex-center circle-blend circle-blend-right circle-warning">
          <div class="col-xl-9">
            <div class="row justify-content-center circle">
              <?php
              foreach ($informasi as $value) : ?>
                <div class="col-md-4 mb-4">
                  <div class="card card-bg h-100 px-4 px-md-2 px-lg-3 px-xxl-4 pt-4">
                    <div class="card-body text-center text-md-start">
                      <h6 class="fw-bold fs-1"><?= $value['judul'] ?></h6>
                      <p class="mt-3 mb-md-0 mb-lg-3"><?= $value['isi_konten'] ?></p>
                      <footer>
                        <h6 style="margin-top: auto;"><?= date('d F Y', strtotime($value['created_date'])) ?></h6>
                      </footer>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

      </div>
    </section>

    <section class="py-0" id="service">

      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-xxl-5 mx-auto text-center py-4">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-1">Donasi</h5>
            <!-- <p class="mb-0">Klean is an elegant HTML5 template and a perfect starting point for your next SaaS oriented site, carefully curated by <span class="fw-bold">ThemeWagon</span></p> -->
          </div>
        </div>



        <div class="row flex-center circle-blend circle-blend-right circle-warning">
          <div class="col-xl-9">
            <div class="row justify-content-center circle">
              <?php
              foreach ($dashboardDonasi as $value) : ?>
                <?php
                    $penyaluran = $this->db->get_where('tbl_penyaluran', ['id_penggalangan' => $value['id_penggalangan']])->result_array();
                ?>
                <?php $totalpenyaluran = 0 ?>
                <?php foreach ($penyaluran as $values) : ?>
                    <?php
                        $total_harapan1 = str_replace('Rp.', '',$values['jumlah']);
                        $total_harapan2 = str_replace('.', '', $total_harapan1);
                        $total = intval($total_harapan2);
                        $totalpenyaluran += $total;
                    ?>
                <?php endforeach; ?>
                <div class="col-md-4 mb-4">
                  <div class="card card-bg h-100 px-4 px-md-2 px-lg-3 px-xxl-4 pt-4">
                    <img class="card-img-top" src="<?= base_url('assets/img/laporan/') . $value['gambar']; ?>" alt="Card image cap">
                    <div class="card-body text-center text-md-start">
                      <h6 class="fw-bold fs-1"><?= $value['judul'] ?></h6>
                      <?php
                          $id_penggalangan = $value['id_penggalangan'];
                          $donasi = $this->db->query("SELECT SUM(nominal) as total FROM tbl_donasi WHERE id_penggalangan = $id_penggalangan AND status = 'Diterima' ")->row_array();
                      ?>

                      <p class="card-text" id="totalProses">Rp<?= number_format($donasi['total'] - $totalpenyaluran, 0, ',', '.');  ?> &nbsp;&nbsp;Terkumpul dari &nbsp;&nbsp; <?= $value['total_harapan'] ?></p>
                      <form action="<?php echo site_url('Dashboard/detail'); ?>" method="post">
                                                            <input type="hidden" name="id_penggalangan" value="<?= $value['id_penggalangan'] ?>">
                                                            <button type="submit" style="width: 100%;" class="btn btn-danger">Donasi Sekarang !</button>
                                                        </form>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

      </div>
    </section>

    <div class="text-center">
      <a href="<?= site_url('Dashboard/penggalanganDana') ?>">
        <button class="btn btn-primary">Show All</button>
      </a>
    </div>

    <footer class="mt-3">
      <div style="width:100%; text-align:center;">
        <p>All rights Reserved &copy; 2022 </p>
      </div>
    </footer>




  </main>

  <script src="<?= base_url('assets/assets2/vendors/@popperjs/popper.min.js')?>"></script>
  <script src="<?= base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/assets2/vendors/is/is.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/assets2/vendors/feather-icons/feather.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/assets2/js/theme.js'); ?>"></script>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">


</body>

</html>