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
	<h3>Rekapitulasi tahun <?php echo @$month_year; ?></h3>
	<h5>Divisi : <?php echo @$bagian; ?></h5>
	<table id="table_id" class="table-style">
		<thead>
			<tr>
				<th>NIP</th>
				<th>Nama</th>
				<th>Tgl. MCU</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php if(@$list):?>
				<?php foreach ($list as $row):?>
				<tr>
					<td><?php echo $row['nip']?></td>
					<td><?php echo $row['nama_anggota']?></td>
					<td><?php echo $row['tgl_mcu']?></td>
					<td>
						<?php if($row['process_status'] == "0"):?>
							Dalam proses pelaksanaan MCU
						<?php else:?>
							Telah selesai pelaksanaan MCU
						<?php endif;?>
					</td>
				</tr>
				<?php endforeach?>
			<?php endif;?>
		</tbody>
	</table>
</body>
</html>
