<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
<form role="form" method="post" action="<?php echo @$link_search ?>">
	<div class="row">
		<div class="col-md-3">
			<div class="input-group">
				<div class="input-group-addon">
					<i class="fa fa-calendar"></i>
				</div>
				<input type="text" class="form-control pull-right" name="daterange">
			</div>
		</div>
		<div class="col-md-3">
			<div class="control-group">
				<div class="controls">
					<input type="submit" name="submit" value="Tampilkan Grafik" class="btn btn-primary btn-sm" />
				</div>
			</div>
		</div>
	</div>
</form>

<div id="kesehatanChart" style="height: 250px;"></div>
<?php $this->load->view('config/box_bottom');?>
<script>
	$(document).ready( function () {
		$('input[name="daterange"]').daterangepicker();
		$("#comboDivisi").select2();
		
		new Morris.Bar({
		  // ID of the element in which to draw the chart.
		  element: 'kesehatanChart',
		  // Chart data records -- each entry in this array corresponds to a point on
		  // the chart.
		  data: <?php echo @$data_kesehatan; ?>,
		  // The name of the data record attribute that contains x-values.
		  xkey: 'abnormal',
		  // A list of names of data record attributes that contain y-values.
		  ykeys: ['jumlah_abnormal'],
		  // Labels for the ykeys -- will be displayed when you hover over the
		  // chart.
		  hideHover: 'auto',
		  gridTextSize: 10,
		  labels: ['Jumlah']
		});
	});
</script>
<?php $this->load->view('config/view_bottom');?>