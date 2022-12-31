<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Penggalangan Dana</h2>
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
                    <button type="button" class="btn btn-secondary mt-3 mb-3 ml-3" data-toggle="modal" data-target=".modalPenggalangan">Tambah Penggalangan Dana</button>
                    <div class="mt-3 mb-3">
                        <?= $this->session->tempdata('message'); ?>
                    </div>
                    <div class="card-box table-responsive">

                        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Total Harapan</th>
                                    <th>Total Proses</th>
                                    <th>Bar</th>
                                    <th>Target Waktu Penggalangan</th>
                                    <th>Donatur</th>
                                    <th>Publish</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                $todaysample = new DateTime("today");
                                foreach ($penggalanganDana as $value) : ?>
                                    <?php
                                    
                                    $x1 = str_replace("Rp. ","",$value['total_harapan']);
                                    $x2 = str_replace(".","",$x1);
                                    $totalpersen = round((intval($value['total_proses'])/intval($x2)) * 100);
                                    
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><img src="<?= base_url('assets/img/laporan/') . $value['gambar']; ?>" alt="" height="120"></td>
                                        <td><?= $value['judul'] ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['total_harapan'] ?></td>
                                        <td>Rp<?= number_format($value['total_proses'],0,',','.') ?></td>
                                        <td><?= $totalpersen . '%'; ?></td>
                                        <!-- <td><?= date('d F Y', strtotime($value['waktu_penggalangan']))  ?></td> -->
                                        <td><?= strtotime(strval($todaysample->format('Y-m-d'))) > strtotime($value['waktu_penggalangan']) ? $value['waktu_penggalangan'] . " " . '(Donasi Sudah Ditutup)' : $value['waktu_penggalangan'] ?></td>
                                        <td><?= $value['jml_donatur'] ?></td>
                                        <td><?= date('d F Y', strtotime($value['created_date'])) ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target=".editPenggalangan<?= $value['id_penggalangan']; ?>" class="badge badge-success" data-popup="tooltip" data-placement="top" title="Edit Data" style="color:white;"><i class="fa fa-edit" style="font-size:20px"></i></a>
                                            
                                            <a data-toggle="modal" data-target=".editGambarPenggalangan<?= $value['id_penggalangan']; ?>" class="badge badge-primary" data-popup="tooltip" data-placement="top" title="Gambar Baru" style="color:white;"><i class="fa fa-image" style="font-size:20px"></i></a>

                                            <?php if(strtotime(strval($todaysample->format('Y-m-d'))) > strtotime($value['waktu_penggalangan'])) { ?>
                                                <a data-toggle="modal" data-target=".tambahMasaGalangan<?= $value['id_penggalangan']; ?>" class="badge badge-warning" data-popup="tooltip" data-placement="top" title="Tanggal Baru" style="color:white;"><i class="fa fa-plus" style="font-size:20px"></i>Perpanjang Donasi</a>
                                            <?php } ?>
                                            
                                            <a href="<?php echo site_url('Petugas/hapusPenggalangan/' . $value['id_penggalangan']); ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data <?= $value['judul']; ?> ?');" class="badge badge-danger" data-popup="tooltip" data-placement="top" title="Hapus Data"><i class="fa fa-trash" style="font-size:20px"></i></a>
                                        </td>

                                        <div class="modal fade tambahMasaGalangan<?= $value['id_penggalangan']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Petugas/tambahWaktu'); ?>" method="post" enctype="multipart/form-data">
                                                    <!-- <?php echo form_open_multipart('Petugas/tambahWaktu'); ?> -->
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Update Tanggal</h4>
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <input type="hidden" name="idgalang" id="idgalang" value="<?= $value['id_penggalangan']?>">

                                                            <div class="form-group row">
                                                                <div class="col-md-12 col-sm-12 ">
                                                                    <label class="col-form-label col-md-2 col-sm-2 ">Update Tanggal</label>
                                                                    <input class="form-control " type="date" name="date" required>
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

                                        <div class="modal fade editGambarPenggalangan<?= $value['id_penggalangan']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Petugas/updateBanner'); ?>" method="post" enctype="multipart/form-data">
                                                    <!-- <?php echo form_open_multipart('Petugas/updateBanner'); ?> -->
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">Update Gambar</h4>
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="form-group row">
                                                                <div class="col-md-12 col-sm-12 ">
                                                                    <label class="col-form-label col-md-2 col-sm-2 ">Current Banner</label>
                                                                    <img src="<?= base_url('assets/img/laporan/') . $value['gambar']; ?>" alt="" height="100">
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="idgambar" id="idgambar" value="<?= $value['id_penggalangan']?>">

                                                            <div class="form-group row">
                                                                <div class="col-md-12 col-sm-12 ">
                                                                    <label class="col-form-label col-md-2 col-sm-2 ">Update Banner</label>
                                                                    <input class="form-control " type="file" name="gambar" required>
                                                                </div>
                                                            </div>


                                                            <div class="ln_solid"></div>
                                                            <div class="item form-group">
                                                                <div class="col-md-12 col-sm-12">
                                                                    <button class="btn btn-primary" type="reset" style="float: right;">Reset</button>
                                                                    <button type="submit" class="btn btn-success" value="upload" style="float: right;">Submit</button>
                                                                    <!-- <input type="submit" class="btn btn-success" style="float: right;" value="Submit" /> -->
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>

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
                        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Petugas/tambahPenggalangan'); ?>" method="post" enctype="multipart/form-data">
                            <!-- <?php echo form_open_multipart('Petugas/tambahPenggalangan'); ?> -->
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Tambah Penggalangan Dana</h4>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label>Judul
                                            </label>
                                            <input type="text" name="judul" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label>Kategori
                                            </label>
                                            <select class="custom-select" name="kategori" required>
                                                <option selected disabled>---Kategori---</option>
                                                <?php foreach ($kategori as $value) : ?>
                                                    <option value="<?= $value['id']?>"><?= $value['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label>Total Harapan
                                            </label>
                                            <input type="text" name="total_harapan" id="total_harapan" required class="form-control uang">
                                        </div>
                                    </div>
                                    
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label>Batas Waktu Penggalangan
                                            </label>
                                            <input type="date" name="waktu_penggalangan" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label class="col-form-label col-md-2 col-sm-2 ">Upload Banner</label>
                                            <input class="form-control " type="file" name="gambar" required>
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <button class="btn btn-primary" type="reset" style="float: right;">Reset</button>
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
                foreach ($penggalanganDana as $value) : $no++; ?>
                    <div class="modal fade editPenggalangan<?= $value['id_penggalangan'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Petugas/editPenggalan'); ?>" method="post">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Edit Penggalangan Dana</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <input type="hidden" name="id_penggalangan" id="id_penggalangan" value="<?= $value['id_penggalangan'] ?>" required class="form-control ">

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Judul<span class="required">*</span>
                                                </label>
                                                <input type="text" name="judul" id="judul" value="<?= $value['judul'] ?>" required class="form-control ">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Kategori<span class="required">*</span>
                                                </label>
                                                <select class="form-control select2" style="width: 100%;" name="kategori" required>
                                                    <?php foreach ($kategori as $values) : ?>
                                                        <?php if($value['kategori'] == $values['id']) { ?>
                                                            <option selected value="<?= $values['id']?>"><?= $values['nama'] ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $values['id']?>"><?= $values['nama'] ?></option>
                                                        <?php } ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Total Harapan<span class="required">*</span>
                                                </label>
                                                <input type="text" name="total_harapan" id="total_harapan" value="<?= $value['total_harapan'] ?>" required class="form-control uang">
                                            </div>
                                        </div>
                                        <!-- <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Bar<span class="required">*</span>
                                                </label>
                                                <input type="text" name="bar" id="bar" value="<?= $value['bar'] ?>" required class="form-control">
                                            </div>
                                        </div> -->
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Batas Waktu Penggalangan<span class="required">*</span>
                                                </label>
                                                <input type="date" name="waktu_penggalangan" id="waktu_penggalangan" value="<?= $value['waktu_penggalangan'] ?>" required class="form-control ">
                                            </div>
                                        </div>
                                        <!-- <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Upload Banner<span class="required">*</span>
                                                </label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Upload</span>
                                                    </div>
                                                    <input type="file" class="form-control" name="foto" id="foto">
                                                </div>
                                            </div>
                                        </div> -->



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