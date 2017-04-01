<div class="row">
	<div class="col-md-12">
	  <div class="box">
		<div class="box-header with-border">
		  <h3 class="box-title"><?php echo @$menu ." ". @$mode ?></h3>
			<div class="box-tools pull-right">
			<?php if($mode == "list"):?>
				<?php if(@$link_add):?>
					<a href="<?php echo @$link_add ?>" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i> Tambah </a>
				<?php endif;?>
				<?php if(@$link_print):?>
					<a href="#" class="btn btn-primary btn-sm" onClick="openInNewTab('<?php echo @$link_print ?>')"><i class="fa fa-print"></i> Print </a>
				<?php endif;?>
			<?php elseif($mode == "export"):?>
				<?php if(@$link_add):?>
					<a href="<?php echo @$link_add ?>" class="btn btn-success btn-sm" ><i class="fa fa-file-excel-o"></i> Ekspor </a>
				<?php endif;?>
			<?php elseif($mode == "detail"):?>
				<?php if(@$link_back):?>
					<a href="<?php echo @$link_back ?>" class="btn btn-default btn-sm" ><i class="fa fa-mail-reply"></i> Kembali </a>
				<?php endif;?>
			<?php elseif($mode == "detail_print"):?>
				<?php if(@$link_print):?>
					<a href="#" class="btn btn-primary btn-sm" onClick="openInNewTab('<?php echo @$link_print ?>')"><i class="fa fa-print"></i> Print </a>
				<?php endif;?>
				<?php if(@$link_back):?>
					<a href="<?php echo @$link_back ?>" class="btn btn-default btn-sm" ><i class="fa fa-mail-reply"></i> Kembali </a>
				<?php endif;?>
			<?php elseif(@$print_form):?>
					<button onClick="print()" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Print</button>
			<?php endif;?>
			</div>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		<?php $this->load->view('config/message');?>
