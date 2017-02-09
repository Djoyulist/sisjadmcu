<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>

<h3>Rekapitulasi bulan <span id="title_rekap"></span></h3>
<table id="table_id" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>Divisi</th>
			<th>Total yang belum pelaksanaan</th>
			<th>Total yang sudah pelaksanaan</th>
		</tr>
	</thead>
	<tbody>
		<?php if(@$list):?>
			<?php foreach ($list as $row):?>
			<tr>
				<td><a href="<?php echo base_url(); ?>rekapitulasi/detailrekap/<?php echo $row['bagian']?>"><?php echo $row['bagian']?></a></td>
				<td><?php echo $row['blm_proses']?></td>
				<td><?php echo $row['sudah_proses']?></td>
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