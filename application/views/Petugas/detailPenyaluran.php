<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2><?= $title; ?></h2>
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

                    <?php $totalpenyaluran = 0 ?>
                    <?php foreach ($penyaluran as $value) : ?>
                        <?php
                            $total_harapan1 = str_replace('Rp.', '',$value['jumlah']);
                            $total_harapan2 = str_replace('.', '', $total_harapan1);
                            $total = intval($total_harapan2);
                            $totalpenyaluran += $total;
                        ?>
                    <?php endforeach; ?>
                <?php $i = 1;
                $donasi = 0;
                foreach ($detailPenyaluranDonasi as $value) : ?>
                    <div class="col-lg-4">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/img/laporan/') . $value['gambar']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['judul']; ?></h5>
                                
                                <?php
                                    $id_penggalangan = $value['id_penggalangan'];
                                    $donasi = $this->db->query("SELECT SUM(nominal) as total FROM tbl_donasi WHERE id_penggalangan = $id_penggalangan AND status = 'Diterima' ")->row_array();
                                ?>

                                <?php
                                    $x1 = str_replace("Rp. ","",$value['total_harapan']);
                                    $x2 = str_replace(".","",$x1);
                                    $totalpersen = round((intval($value['total_proses'])/intval($x2)) * 100);
                                ?>

                                <p class="card-text" id="totalProses">Rp<?= number_format($donasi['total'] - $totalpenyaluran, 0, ',', '.');  ?> &nbsp;&nbsp;Terkumpul dari &nbsp;&nbsp; <?= $value['total_harapan']; ?></p>
                                <div class="progress mt-4 mb-4">
                                    <div class="progress-bar" id="prosesBar" style="width:<?= $totalpersen >= 100 ? 100 : $totalpersen ?>%"><?= $totalpersen >= 100 ? 100 : $totalpersen ?>%</div>
                                </div>
                                <div class="col-lg-12 mb-2">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h6><?= $value['jml_donatur'] ?> &nbsp;&nbsp;Donatur</h6>
                                        </div>
                                        <div class="col-lg-5">
                                            <h6 style="float: right;"><?php
                                                                        $capaian = new DateTime($value['waktu_penggalangan']);
                                                                        $today = new DateTime("today");
                                                                        $y = $today->diff($capaian)->y;
                                                                        $m = $today->diff($capaian)->m;
                                                                        $d = $today->diff($capaian)->d;

                                                                        echo  $m . "Bulan" . $d . "Hari";


                                                                        ?></h6>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="col-lg-8">
                    <?php $totalpenyaluran = 0 ?>
                    <?php foreach ($penyaluran as $value) : ?>
                        <?php
                            $total_harapan1 = str_replace('Rp.', '',$value['jumlah']);
                            $total_harapan2 = str_replace('.', '', $total_harapan1);
                            $total = intval($total_harapan2);
                            $totalpenyaluran += $total;
                        ?>
                    <?php endforeach; ?>
                    <p class="d-none" id="totaldonasimasuk"><?= $donasi['total'] - $totalpenyaluran ?></p>
                    <div class="ml-3">
                        <h5>Total Donasi Masuk = Rp. <?= number_format($donasi['total'], 0, ',', '.');  ?></h5>
                        <h5>Total Penyaluran = Rp. <?= number_format($totalpenyaluran, 0, ',', '.');  ?></h5>
                        <h5>Dana Saat Ini = Rp. <?= number_format($donasi['total'] - $totalpenyaluran, 0, ',', '.');  ?></h5>
                    </div>
                    <button class="btn btn-primary mt-3 mb-2 ml-3" id="btnanak">Anak Asuh</button>
                    <div class="card-box table-responsive d-none" id="data-anak">
                        <table id="table_anak" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Alamat</th>
                                    <th>Kategori</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($anak as $value) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['jk'] ?></td>
                                        <td><?= $value['tgl_lahir'] ?></td>
                                        <td><?= $value['umur'] ?></td>
                                        <td><?= $value['alamat'] ?></td>
                                        <td><?= $value['kategori'] ?></td>
                                        <td><?= $value['created_date'] ?></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
                    <script type="text/javascript">
                        $('#btnanak').click(function(){
                            $('#data-anak').toggleClass('d-none')
                        })
                    </script>

                    <button type="button" class="btn btn-secondary mt-3 mb-2 ml-3" data-toggle="modal" data-target=".modalPenyaluran">Tambah Penyaluran</button>
                    <div class="mt-3 mb-3">
                        <?= $this->session->tempdata('message'); ?>
                    </div>

                    <div class="card-box table-responsive">

                        <table id="table_id" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Penyaluran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1;
                                foreach ($informasiPenyaluran as $value) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $value['keterangan'] ?></td>
                                        <td><?= $value['jumlah'] ?></td>
                                        <td><?= date('d F Y', strtotime($value['tgl_penyaluran'])) ?></td>
                                        <td>
                                            <a data-toggle="modal" data-target=".editPenyaluran<?= $value['id_penyaluran']; ?>" class="badge badge-success" data-popup="tooltip" data-placement="top" title="Edit Data" style="color:white;"><i class="fa fa-edit" style="font-size:15px"></i></a>
                                            <a href="<?= site_url('Petugas/deletePenyaluran/') . $value['id_penyaluran']; ?>" class="badge badge-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini... ?');"><i class="fa fa-trash" style="font-size: 15px; color: white;"></i></a>
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
                                            doc.styles.title = {
                                                color: 'black',
                                                fontSize: '12',
                                                alignment: 'center'
                                            }   
                                        }
                                    },
                                    'colvis'
                                ],
                            });

                            $('#table_anak').DataTable({
                            dom: 'lBfrtip',
                                buttons: [
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
                                        title: 'Yayasan Al-Fitroh Kedoya\nJalan Kedoya Raya, Gang Asem No. 14, Rt 02, Rw 06\nLaporan Penyaluran Penggalangan(Pengeluaran Dana)\nPeriode (ALL) Semua',
                                        customize: function ( doc ) {
                                            doc.styles.title = {
                                                color: 'black',
                                                fontSize: '12',
                                                alignment: 'center'
                                            }   
                                        }
                                    },
                                    'colvis'
                                ],
                            });

                        });
                    </script>
                </div>
                
                <?php $no = 0;
                foreach ($detailPenyaluranDonasi as $value) : $no++; ?>
                    <div class="modal fade modalPenyaluran" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Petugas/tambahPenyaluran'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Penyaluran Donasi</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_penggalangan" value="<?= $value['id_penggalangan'] ?>" required="required" readonly class="form-control">
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Keterangan<span class="required">*</span>
                                                </label>
                                                <input type="text" name="keterangan" id="keterangan" required="required" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Jumlah<span class="required">*</span>
                                                </label>
                                                <input type="text" name="jumlah" id="total_harapan" required="required" class="form-control ">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <button class="btn btn-primary" type="reset" style="float: right;">Reset</button>
                                                <button type="submit" class="btn btn-success" style="float: right;"  onclick="return check()">Submit</button>
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                            function check()
                                            {
                                                const total = document.getElementById('totaldonasimasuk').innerHTML
                                                const jumlah = document.getElementById('total_harapan').value
                                                const jumlah1 = jumlah.replace('Rp.', '')
                                                const jumlah2 = jumlah1.replace(' ', '')
                                                const jumlah3 = jumlah2.replace('.', '')

                                                if(jumlah3 > total) {
                                                    alert('Dana Tidak Cukup !')
                                                    return false
                                                } else {
                                                    return true
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php $no = 0;
                foreach ($informasiPenyaluran as $value) : $no++; ?>
                    <div class="modal fade editPenyaluran<?= $value['id_penyaluran']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Petugas/editPenyaluran'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">Penyaluran Donasi</h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_penyaluran" value="<?= $value['id_penyaluran'] ?>" required="required" readonly class="form-control">
                                        <input type="hidden" name="id_penggalangan" value="<?= $value['id_penggalangan'] ?>" required="required" readonly class="form-control">
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Keterangan<span class="required">*</span>
                                                </label>
                                                <input type="text" name="keterangan" id="keterangan" value="<?= $value['keterangan'] ?>" required="required" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Jumlah<span class="required">*</span>
                                                </label>
                                                <input type="text" name="jumlah" id="total_harapan" value="<?= $value['jumlah'] ?>" required="required" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Tanggal Penyaluran<span class="required">*</span>
                                                </label>
                                                <input type="date" name="tgl_penyaluran" value="<?= $value['tgl_penyaluran'] ?>" required="required" class="form-control ">
                                            </div>
                                        </div>

                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12">
                                                <button class="btn btn-primary" type="reset" style="float: right;">Reset</button>
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