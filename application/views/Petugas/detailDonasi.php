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
                <div class="row mt-3">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <?php
                                foreach ($detailDonasi as $value) : ?>
                                    <div class="col-lg-5">
                                        <img class="card-img-top" src="<?= base_url('assets/img/buktiTf/') . $value['gambar']; ?>" alt="Card image cap">
                                    </div>
                                    <div class="col-lg-7 mt-3">

                                        <table width="100%" cellpadding="3px">
                                            <tr>
                                                <th width="200">Nama Donatur</th>
                                                <th>: <?= $value['nama'] ?></th>
                                            </tr>
                                            <tr>
                                                <th width="200">Email Donatur</th>
                                                <th>: <?= $value['email'] ?></th>
                                            </tr>
                                            <tr>
                                                <th width="200">Tanggal Lahir Donatur</th>
                                                <th>: <?= date('d F Y', strtotime($value['tgl_lahir'])) ?></th>
                                            </tr>
                                            <tr>
                                                <th width="200">Jenis Kelamin</th>
                                                <th>: <?= $value['jk'] ?></th>
                                            </tr>
                                            <tr>
                                                <th width="200">Nomor Telpon</th>
                                                <th>: <?= $value['no_telpon'] ?></th>
                                            </tr>
                                        </table>
                                        <table width="100%" cellpadding="3px" class="mt-3">
                                            <tr>
                                                <th style="text-align: left;"><u><b>Penggalangan</b></u></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;"><?= $value['judul'] ?></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;"><u><b>Kategori</b></u></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;"><?= $value['kategori'] ?></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;"><u><b>Doa</b></u></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;"><?= $value['doa'] ?></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;"><u><b>Nominal</b></u></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;">Rp<?= number_format($value['nominal'], 0, ',', '.'); ?></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;"><u><b>Status</b></u></th>
                                            </tr>
                                            <tr>
                                                <th style="text-align: left;"><?= $value['status'] ?></th>
                                            </tr>

                                        </table>
                                    <?php endforeach; ?>
                                    <div class="mt-3" id="buttonAksi">
                                        <a href="<?= site_url('Petugas/terimaDonasi/') . $value['id_donasi'] ?>" class="btn btn-secondary" id="buttonAksi" onclick="return confirm('Apakah Anda Ingin Terima Donasi ini...?');">Donasi diterima</a>
                                        <a href="<?= site_url('Petugas/tolakDonasi/') . $value['id_donasi'] ?>" class="btn btn-secondary" id="buttonAksi" onclick="return confirm('Apakah Anda Ingin Tolak Donasi ini...?');">Donasi ditolak</a>
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

<script type="text/javascript">
    var getStatus = '<?= $value["status"] ?>';

    var getDiv = document.getElementById("buttonAksi");

    console.log(getDiv);

    if (getStatus == "Diterima" || getStatus =="Ditolak") {

        getDiv.classList.add('hiddenAksi');

        // document.getElementByid('buttonAksi').classList.add('hiddenAksi');
        // document.getElementByid('buttonAksi').classList.remove('hiddenAksi');

    }


</script>