<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
<table id="table_id" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Status Pengguna</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php if(@$list):?>
			<?php foreach ($list as $row):?>
			<tr>
				<td><?php echo $row['username']?></td>
				<td><?php echo $row['email']?></td>
				<td>
					<?php if($row['is_active'] == "0"):?>
						<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-flag-o"></i> Tidak Aktif</a>
					<?php else:?>
						<a href="#" class="btn btn-success btn-xs"><i class="fa fa-flag-checkered"></i> Aktif</a>
					<?php endif;?>
				</td>
				<td>
					<a href="<?php echo base_url(); ?>administrator/inputform/<?php echo $row['id_admin']?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Form ubah pengguna</a>
				</td>
			</tr>
			<?php endforeach?>
		<?php endif;?>
	</tbody>
</table>
<?php $this->load->view('config/box_bottom');?>
<script>
	$(document).ready( function () {
		$('#table_id').DataTable();
	} );
</script>
<?php $this->load->view('config/view_bottom');?>