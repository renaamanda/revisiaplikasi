		
			<footer class="footer">
				<div class="container-fluid">
					
					</div>				
				</div>
			</footer>
		</div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/core/popper.min.js"></script>
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/atlantis.min.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url();?>/assets/Atlantis/assets/js/setting-demo.js"></script>
	 <script src="<?php echo base_url();?>assets/alert/query.js"></script>
<script type="text/javascript">
    $( '.uang' ).mask('00.000.000.000', {reverse: true});
</script>
	<script>
		$('#basic-datatables').DataTable({
			}); 
		//Untuk Data Jumlah Driver
		Circles.create({
			id:'circles-1',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: 1,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		//Status Pengajuan Simper
		Circles.create({
			id:'circles-2',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: 4,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		//Jumlah Produksi
		Circles.create({
			id:'circles-3',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: 4,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		//Target Produksi
		Circles.create({
			id:'circles-4',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: 3,
			colors:['#f1f1f1', '#7d664b'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})


		//Arsip Dokumen
		Circles.create({
			id:'circles-6',
			radius:45,
			value:100,
			maxValue:100,
			width:7,
			text: 3,
			colors:['#f1f1f1', '#6f487a'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('#mySelect2').select2({
        dropdownParent: $('#modaltambah'),
        width: '100%',
    });
});
$(document).ready(function() {
    $('#mySelect3').select2({
        dropdownParent: $('#modaltambah'),
        width: '100%',
    });
});

</script>
<script type="text/javascript">
  // In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.mySelect2').select2({
        dropdownParent: $('#modaltambah'),
        width: '100%',
    });
});

</script>

<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
   
    
    $("#id_ayam").change(function(){ // Ketika user mengganti atau memilih data provinsi
    
 // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php echo base_url("/penjualan/cari_ayam"); ?>", // Isi dengan url/path file php yang dituju
        data: {id_ayam : $("#id_ayam").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#hrg_beli").html(response.list_barang).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });



  });
  </script>

    <script>
function sum() {
      var txtFirstNumberValue = document.getElementById('txt1').value;
      var txtSecondNumberValue = document.getElementById('txt2').value;
      var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
      if (!isNaN(result)) {

         document.getElementById('txt5').value = result;

      }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $('.js-example-basic-multiple').select2({
        dropdownParent: $('#modaltambah'),
        width: '100%',
    });
</script>

<script>
    $('.js-example-basic-multiple').select2({
        dropdownParent: $('#modaltambah'),
        width: '100%',
    });
</script>