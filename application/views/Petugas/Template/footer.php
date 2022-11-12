</div>
<!-- /page content -->
<!-- footer content -->
<footer>
  <div class="pull-right">All rights Reserved &copy; 2022 </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js" integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg==" crossorigin="anonymous"></script>



<script type="text/javascript">
		
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
	</script>

  
<script type="text/javascript">
		
		var total_harapan2 = document.getElementById('total_harapan2');

		total_harapan2.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			total_harapan2.value = formatRupiah(this.value, 'Rp. ');
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
	</script>

<script>
  var get_data = '<?php echo $get_data; ?>';
  var backend_url = '<?php echo site_url(); ?>';


  $('.date-picker').datepicker();
  $('#calendarIO').fullCalendar({

    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month,basicWeek,basicDay'
    },
    defaultDate: moment().format('YYYY-MM-DD'),
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    selectable: true,
    selectHelper: true,
    select: function(start, end) {
      $('#create_modal input[name=tanggal_bantuan]').val(moment(start).format('YYYY-MM-DD'));

      $('#create_modal').modal('show');
      save();
      $('#calendarIO').fullCalendar('unselect');
    },
    eventDrop: function(event, delta, revertFunc) { // si changement de position
      editDropResize(event);
    },
    eventResize: function(event, dayDelta, minuteDelta, revertFunc) { // si changement de longueur
      editDropResize(event);
    },

    eventClick: function(event, element) {

      deteil(event);
      editData(event);
      deleteData(event);
    },


    eventAfterRender: function(event, element, view) {

      element.append(event.nik_anak + '&nbsp;---' + event.status_gizi + '\n');
      element.css('color', 'white');

      if (event.status_gizi == 'sangat kurang') {
        element.css('background-color', 'red');
      } else if (event.status_gizi == 'kurang') {
        element.css('background-color', 'orange');
      }



    },


    eventSources: [{
        events: JSON.parse(get_data),


      }

    ],


  });

  function deteil(event) {
    $('#create_modal input[name=calendar_id]').val(event.id);
    $('#create_modal input[name=nik_anak]').val(event.nik_anak);
    $('#create_modal input[name=title]').val(event.title);
    $('#create_modal input[name=tempat_lahir]').val(event.tempat_lahir);
    $('#create_modal input[name=tanggal]').val(event.tanggal);
    $('#create_modal input[name=jk').val(event.jk);
    $('#create_modal input[name=tinggi_badan').val(event.tinggi_badan);
    $('#create_modal input[name=berat_badan').val(event.berat_badan);
    $('#create_modal input[name=umur').val(event.umur);
    $('#create_modal input[name=status_gizi').val(event.status_gizi);
    $('#create_modal input[name=keterangan_bantuan').val(event.keterangan_bantuan);
    $('#create_modal input[name=tanggal_bantuan]').val(moment(event.start).format('DD-MM-YYYY'));

    // $('#create_modal .delete_calender').show();
    $('#create_modal').modal('show');
  }
</script>


<script>
  $(document).ready(function() {
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Jumlah Anak Asuh', 'Jumlah Donatur', 'Jumlah Penggalangan'],
        datasets: [{
          label: 'Jumlah Data',
          data: [<?= $jmlAnakAsuh ?>, <?= $jmlDonatur ?>, <?= $jmlPenggalangan ?> ],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)'

          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 0.2)'

          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

  });
</script>

<script>
  $(document).ready(function() {
    var ctx = document.getElementById('chartStatus');
    var chartStatus = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: ['Donasi Diterima', 'Donasi Ditolak', 'Donasi Menunggu Verifikasi'],
        datasets: [{
          label: 'Donasi',
          data: [<?= $jmlDonasiDiterima ?>, <?= $jmlDonasiDitolak ?>, <?= $jmlDonasiMenunggu ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)'

          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)'

          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

  });
</script>


<script>
  $(document).ready(function() {
    Morris.Bar({
      element: 'chartImunisasi',
      data: <?php echo $jmlPenggalanganBulan; ?>,
      xkey: 'bulan',
      ykeys: ['judul'],
      labels: ['Jumlah Penggalangan']
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>


<!-- jQuery -->
<script src="<?php echo base_url('assets/vendors/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/jszip/dist/jszip.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/pdfmake/build/pdfmake.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/pdfmake/build/vfs_fonts.js') ?>"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.colVis.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/vendors/fastclick/lib/fastclick.js') ?>"></script>
<!-- NProgress -->
<script src="<?php echo base_url('assets/vendors/nprogress/nprogress.js') ?>"></script>
<!-- Chart.js -->
<script src="<?php echo base_url('assets/vendors/Chart.js/dist/Chart.min.js') ?>"></script>
<!-- gauge.js -->
<script src="<?php echo base_url('assets/vendors/gauge.js/dist/gauge.min.js') ?>"></script>
<!-- bootstrap-progressbar -->
<script src="<?php echo base_url('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/vendors/iCheck/icheck.min.js') ?>"></script>
<!-- Skycons -->
<script src="<?php echo base_url('assets/vendors/skycons/skycons.js') ?>"></script>
<!-- Flot -->
<script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.pie.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.time.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.stack.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/Flot/jquery.flot.resize.js') ?>"></script>
<!-- Flot plugins -->
<script src="<?php echo base_url('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/flot.curvedlines/curvedLines.js') ?>"></script>
<!-- DateJS -->
<script src="<?php echo base_url('assets/vendors/DateJS/build/date.js') ?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/vendors/jqvmap/dist/jquery.vmap.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') ?>"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url('assets/vendors/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?php echo base_url('assets/build/js/custom.min.js') ?>"></script>

</body>

</html>