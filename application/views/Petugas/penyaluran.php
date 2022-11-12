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
        <div class="mb-3">
            <?= $this->session->tempdata('message'); ?>
        </div>
        <div class="x_content">
            <div class="row">
                
                <?php $i = 1;
                foreach ($penggalanganDana as $value) : ?>
                    <div class="col-sm-3">
                        <div class="card">
                            <img class="card-img-top" src="<?= base_url('assets/img/laporan/') . $value['gambar']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['judul'] ?></h5>

                                <p class="card-text" id="totalProses">Rp<?= number_format($value['total_proses'], 0, ',', '.');  ?> &nbsp;&nbsp;Terkumpul dari &nbsp;&nbsp; <?= $value['total_harapan'] ?></p>
                                <div class="progress mt-4 mb-4">
                                    
                                    <?php
                                        $total_harapan1 = str_replace('Rp.', '',$value['total_harapan']);
                                        $total_harapan2 = str_replace('.', '', $total_harapan1);
                                        $total = intval($total_harapan2);
                                    ?>
                                    <?php
                                        $totalpersen = ($value['total_proses']/$total) * 100;
                                    ?>

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
                                <form action="<?php echo site_url('Petugas/detailPenyaluran'); ?>" method="post">
                                    <input type="hidden" name="id_penggalangan" value="<?= $value['id_penggalangan'] ?>">
                                    <button type="submit" style="width: 100%;" class="btn btn-danger">Penyaluran Donasi !</button>
                                </form>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</div>