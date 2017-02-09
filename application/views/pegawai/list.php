<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
<table id="table_id" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>NIP</th>
			<th>Nama</th>
			<th>Tgl. Lahir</th>
			<th>Jabatan</th>
			<th>Divisi</th>
		</tr>
	</thead>
	<tbody>
		<?php if(@$list):?>
			<?php foreach ($list as $row):?>
			<tr>
				<td><?php echo $row['nip']?></td>
				<td><?php echo $row['nama_anggota']?></td>
				<td><?php echo $row['tgl_lahir']?></td>
				<td><?php echo $row['jabatan']?></td>
				<td><?php echo $row['bagian']?></td>
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