<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
<div class="row">
	<form role="form" method="post" action="<?php echo @$link_add ?>">
		<input type="hidden" name="id_admin" value="<?php echo @$detail[0]['id_admin']; ?>">
		<div class="col-md-6">
			<div class="form-group">
			  <label for="exampleInpuUsername">Username</label>
			  <input type="text" class="form-control" id="exampleInpuUsername"  name="username" value="<?php echo @$detail[0]['username']; ?>">
			</div>
			<div class="form-group">
			  <label for="exampleInputPassword">Password</label>
			  <input type="password" class="form-control" id="exampleInputPassword" name="password" value="<?php echo @$detail[0]['password']; ?>">
			</div>
			<div class="form-group">
			  <label for="exampleInputEmail">Email</label>
			  <input type="email" class="form-control" id="exampleInputEmail" name="email" value="<?php echo @$detail[0]['email']; ?>">
			</div>
			<div class="checkbox">
				<?php 
					$checkActive = "";
					if(@$detail[0]['is_active'] == "1")
					{
						$checkActive = "checked";
					}
				?>
				<label>
					<input type="checkbox" name="is_active" <?php echo $checkActive; ?> > Aktif Pengguna
				</label>
			</div>
			<div class="control-group">
				<label class="control-label" for="button">&nbsp;</label>
				<div class="controls">
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-sm" />
					<a href="<?php echo @$link_back ?>" class="btn btn-default btn-sm" >Batal </a>
				</div>
			</div>
		</div>
		<div class="col-md-6">    
		</div>
	</form> 
</div>
<?php $this->load->view('config/box_bottom');?>
<?php $this->load->view('config/view_bottom');?>