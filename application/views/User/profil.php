<section class="py-0 mt-5" id="service">

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xxl-5 mx-auto text-center py-5">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-1"><?= $title; ?></h5>
                <!-- <p class="mb-0">Klean is an elegant HTML5 template and a perfect starting point for your next SaaS oriented site, carefully curated by <span class="fw-bold">ThemeWagon</span></p> -->
            </div>
        </div>

        <div class="row flex-center circle-blend circle-blend-right circle-warning">
            <div class="col-xl-9">
                <div class="row circle">
                    <div class="col-md-12 mb-4">
                        <div class="card card-bg h-100 px-4 px-md-2 px-lg-3 px-xxl-4 pt-4">
                            <div class="card-body text-center text-md-start">
                                <div class="col-lg-12">

                                    <table width="100%" style="text-align: left;">
                                        <tr>
                                            <th>Nama</th>
                                            <th>: <?= $user['nama'] ?></th>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <th>: <?= $user['email'] ?></th>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <th>: <?= date('d F Y', strtotime($user['tgl_lahir']))  ?></th>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <th>: <?= $user['jk'] ?></th>
                                        </tr>
                                        <tr>
                                            <th>Nomor Telpon</th>
                                            <th>: <?= $user['no_telpon'] ?></th>
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <th>: <?= $user['password'] ?></th>
                                        </tr>

                                        <?php
                                            $iduser = $user['id_user'];
                                            $total = $this->db->query("SELECT SUM(nominal) AS total FROM `tbl_donasi` WHERE id_user = $iduser AND status = 'Diterima' ")->row_array();
                                        ?>
                                        <tr>
                                            <th>Total Donasi</th>
                                            <th>: Rp. <?= number_format($total['total'],0,',','.'); ?></th>
                                        </tr>

                                    </table>
                                    <button type="button" class="btn btn-secondary mt-3 mb-3 ml-3" style="float: right;" data-toggle="modal" data-target=".modalEditProfil">Edit Profil</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade modalEditProfil" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('User/editProfil'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Profil</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>" required class="form-control ">

                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label>Nama
                                    </label>
                                    <input type="text" name="nama" value="<?= $user['nama'] ?>" required class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label>Email
                                    </label>
                                    <input type="text" name="email" value="<?= $user['email'] ?>" required class="form-control " readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label>Tanggal Lahir
                                    </label>
                                    <input type="date" name="tgl_lahir" value="<?= $user['tgl_lahir'] ?>" required class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label>Jenis Kelamin
                                    </label>
                                    <select class="custom-select" name="jk" required>
                                        <option selected><?= $user['jk'] ?></option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label>Nomor Telpon
                                    </label>
                                    <input type="text" name="no_telpon" value="<?= $user['no_telpon'] ?>" required class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label>Password
                                    </label>
                                    <input type="text" name="password" value="<?= $user['password'] ?>" required class="form-control ">
                                </div>
                            </div>

                            

                            

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-secondary" value="upload" style="float: right;">Submit</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>

    </div>
</section>

<section class="py-0 mt-1 mb-4" id="service">
    <div class="container">

        <div class="row flex-center circle-blend circle-blend-right circle-warning">
            <div class="col-xl-9">
                <div class="row circle">
                    <div class="col-md-12 mb-4">
                        <div class="card card-bg h-100 px-4 px-md-2 px-lg-3 px-xxl-4 pt-4">
                            <div class="card-body text-center text-md-start">
                                <h3 style="width: 100%; text-align: center;">Riwayat Donasi</h3>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="card-box table-responsive">
                                            <div class="mb-3">
                                                <?= $this->session->tempdata('message'); ?>
                                            </div>
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
                                                    foreach ($historyDonasi as $value) : ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $value['nama'] ?></td>
                                                            <td><?= $value['judul'] ?></td>
                                                            <td><?= $value['kategori'] ?></td>
                                                            <td>Rp. <?= number_format($value['nominal'], 0, ',', '.') ?></td>
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
                                        </div>
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
                                                        title: 'Yayasan Al-Fitroh Kedoya\nJalan Kedoya Raya, Gang Asem No. 14, Rt 02, Rw 06\nLaporan Riwayat Donasi \nPeriode (ALL) Semua',
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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>