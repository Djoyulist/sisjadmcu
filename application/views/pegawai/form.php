<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
	<form role="form" method="post" action="<?php echo @$link_add ?>" enctype="multipart/form-data">
		<div class="form-group">
		  <label for="inputExcel">File excel </label>
		  <input type="file" class="form-control" id="inputExcel" name="fileexcel" />
		</div>
		<div class="control-group">
			<label class="control-label" for="button">&nbsp;</label>
			<div class="controls">
				<input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-sm" />
				<a href="<?php echo @$link_back ?>" class="btn btn-default btn-sm" >Batal </a>
			</div>
		</div>
	</form>
<?php $this->load->view('config/box_bottom');?>
<?php $this->load->view('config/view_bottom');?>