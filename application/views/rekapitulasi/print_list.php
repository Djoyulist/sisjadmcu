<html>
<head>
	<style>
		.table-style{
			border-style: solid;
			border-collapse: collapse;
			width:100%;
			text-align:center;
		}
		tr, td, th {
			border: 1px solid black;
		}
	</style>
</head>
<body onload="window.print()">
</body>
</html>
<h3>Rekapitulasi tahun <?php echo @$month_year; ?></h3>
<table id="table_id" class="table-style">
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
				<td><?php echo $row['bagian']?></td>
				<td><?php echo $row['blm_proses']?></td>
				<td><?php echo $row['sudah_proses']?></td>
			</tr>
			<?php endforeach?>
		<?php endif;?>
	</tbody>
</table>
