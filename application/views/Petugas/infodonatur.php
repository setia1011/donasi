<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Info Detail Donatur</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="mt-3 mb-3">
                        <?= $this->session->tempdata('message'); ?>
                    </div>
                    <div class="card-box table-responsive">

                        <table width="100%" class="ml-3 mb-5">
                            <tr>
                                <th>Nama</th>
                                <th>: <?= $donatur['nama'] ?></th>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <th>: <?= $donatur['email'] ?></th>
                            </tr>
                            <tr>
                                <th>Tanggal Lahir</th>
                                <th>: <?= date('d F Y', strtotime($donatur['tgl_lahir']))  ?></th>
                            </tr>
                            <tr>
                                <th>Jenis Kelamin</th>
                                <th>: <?= $donatur['jk'] ?></th>
                            </tr>
                            <tr>
                                <th>Nomor Telpon</th>
                                <th>: <?= $donatur['no_telpon'] ?></th>
                            </tr>
                            <tr>
                                <th>Password</th>
                                <th>: <?= $donatur['password'] ?></th>
                            </tr>
                            <?php
                                $iduser = $donatur['id_user'];
                                $total = $this->db->query("SELECT SUM(nominal) AS total FROM `tbl_donasi` WHERE id_user = $iduser AND status = 'Diterima' ")->row_array();
                            ?>
                            <tr>
                                <th>Total Donasi</th>
                                <th>: Rp. <?= number_format($total['total'],0,',','.'); ?></th>
                            </tr>
                        </table>

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
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($donasi as $value) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['judul'] ?></td>
                                        <td><?= $value['nama_kategori'] ?></td>
                                        <td>Rp. <?= number_format($value['nominal'], 0, ',', '.') ?></td>
                                        <td><?= $value['status'] ?></td>
                                        <td><?= date('d F Y', strtotime($value['created_date'])) ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

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
                    <script>
                        $(document).ready(function() {


                            $('#table_id').DataTable({

                                dom: 'lBfrtip',
                                buttons: [
                                    {
                                        text: 'Print Excel',
                                        extend: 'excelHtml5',
                                        filename: 'Data Penggalangan Dana',
                                        exportOptions: {
                                            columns: [0, ':visible']
                                        }
                                    },
                                    {
                                        extend: 'pdfHtml5',
                                        text: 'PDF with logo',
                                        title: 'Donasi - Prototype',
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

                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>