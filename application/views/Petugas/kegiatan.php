<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">

        <div class="x_title">
            <h2>Kegiatan</h2>
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
                    <button type="button" class="btn btn-secondary mt-3 mb-3 ml-3" data-toggle="modal" data-target=".modalPenggalangan">Tambah Kegiatan</button>
                    <div class="mt-3 mb-3">
                        <?= $this->session->tempdata('message'); ?>
                    </div>
                    <div class="card-box table-responsive">

                        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Kategori</th>
                                    <th>Penggalangan Id</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($kegiatan as $value) : ?>
                                    
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['nama_kegiatan'] ?></td>
                                        <td><?= $value['desc_kegiatan'] ?></td>
                                        <td><?= $value['kategori_kegiatan'] ?></td>
                                        <td><?= $value['judul'] ?></td>
                                        <td><img style="width: 200px; heigth: 200px; object-fit: cover" src="<?= base_url('kegiatan/'. $value['gambar_kegiatan']) ?>" alt=""></td>
                                        <td>
                                            <button class="btn btn-success" data-toggle="modal" data-target=".modalEditPenggalangan<?= $value['id']?>"><i class="fa fa-edit"></i> Edit</button>
                                            <form action="<?= site_url('Petugas/deleteKegiatan/'. $value['id'])?>">
                                                <button class="btn btn-danger" type="submit" onclick="return confirm('delete data ?')"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
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
                                        title: 'Yayasan Al-Fitroh Kedoya\nJalan Kedoya Raya, Gang Asem No. 14, Rt 02, Rw 06\nLaporan Kegiatan Dalam Penggalangan\nPeriode (ALL) Semua',
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
                        <?php echo form_open_multipart('Petugas/tambahKegiatan'); ?>
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Tambah Kegiatan</h4>
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label>Nama
                                            </label>
                                            <input type="text" name="nama" id="nama" required class="form-control ">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label>Penggalangan
                                            </label>
                                            <select class="custom-select" name="kategori_penggalangan" required>
                                                <option selected disabled>--- Pilih Penggalangan ---</option>
                                                <?php foreach($penggalangan as $value) : ?>
                                                    <option value="<?= $value['id_penggalangan']?>"><?= $value['judul']?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label>Deskripsi Kegiatan
                                            </label>
                                            <input type="text" name="desc_kegiatan" id="desc_kegiatan" required class="form-control uang">
                                        </div>
                                    </div>

                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label>Kategori Kegiatan
                                            </label>
                                            <input type="text" name="kategori_kegiatan" id="kategori_kegiatan" required class="form-control uang">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label class="col-form-label col-md-2 col-sm-2 ">Upload Gambar Kegiatan</label>
                                            <input class="form-control " type="file" name="imageup"  required>
                                        </div>
                                    </div>


                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12">
                                            <button class="btn btn-primary" type="reset" style="float: right;">Reset</button>
                                            <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
                                            <!-- <input type="submit" class="btn btn-success" style="float: right;" value="Submit" /> -->
                                        </div>
                                    </div>

                                </div>

                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>

                <?php foreach($kegiatan as $values) : ?>
                    <div class="modal fade modalEditPenggalangan<?= $values['id']?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <?php echo form_open_multipart('Petugas/editKegiatan/'. $values['id']); ?>
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Edit Kegiatan</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Nama
                                                </label>
                                                <input type="text" name="nama<?= $values['id']?>" id="nama" required class="form-control " value="<?= $values['nama_kegiatan']?>">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Penggalangan
                                                </label>
                                                <select class="custom-select" name="kategori_penggalangan<?= $values['id']?>" required>
                                                    <option selected disabled>--- Pilih Penggalangan ---</option>
                                                    <?php foreach($penggalangan as $value) : ?>
                                                        <?php if($value['id_penggalangan'] == $values['id_penggalangan']) { ?>
                                                            <option value="<?= $value['id_penggalangan']?>" selected><?= $value['judul']?></option>
                                                        <?php } else { ?>
                                                            <option value="<?= $value['id_penggalangan']?>"><?= $value['judul']?></option>
                                                        <?php } ?>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Deskripsi Kegiatan
                                                </label>
                                                <input type="text" name="desc_kegiatan<?= $values['id']?>" id="desc_kegiatan" required class="form-control uang" value="<?= $values['desc_kegiatan']?>">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Kategori Kegiatan
                                                </label>
                                                <input type="text" name="kategori_kegiatan<?= $values['id']?>" id="kategori_kegiatan" required class="form-control uang" value="<?= $values['kategori_kegiatan']?>">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label class="col-form-label col-md-2 col-sm-2 ">Upload Gambar Kegiatan</label>
                                                <input class="form-control " type="file" name="imageup<?= $values['id']?>"  required>
                                            </div>
                                        </div>


                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <button class="btn btn-primary" type="reset" style="float: right;">Reset</button>
                                                <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
                                                <!-- <input type="submit" class="btn btn-success" style="float: right;" value="Submit" /> -->
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>
    </div>
</div>