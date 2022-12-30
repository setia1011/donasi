<section class="py-0 mt-5" id="service">
    <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-3cztkX0r4VR5LQTk"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <form id="payment-form" method="post" action="<?=site_url()?>/snap/finish">
        <input type="hidden" name="result_type" id="result-type" value=""></div>
        <input type="hidden" name="result_data" id="result-data" value=""></div>
        <input type="hidden" name="id_user" value="<?php if (isset($user['id_user'])) {$user['id_user'];} else {echo 0;} ?>" required class="form-control ">
        <input type="hidden" name="id_penggalangan" value="<?= $id_penggalangan; ?>" required class="form-control ">
        <input class="form-control " type="hidden" name="nominal" value="<?= $nominal; ?>" required>
        <input class="form-control " type="hidden" name="isidoa" id="isidoa" required>
    </form>

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-xxl-5 mx-auto text-center py-5">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-1"><?= $title; ?></h5>
                <!-- <p class="mb-0">Klean is an elegant HTML5 template and a perfect starting point for your next SaaS oriented site, carefully curated by <span class="fw-bold">ThemeWagon</span></p> -->
            </div>
        </div>

        <div class="row flex-center circle-blend circle-blend-right circle-warning">
            <div class="col-xl-9">
                <div class="row circle">
                    <div class="col-md-12 mb-4">
                        <div class="card card-bg h-100 px-4 px-md-2 px-lg-3 px-xxl-4 pt-4">
                            <div class="card-body text-center text-md-start">
                                <div class="col-lg-12">
                                    <div class="mt-3 mb-3">
                                        <?= $this->session->tempdata('message'); ?>
                                    </div>
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('User/addDonasiUser'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_user" value="<?php if (isset($user['id_user'])) {$user['id_user'];} else {echo 0;} ?>" required class="form-control ">
                                        <input type="hidden" name="id_penggalangan" value="<?= $id_penggalangan; ?>" required class="form-control ">

                                        <?php
                                        foreach ($spesifikPenggalangan as $value) : ?>
                                            <div class="col-lg-12">
                                                <div class="card">

                                                    <div class="card-body">
                                                        <h5 class="card-title"><?= $value['judul'] ?></h5>

                                                        <?php
                                                            $penyaluran = $this->db->get_where('tbl_penyaluran', ['id_penggalangan' => $value['id_penggalangan']])->result_array();
                                                            ?>
                                                        <?php $totalpenyaluran = 0 ?>
                                                        <?php foreach ($penyaluran as $values) : ?>
                                                            <?php
                                                                    $total_harapan1 = str_replace('Rp.', '', $values['jumlah']);
                                                            $total_harapan2 = str_replace('.', '', $total_harapan1);
                                                            $total = intval($total_harapan2);
                                                            $totalpenyaluran += $total;
                                                            ?>
                                                        <?php endforeach; ?>

                                                        <?php
                                                            $id_penggalangan = $value['id_penggalangan'];
                                                            $donasi = $this->db->query("SELECT SUM(nominal) as total FROM tbl_donasi WHERE id_penggalangan = $id_penggalangan AND status = 'Diterima' ")->row_array();
                                                        ?>

                                                        <p class="card-text" id="totalProses">Rp. <?= number_format($donasi['total'] - $totalpenyaluran,0,',','.'); ?> &nbsp;&nbsp;Terkumpul dari &nbsp;&nbsp; <?= $value['total_harapan'] ?></p>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="ml-3 mt-3 mb-3">
                                            <h4>Anda Berdonasi</h4>
                                            <h5>Rp. <?= number_format($nominal,0,',','.') ; ?></h5>
                                            <input class="form-control " type="hidden" name="nominal" value="<?= $nominal; ?>" required>
                                        </div>

                                        <div class="item form-group mt-2 mb-2">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Tulis Doa
                                                </label><br>
                                                <textarea name="doa" class="form-control" id="doa" placeholder="Tulis doa agar dapat di amini oleh orang baik lainnya.." cols="30" rows="10"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label class="col-form-label col-md-6 col-sm-6 ">Bukti Transfer</label>
                                                <input class="form-control " type="file" name="gambar" required>
                                            </div>
                                        </div>
                                </div>
                                <button type="submit" class="btn btn-secondary" onclick="return confirm('Apakah data anda sudah benar...?');" style="width:100%;">Kirim Bukti</button>
                                </form>
                                <a href="<?= site_url('User/penggalanganDana') ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin membatalkan donasi...?');" style="width:100%;">Batal Donasi</a>
                                
                                <button id="pay-button" class="btn btn-primary" style="width:100%;">Bayar Otomaits</button>

                                <script type="text/javascript">
                                    let doa = document.getElementById('doa')
                                    let isidoa = document.getElementById('isidoa')

                                    $('#pay-button').click(function (event) {
                                        event.preventDefault();
                                        $(this).attr("disabled", "disabled");
                                        
                                        $.ajax({
                                            url: '<?=site_url()?>/snap/token?total=<?= $nominal ?>',
                                            cache: false,

                                            success: function(data) {
                                                //location = data;

                                                console.log('token = '+data);
                                                
                                                var resultType = document.getElementById('result-type');
                                                var resultData = document.getElementById('result-data');

                                                function changeResult(type,data){
                                                $("#result-type").val(type);
                                                $("#result-data").val(JSON.stringify(data));
                                                //resultType.innerHTML = type;
                                                //resultData.innerHTML = JSON.stringify(data);
                                                }

                                                snap.pay(data, {
                                                
                                                onSuccess: function(result){
                                                    changeResult('success', result);
                                                    console.log(result.status_message);
                                                    console.log(result);
                                                    isidoa.value = doa.value
                                                    $("#payment-form").submit();
                                                },
                                                onPending: function(result){
                                                    changeResult('pending', result);
                                                    console.log(result.status_message);
                                                    isidoa.value = doa.value
                                                    $("#payment-form").submit();
                                                },
                                                onError: function(result){
                                                    changeResult('error', result);
                                                    console.log(result.status_message);
                                                    isidoa.value = doa.value
                                                    $("#payment-form").submit();
                                                }
                                                });
                                            }
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</section>