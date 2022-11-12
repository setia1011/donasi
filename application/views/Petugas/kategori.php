<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Kategori Penggalangan Dana</h2>
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
                    <button type="button" class="btn btn-secondary mt-3 mb-3 ml-3" data-toggle="modal" data-target=".modalPenggalangan">Tambah Kategori Penggalangan Dana</button>
                    <div class="mt-3 mb-3">
                        <?= $this->session->tempdata('message'); ?>
                    </div>
                    <div class="card-box table-responsive">

                        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($kategori as $value) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target=".editKategori<?= $value['id']; ?>" class="badge badge-success" data-popup="tooltip" data-placement="top" title="Edit Data" style="color:white;"><i class="fa fa-edit" style="font-size:20px"></i></a>
                                            
                                            <a href="<?php echo site_url('Petugas/hapusKategori/' . $value['id']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Kategori <?= $value['nama']; ?> ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash" style="font-size:20px"></i></a>
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

                <div class="modal fade modalPenggalangan" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Petugas/tambahKategori'); ?>" method="post" enctype="multipart/form-data">
                            <!-- <?php echo form_open_multipart('Petugas/tambahKategori'); ?> -->
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Tambah Kategori Penggalangan Dana</h4>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label>Nama
                                            </label>
                                            <input type="text" name="nama" required class="form-control ">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <button type="submit" class="btn btn-success" value="upload" style="float: right;">Submit</button>
                                            <!-- <input type="submit" class="btn btn-success" style="float: right;" value="Submit" /> -->
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>


                <?php $no = 0;
                foreach ($kategori as $value) : $no++; ?>
                    <div class="modal fade editKategori<?= $value['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Petugas/editKategori'); ?>" method="post">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Edit Kategori Penggalangan Dana</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <input type="hidden" name="id" id="id" value="<?= $value['id'] ?>" required class="form-control ">

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Nama<span class="required">*</span>
                                                </label>
                                                <input type="text" name="nama" id="nama" value="<?= $value['nama'] ?>" required class="form-control ">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <!-- <button class="btn btn-primary" type="reset" style="float: right;">Reset</button> -->
                                                <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>