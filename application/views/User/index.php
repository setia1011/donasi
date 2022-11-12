<section class="py-0" id="service">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?= base_url('assets/') ?>images/banner2.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url('assets/') ?>images/banner1.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="<?= base_url('assets/') ?>images/banner2.jpg" alt="Third slide">
      </div>
    </div>
  </div>
</section>

<section class="py-0 mb-5" id="service">

  <div class="container">
    <div class="row">
      <div class="col-lg-7 col-xxl-5 mx-auto text-center py-5">
        <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-1">Informasi</h5>
        <!-- <p class="mb-0">Klean is an elegant HTML5 template and a perfect starting point for your next SaaS oriented site, carefully curated by <span class="fw-bold">ThemeWagon</span></p> -->
      </div>
    </div>



    <div class="row flex-center circle-blend circle-blend-right circle-warning">
      <div class="col-xl-9">
        <div class="row justify-content-center circle">
          <?php
          foreach ($informasi as $value) : ?>
            <div class="col-md-4 mb-4">
              <div class="card card-bg h-100 px-4 px-md-2 px-lg-3 px-xxl-4 pt-4">
                <div class="card-body text-center text-md-start">
                  <h6 class="fw-bold fs-1"><?= $value['judul'] ?></h6>
                  <p class="mt-3 mb-md-0 mb-lg-3"><?= $value['isi_konten'] ?></p>
                  <footer>

                    <h6 style="margin-top: auto;"><?= date('d F Y', strtotime($value['created_date'])) ?></h6>
                  </footer>


                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

  </div>
</section>

<section class="py-0" id="service">

      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-xxl-5 mx-auto text-center py-4">
            <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-1">Donasi</h5>
            <!-- <p class="mb-0">Klean is an elegant HTML5 template and a perfect starting point for your next SaaS oriented site, carefully curated by <span class="fw-bold">ThemeWagon</span></p> -->
          </div>
        </div>



        <div class="row flex-center circle-blend circle-blend-right circle-warning">
          <div class="col-xl-9">
            <div class="row justify-content-center circle">
              <?php
              foreach ($dashboardDonasi as $value) : ?>
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
                <div class="col-md-4 mb-4">
                  <div class="card card-bg h-100 px-4 px-md-2 px-lg-3 px-xxl-4 pt-4">
                    <img class="card-img-top" src="<?= base_url('assets/img/laporan/') . $value['gambar']; ?>" alt="Card image cap">
                    <div class="card-body text-center text-md-start">
                      <h6 class="fw-bold fs-1"><?= $value['judul'] ?></h6>

                      <?php
                          $id_penggalangan = $value['id_penggalangan'];
                          $donasi = $this->db->query("SELECT SUM(nominal) as total FROM tbl_donasi WHERE id_penggalangan = $id_penggalangan AND status = 'Diterima' ")->row_array();
                      ?>

                      <p class="card-text" id="totalProses">Rp<?= number_format($donasi['total'] - $totalpenyaluran, 0, ',', '.');  ?> &nbsp;&nbsp;Terkumpul dari &nbsp;&nbsp; <?= $value['total_harapan'] ?></p>
                      <form action="<?php echo site_url('User/detailPenggalangan'); ?>" method="post">
                                                            <input type="hidden" name="id_penggalangan" value="<?= $value['id_penggalangan'] ?>">
                                                            <button type="submit" style="width: 100%;" class="btn btn-danger">Donasi Sekarang !</button>
                                                        </form>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

      </div>
    </section>

    <div class="text-center">
      <a href="<?= site_url('User/penggalanganDana') ?>">
        <button class="btn btn-primary">Show All</button>
      </a>
    </div>

