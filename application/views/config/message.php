<?php $success = $this->session->flashdata('success');?>
<?php if ($success):?>
	<div class="alert alert-success">
		Data telah tersimpan
	</div>
<?php endif?>

<?php $error = $this->session->flashdata('error');?>
<?php if ($error):?>
	<div class="alert alert-error">
		Data gagal tersimpan
	</div>
<?php endif?>

<?php $delete = $this->session->flashdata('delete');?>
<?php if ($delete):?>
	<div class="alert alert-success">
		Data telah terhapus
	</div>
<?php endif?>