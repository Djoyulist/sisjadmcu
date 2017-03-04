<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
<table id="table_id" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>NIP</th>
			<th>Nama</th>
			<th>Divisi</th>
			<th>Tgl. MCU</th>
			<th>Status MCU</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php if(@$list):?>
		<?php foreach ($list as $row):?>
		<tr>
			<td><?php echo $row['nip']?></td>
			<td><?php echo $row['nama_anggota']?></td>
			<td><?php echo $row['bagian']?></td>
			<td><?php echo $row['tgl_mcu']?></td>
			<td>
				<?php if($row['process_status'] == "0"):?>
					<a href="#" class="btn btn-warning btn-xs"><i class="fa fa-flag-o"></i> Dalam proses pelaksanaan MCU</a>
				<?php else:?>
					<a href="#" class="btn btn-success btn-xs"><i class="fa fa-flag-checkered"></i> Telah selesai pelaksanaan MCU</a>
				<?php endif;?>
			</td>
			<td>
				<a href="<?php echo base_url(); ?>hasil/inputform/<?php echo $row['id_mcu']?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Form hasil MCU</a>
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