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
                <div class="row circle">
                    <div class="col-md-12 mb-4">
                        <div class="card card-bg h-100 px-4 px-md-2 px-lg-3 px-xxl-4 pt-4">
                            <div class="card-body text-center text-md-start">
                                <div class="col-lg-12">
                                    <div class="mt-3 mb-3">
                                        <?= $this->session->tempdata('message'); ?>
                                    </div>
                                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo site_url('User/formDonasi2'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id_user" value="<?= $id_user = $user['id_user'] ?? ""; ?>" required class="form-control ">
                                        <input type="hidden" name="id_penggalangan" value="<?= $id_penggalangan; ?>" required class="form-control ">
                                        <button type="button" class="btn btn-secondary mt-3 mb-3" style="width: 100%;" data-toggle="modal" data-target=".metodePembayaran">Metode Pembayaran</button>
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
                                        <div class="item form-group mt-2 mb-2">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Nama
                                                </label>
                                                <input type="text" name="nama" value="<?= $nama = $user['nama'] ?? "" ?>" required class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group mt-2 mb-2">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Email
                                                </label>
                                                <input type="text" name="nama" value="<?= $email = $user['email'] ?? ""; ?>" required class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label>Nominal Donasi
                                                </label>
                                                <input type="number" name="nominal" id="nominal" required class="form-control uang">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-secondary"  style="width:100%;">Lanjutkan Pembayaran</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade metodePembayaran" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Metode Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img class="card-img-top" src="<?= base_url('assets/images/bni.jpg') ?>" alt="Card image cap" width="100px" height="100px">
                                </div>
                                <div class="col-lg-8">
                                    <table width="100%" class="mt-5">
                                        <tr>
                                            <th>No. Rekening</th>
                                            <th>: 0618624587</th>
                                        </tr>
                                        <tr>
                                            <th>Atas Nama</th>
                                            <th>: Yayasan Al-Fitroh Kedoya</th>
                                        </tr>
                                    </table>
                            </div>
                        </div>

                    </div>
                </div>
                </form>
            </div>
        </div>

    </div>
</section>

<!-- <script type="text/javascript">
		
		var total_harapan = document.getElementById('total_harapan');

		total_harapan.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			total_harapan.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script> -->