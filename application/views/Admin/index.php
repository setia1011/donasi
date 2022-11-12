<div class="row">
  <div class="col-md-12 col-sm-12 ">
    <div class="dashboard_graph">

      <div class="row x_title">
        <div class="col-md-6">
          <h3>DASHBOARD GRAFIK</h3>
        </div>

      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-6 col-sm-6">
          <canvas id="myChart"></canvas>
        </div>
        <div class="col-md-6 col-sm-6 ">
          <canvas id="chartStatus"></canvas>
          <div class="mt-3" style="width: 100%; text-align:center;">
            <h5>Total Terkumpul Donasi Para Donatur &nbsp;&nbsp;Rp<?= number_format($totalDonasi['nominal'],0,',','.')?></h5>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 mt-5">
          <h2 class="ml-3"><u>Penggalangan Dana</u></h2>
          <div id="chartImunisasi" height="100px"></div>
        </div>
      </div>

    </div>
  </div>

</div>
<br />


