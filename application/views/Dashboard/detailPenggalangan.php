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
                <div class="row justify-content-center circle">
                    <div class="col-md-12 mb-4">
                        <div class="card card-bg h-100 px-4 px-md-2 px-lg-3 px-xxl-4 pt-4">
                            <div class="card-body text-center text-md-start">
                                <div class="col-lg-12">
                                    
                                    <div class="row">
                                        <?php
                                        foreach ($detailPenggalangan as $value) : ?>

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

                                        <?php
                                            $id_penggalangan = $value['id_penggalangan'];
                                            $donasi = $this->db->query("SELECT SUM(nominal) as total FROM tbl_donasi WHERE id_penggalangan = $id_penggalangan AND status = 'Diterima' ")->row_array();
                                        ?>

                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <img class="card-img-top" src="<?= base_url('assets/img/laporan/') . $value['gambar']; ?>" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $value['judul'] ?></h5>

                                                        <p class="card-text" id="totalProses">Rp<?= number_format($donasi['total'] - $totalpenyaluran,0,',','.');  ?> &nbsp;&nbsp;Terkumpul dari &nbsp;&nbsp; <?= $value['total_harapan'] ?></p>
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
                                                                    <h6><?= $value['jml_donatur'] ?> Donatur</h6>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <h6 style="float: right;"><?php
                                                                                                $capaian = new DateTime($value['waktu_penggalangan']);
                                                                                                $today = new DateTime("today");
                                                                                                $y = $today->diff($capaian)->y;
                                                                                                $m = $today->diff($capaian)->m;
                                                                                                $d = $today->diff($capaian)->d;
                                                                                                $avail = $capaian > $today;
                                                                                                
                                                                                                echo $avail ? $m . "Bulan" . $d . "Hari" : "donasi sudah berakhir"

                                                                                                ?></h6>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <?php if($avail) { ?>
                                                        <form action="<?php echo site_url('User/formDonasi'); ?>" method="post">
                                                            <input type="hidden" name="id_penggalangan" value="<?= $value['id_penggalangan'] ?>">
                                                            <button type="submit" style="width: 100%;" class="btn btn-danger">Donasi Sekarang !</button>
                                                        </form>
                                                        <?php } else { ?>
                                                            <button type="button" disabled style="width: 100%;" class="btn btn-danger">Donasi Ditutup</button>
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="col-lg-12 mt-3">
                                            <div class="card">
                                                <h3 class="ml-3 mt-3 mb-4"><u><b>Para Donatur</b></u></h3>
                                                <div class="row">
                                                    <?php
                                                    $totaldonasi = 0;
                                                    foreach ($paraDonatur as $value) : ?>
                                                        <?php
                                                            $totaldonasi += $value['nominal'];
                                                        ?>
                                                        <div class="col-lg-6">
                                                            <div class="card ml-3 mb-3">
                                                                <div class="ml-4">
                                                                    <h4><u><?= $value['nama'] ?></u></h4>
                                                                    <h6><?= $value['doa'] ?></h6>
                                                                    <h6>Rp<?= number_format($value['nominal'],0,',','.') ?></h6>
                                                                    <h6><?= date('d F Y', strtotime($value['created_date'])) ?></h6>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>

                                                    <?php endforeach; ?>
                                                </div>
                                                <h4 class="text-center">Total Donasi = Rp. <?= number_format($totaldonasi,0,',','.') ?></h4>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-3">
                                            <div class="card" style="text-align: left;">
                                                <h3 class="ml-3 mt-3 mb-4"><u><b>Informasi Penyaluran Donasi</b></u></h3>
                                                <?php $totalpenyaluran = 0 ?>
                                                <div class="row">
                                                    <?php
                                                    foreach ($informasiPenyaluran as $value) : ?>
                                                        <?php
                                                            $total_harapan1 = str_replace('Rp.', '',$value['jumlah']);
                                                            $total_harapan2 = str_replace('.', '', $total_harapan1);
                                                            $total = intval($total_harapan2);
                                                            $totalpenyaluran += $total;
                                                        ?>
                                                        <div class="col-lg-6">
                                                            <div class="card ml-3 mb-3">
                                                                <table class="ml-4 mt-3" width="100%">
                                                                    <tr>
                                                                        <th width="200">Keterangan</th>
                                                                        <th><b>:<?= $value['keterangan'] ?></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="200">Jumlah</th>
                                                                        <th><b>:<?= $value['jumlah'] ?></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th width="200">Tanggal Penyaluran</th>
                                                                        <th><b>:<?= date('d F Y', strtotime($value['tgl_penyaluran'])) ?></b></th>
                                                                    </tr>

                                                                </table>

                                                            </div>
                                                        </div>

                                                    <?php endforeach; ?>
                                                </div>
                                                <h4 class="text-center">Total Penyaluran = Rp. <?= number_format($totalpenyaluran,0,',','.') ?></h4>

                                            </div>
                                        </div>

                                        <div class="col-lg-12 mt-3">
                                            <div class="card" style="text-align: left;">
                                                <h3 class="ml-3 mt-3 mb-4"><u><b>Informasi Kegiatan Yayasan</b></u></h3>
                                                <div class="row">
                                                    <?php
                                                    foreach ($kegiatan as $value) : ?>
                                                        
                                                        <div class="text-center mb-3">
                                                            <img style="width: 500px; heigth: 500px; object-fit: cover" src="<?= base_url('kegiatan/'. $value['gambar_kegiatan']) ?>" alt="">
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class=" ml-3 card mb-3 mr-3">
                                                                <table class="ml-4 mt-3" width="100%">
                                                                    <tr>
                                                                        <th style="width:20%">Nama Kegiatan</th>
                                                                        <th style="width: 80%"><b>:<?= $value['nama_kegiatan'] ?></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width:20%">Deskripsi Kegiatan</th>
                                                                        <th style="width: 80%"><b>:<?= $value['desc_kegiatan'] ?></b></th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th style="width:20%">Kategori Kegiatan</th>
                                                                        <th style="width: 80%"><b>:<?= $value['kategori_kegiatan'] ?></b></th>
                                                                    </tr>

                                                                </table>

                                                            </div>
                                                        </div>

                                                    <?php endforeach; ?>
                                                </div>

                                            </div>
                                        </div>
                                        
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

