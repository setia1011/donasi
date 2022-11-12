<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#ffffff">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Donasi</title>

  <style>
    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {

      .carousel-inner img {

        height: 1000px;

      }


    }
  </style>


  <link rel="stylesheet" href="<?php echo base_url('assets/assets2/css/theme.css'); ?>">


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
            <button id="testbtnlagi" class="btn btn-light shadow-klean order-0"><span class="text-gradient fw-bold">
              Cetak Laporan
            </button>
          </div>
        </div>
      </div>
    </nav>

    <section class="d-none" id="laporan1">
      <table id="table_id" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Donatur</th>
                  <th>Penggalangan</th>
                  <th>Kategori</th>
                  <th>Nominal Donasi</th>
                  <th>Status</th>
                  <th>Tanggal Masuk</th>
                  <!-- <th>Aksi</th> -->
              </tr>
          </thead>
          <tbody>
              <?php $i = 1;
              foreach ($donatur as $value) : ?>
                  <tr>
                      <td><?= $i ?></td>
                      <td><?= $value['nama'] ?></td>
                      <td><?= $value['judul'] ?></td>
                      <td><?= $value['kategori'] ?></td>
                      <td>Rp<?= number_format($value['nominal'], 0, ',', '.') ?></td>
                      <td><?= $value['status'] ?></td>
                      <td><?= date('d F Y', strtotime($value['created_date'])) ?></td>
                      <!-- <td>
                          <a href="<?= site_url('Petugas/detailDonasi/') . $value['id_donasi']; ?>" class="badge badge-warning"><i class="fa fa-search" style="font-size: 15px; color: white;"></i></a>
                          <a href="<?= site_url('Petugas/deleteDonasi/') . $value['id_donasi']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini... ?');"><i class="fa fa-trash" style="font-size: 15px; color: white;"></i></a>
                      </td> -->
                  </tr>
                  <?php $i++; ?>
              <?php endforeach; ?>
          </tbody>
      </table>
    </section>

    <section id="laporan2" class="d-none">
      <table id="table_idddd" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Penggalangan</th>
                  <th>Nominal</th>
                  <th>Keterangan</th>
                  <th>Tanggal Penyaluran</th>
                  <!-- <th>Aksi</th> -->
              </tr>
          </thead>
          <tbody>
              <?php $i = 1;
              foreach ($penyaluran as $value) : ?>
                  <tr>
                      <td><?= $i ?></td>
                      <td><?= $value['judul'] ?></td>
                      <td><?= $value['jumlah'] ?></td>
                      <td><?= $value['keterangan'] ?></td>
                      <td><?= date('d F Y', strtotime($value['created_date'])) ?></td>
                      <!-- <td>
                          <a href="<?= site_url('Petugas/detailDonasi/') . $value['id_donasi']; ?>" class="badge badge-warning"><i class="fa fa-search" style="font-size: 15px; color: white;"></i></a>
                          <a href="<?= site_url('Petugas/deleteDonasi/') . $value['id_donasi']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini... ?');"><i class="fa fa-trash" style="font-size: 15px; color: white;"></i></a>
                      </td> -->
                  </tr>
                  <?php $i++; ?>
              <?php endforeach; ?>
          </tbody>
      </table>
    </section>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
      <script src="<?= base_url() ?>assets/js/plugins/jquery.dataTables.min.js"></script>
      <script type="text/javascript">
          $('#table_id').DataTable({
              dom: 'lBfrtip',
              buttons: [{
                      text: 'Print PDF',
                      extend: 'pdfHtml5',
                      filename: 'Riwayat Donasi',
                      exportOptions: {
                          columns: [0, ':visible']
                      }
                  },
                  {
                      text: 'Print Excel',
                      extend: 'excelHtml5',
                      filename: 'Riwayat Donasi',
                      exportOptions: {
                          columns: [0, ':visible']
                      }
                  },
                  {
                      text: 'Print CSV',
                      extend: 'csvHtml5',
                      filename: 'Riwayat Donasi',
                      exportOptions: {
                          columns: [0, ':visible']
                      }
                  },
                  {
                      extend: 'pdfHtml5',
                      text: 'PDF with logo',
                      title: 'Prototype - Donasi',
                      customize: function ( doc ) {
                          // Splice the image in after the header, but before the table
                          doc.styles.title = {
                              color: 'black',
                              fontSize: '12',
                              alignment: 'center'
                          }   
                          // Data URL generated by http://dataurl.net/#dataurlmaker
                      }
                  },
                  'colvis'
              ],
          });

          $('#table_idddd').DataTable({
              dom: 'lBfrtip',
              buttons: [{
                      text: 'Print PDF',
                      extend: 'pdfHtml5',
                      filename: 'Riwayat Penyaluran',
                      exportOptions: {
                          columns: [0, ':visible']
                      }
                  },
                  {
                      text: 'Print Excel',
                      extend: 'excelHtml5',
                      filename: 'Riwayat Penyaluran',
                      exportOptions: {
                          columns: [0, ':visible']
                      }
                  },
                  {
                      text: 'Print CSV',
                      extend: 'csvHtml5',
                      filename: 'Riwayat Penyaluran',
                      exportOptions: {
                          columns: [0, ':visible']
                      }
                  },
                  {
                      extend: 'pdfHtml5',
                      text: 'PDF with logo',
                      title: 'Prototype - Donasi',
                      customize: function ( doc ) {
                          // Splice the image in after the header, but before the table
                          doc.styles.title = {
                              color: 'black',
                              fontSize: '12',
                              alignment: 'center'
                          }   
                          // Data URL generated by http://dataurl.net/#dataurlmaker
                      }
                  },
                  'colvis'
              ],
          });
      </script>

      <script type="text/javascript">
        const testbtn = document.getElementById('testbtnlagi')
        const excel = document.getElementsByClassName('dt-button buttons-excel buttons-html5')
        const laporan1 = document.getElementById('laporan1')
        const laporan2 = document.getElementById('laporan2')

        testbtn.addEventListener('click', () => {
          laporan1.classList.remove('d-none')
          excel[0].click()
          laporan1.classList.add('d-none')
          laporan2.classList.remove('d-none')
          excel[1].click()
          laporan2.classList.add('d-none')
        })

      </script>


    <section class="py-0" id="service">

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

      <!-- end of .container-->

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



  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


  <script src="<?php echo base_url('assets/assets2/vendors/@popperjs/popper.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/assets2/vendors/bootstrap/bootstrap.min.js'); ?>"></script>


  <script src="<?php echo base_url('assets/assets2/vendors/is/is.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/assets2/vendors/feather-icons/feather.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/assets2/js/theme.js'); ?>"></script>

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">


</body>

</html>