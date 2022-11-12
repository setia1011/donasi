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
            <h5>Total Terkumpul Donasi Para Donatur &nbsp;&nbsp;Rp<?= number_format($totalDonasi['nominal'], 0, ',', '.') ?></h5>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 mt-5">
          <h2 class="ml-3"><u>Penggalangan Dana</u></h2>
          <div id="chartImunisasi" height="100px"></div>
        </div>
      </div>

    </div>
  </div>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style type="text/css">
            .container-chart {
                width: 50%;
                margin: 15px auto;
            }
        </style>

  <div class="col-12" id="donasiChartJs">
    <div class="container-chart">
        <canvas id="donasiChart" width="100" height="100"></canvas>
        <select name="filter" id="filter" class="form-control mt-3">
          <option class="option-filter" value="1">Januari</option>
          <option class="option-filter" value="2">Februari</option>
          <option class="option-filter" value="3">Maret</option>
          <option class="option-filter" value="4">April</option>
          <option class="option-filter" value="5">Mei</option>
          <option class="option-filter" value="6">Juni</option>
          <option class="option-filter" value="7">Juli</option>
          <option class="option-filter" value="8">Agustus</option>
          <option class="option-filter" value="9">September</option>
          <option class="option-filter" value="10">Oktober</option>
          <option class="option-filter" value="11">November</option>
          <option class="option-filter" value="12">Desember</option>
        </select>
    </div>
  </div>


  <script type="text/javascript">
    function generateRgb() {
      return Math.floor(Math.random() * 255) + 1;
    }

    function generateColor() {
      return `rgba(${generateRgb()},${generateRgb()},${generateRgb()},`
    }

    var data = <?= $donasichart ?>;
    var tanggal = []
    var dataNominal = []
    var barColor = []
    var borderColor = []


    data.map(data => {
      tanggal.push(data.created_date)
      dataNominal.push(parseInt(data.nominal))
      var color = generateColor()
      barColor.push(`${color}0.2)`)
      borderColor.push(`${color}1)`)
    })

    var input = document.getElementById('filter').addEventListener('change', function() {
      console.log('You selected: ', this.value);
      location.href = `http://localhost/donasi/index.php/Petugas?filter=${this.value}#donasiChartJs`
    });

    
    const options = document.querySelectorAll('.option-filter')
    options.forEach(option => {
      const params = new URLSearchParams(window.location.search)
      const filter = params.get('filter')
      if(filter == option.value) {
        option.setAttribute("selected", true)
      }
    })

    var ctx = document.getElementById("donasiChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: tanggal,
            datasets: [{
                    label: 'Donasi Per Bulan',
                    data: dataNominal,
                    backgroundColor: barColor,
                    borderColor: borderColor,
                    borderWidth: 1
                }]
        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
  </script>

</div>
<br />