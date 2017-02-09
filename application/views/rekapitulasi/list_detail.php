<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>

<h3>Rekapitulasi bulan <span id="title_rekap"></span></h3>
<h5>Divisi : <?php echo @$bagian; ?></h5>
<table id="table_id" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>NIP</th>
			<th>Nama</th>
			<th>Divisi</th>
			<th>Tgl. MCU</th>
			<th>Status proses</th>
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
			</tr>
			<?php endforeach?>
		<?php endif;?>
	</tbody>
</table>
<?php $this->load->view('config/box_bottom');?>
<script>
	$(document).ready( function () {
		$('#table_id').DataTable();
		getCurrentDate();
	} );
	
	function openInNewTab(url) {
		var win = window.open(url, '_blank');
		win.focus();
	}
	
	function getCurrentDate(){
		var d = new Date();
		var year = d.getFullYear();
		
		var month = new Array();
		month[0] = "Januari";
		month[1] = "Februari";
		month[2] = "Maret";
		month[3] = "April";
		month[4] = "Mei";
		month[5] = "Juni";
		month[6] = "Juli";
		month[7] = "Agustus";
		month[8] = "September";
		month[9] = "Oktober";
		month[10] = "November";
		month[11] = "Desember";
		var month = month[d.getMonth()];
		
		document.getElementById("title_rekap").innerHTML =  month +" "+ year;
	}
</script>
<?php $this->load->view('config/view_bottom');?>