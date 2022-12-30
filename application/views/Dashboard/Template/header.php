<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="theme-color" content="#ffffff">
  <!-- <link rel="icon" href="<?php echo base_url('assets/images/favicon.ico'); ?>" type="image/ico" /> -->
  

  <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>">

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