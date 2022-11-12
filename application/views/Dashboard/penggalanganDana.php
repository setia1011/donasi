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
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('Dashboard/filterKategori'); ?>" method="post" enctype="multipart/form-data" />
                                    <div class="row">
                                        <div class="col-md-10">
                                            <select class="form-control rounded-pill border-white input-box" name="kategori">
                                                <option selected>---Pilih Kategori---</option>
                                                <?php foreach($kategori as $value) : ?>
                                                    <option value="<?= $value['id']?>"><?= $value['nama'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" style="height: 40px;" class="btn btn-success">Filter</button>

                                        </div>
                                    </div>
                                    </form>

                                    <div class="row mt-3">
                                        <?php
                                        foreach ($penggalanganDana as $value) : ?>
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
                                            <div class="col-lg-6">
                                                <div class="card">
                                                    <img class="card-img-top" src="<?= base_url('assets/img/laporan/') . $value['gambar']; ?>" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $value['judul'] ?></h5>

                                                        <?php
                                                            $id_penggalangan = $value['id_penggalangan'];
                                                            $donasi = $this->db->query("SELECT SUM(nominal) as total FROM tbl_donasi WHERE id_penggalangan = $id_penggalangan AND status = 'Diterima' ")->row_array();
                                                        ?>

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
                                                                    <?php
                                                                        $donatur = $this->db->query("SELECT COUNT(id_donasi) AS total FROM `tbl_donasi` WHERE id_penggalangan = $id_penggalangan AND status = 'Diterima'")->row_array();
                                                                    ?>
                                                                    <h6><?= $donatur['total'] ?> &nbsp;&nbsp;Donatur</h6>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <h6 style="float: right;"><?php
                                                                                                $capaian = new DateTime($value['waktu_penggalangan']);
                                                                                                $today = new DateTime("today");
                                                                                                $y = $today->diff($capaian)->y;
                                                                                                $m = $today->diff($capaian)->m;
                                                                                                $d = $today->diff($capaian)->d;

                                                                                                echo $capaian > $today ? $m . "Bulan" . $d . "Hari" : 'Donasi Sudah Di Tutup';

                                                                                                ?></h6>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <?php if ($capaian > $today) { ?>
                                                            <form action="<?php echo site_url('Dashboard/detail'); ?>" method="post">
                                                                <input type="hidden" name="id_penggalangan" value="<?= $value['id_penggalangan'] ?>">
                                                                <button type="submit" style="width: 100%;" class="btn btn-danger">Donasi Sekarang !</button>
                                                            </form>
                                                        <?php } else { ?>
                                                            <form action="<?php echo site_url('Dashboard/detail'); ?>" method="post">
                                                                <input type="hidden" name="id_penggalangan" value="<?= $value['id_penggalangan'] ?>">
                                                                <button type="submit" style="width: 100%;" class="btn btn-danger">Lihat Informasi Donasi</button>
                                                            </form>
                                                        <?php } ?>

                                                    </div>
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
</section>

<script>
    var getTotalProses = document.getElementById('totalProses');

    console.log(getTotalProses);
</script>