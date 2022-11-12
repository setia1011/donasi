<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Donasi</h2>
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
                    <button type="button" class="btn btn-secondary mt-3 mb-2 ml-3" data-toggle="modal" data-target=".modalFilterDonasi">Filter Donasi</button>
                    <div class="mt-3 mb-3">
                        <?= $this->session->tempdata('message'); ?>
                    </div>
                    <div class="card-box table-responsive">

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
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($verifDonasi as $value) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['judul'] ?></td>
                                        <td><?= $value['nama_kategori'] ?></td>
                                        <td>Rp. <?= number_format($value['nominal'],0,',','.') ?></td>
                                        <td><?= $value['status'] ?></td>
                                        <td><?= date('d F Y', strtotime($value['created_date'])) ?></td>
                                        <td>
                                            <a href="<?= site_url('Petugas/detailDonasi/') . $value['id_donasi']; ?>" class="badge badge-warning"><i class="fa fa-search" style="font-size: 15px; color: white;"></i></a>
                                            <a href="<?= site_url('Petugas/infoDonatur/') . $value['id_user']; ?>" class="badge badge-info"><i class="fa fa-user" style="font-size: 15px; color: white;"></i></a>
                                            <a href="<?= site_url('Petugas/deleteDonasi/') . $value['id_donasi']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini... ?');"><i class="fa fa-trash" style="font-size: 15px; color: white;"></i></a>
                                        </td>

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
                                buttons: [,
                                    {
                                        text: 'Print Excel',
                                        extend: 'excelHtml5',
                                        filename: 'Data Donasi',
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

        <div class="modal fade modalFilterDonasi" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Petugas/filterDonasi'); ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Filter Donasi</h4>
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12 ">
                                    <label>Filter Donasi</label>
                                    <select class="form-control" name="filterDonasi" required>
                                        <option value="Diterima">Diterima</option>
                                        <option value="Ditolak">Ditolak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-success" style="float: right;">Filter</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
</div>