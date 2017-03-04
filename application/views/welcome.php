<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
<div style="text-align: center;height:280px">
	<h2>Selamat Datang </h2><br/><h3>di Sistem Penjadwalan Medical Check Up</h3><br/><h3>Div. K3LH</h3>
</div>

<?php $this->load->view('config/box_bottom');?>
<div class="row">
	<div class="col-md-3 col-sm-6 col-xs-12">
	  <div class="info-box">
		<span class="info-box-icon bg-red"><i class="fa fa-male"></i></span>

		<div class="info-box-content">
		  <span class="info-box-text">Calon MCU</span>
		  <span class="info-box-number"><?php echo @$sumCalon; ?></span>
		</div>
		<!-- /.info-box-content -->
	  </div>
	  <!-- /.info-box -->
	</div>
	<!-- /.col -->
	<div class="col-md-3 col-sm-6 col-xs-12">
	  <div class="info-box">
		<span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

		<div class="info-box-content">
		  <span class="info-box-text">Pelaksana MCU</span>
		  <span class="info-box-number"><?php echo @$sumPelaksana; ?></span>
		</div>
		<!-- /.info-box-content -->
	  </div>
	  <!-- /.info-box -->
	</div>
	<!-- /.col -->
	
	<div class="col-md-3 col-sm-6 col-xs-12">
	  <div class="info-box">
		<span class="info-box-icon bg-green"><i class="fa fa-child"></i></span>

		<div class="info-box-content">
		  <span class="info-box-text">Selesai MCU</span>
		  <span class="info-box-number"><?php echo @$sumSelesai; ?></span>
		</div>
		<!-- /.info-box-content -->
	  </div>
	  <!-- /.info-box -->
	</div>
	<!-- /.col -->
	
	<div class="col-md-3 col-sm-6 col-xs-12">
	  <div class="info-box">
		<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

		<div class="info-box-content">
		  <span class="info-box-text">Total Pegawai</span>
		  <span class="info-box-number"><?php echo @$sumPegawai; ?></span>
		</div>
		<!-- /.info-box-content -->
	  </div>
	  <!-- /.info-box -->
	</div>
	<!-- /.col -->
</div>

<?php $this->load->view('config/view_bottom');?>