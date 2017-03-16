<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
<table id="table_id" class="table table-striped table-hover">
	<thead>
		<tr>
			<th>NIP</th>
			<th>Nama</th>
			<th>Divisi</th>
			<th>Job Desk</th>
			<th>Tgl. MCU</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($list as $row):?>
		<tr>
			<td><?php echo $row['nip']?></td>
			<td><?php echo $row['nama_anggota']?></td>
			<td><?php echo $row['bagian']?></td>
			<td><?php echo $row['jabatan']?></td>
			<td><?php echo $row['tgl_mcu']?></td>
			<td>
				<?php if($row['jabatan'] == "las" || $row['jabatan'] == "painting & sand blasting"):?>
					<?php if($row['type_checkup'] == "1"):?>
						<a href="<?php echo base_url(); ?>undangan/change/<?php echo $row['id_anggota']?>/0" class="btn btn-success btn-xs" onclick="return confirm('Apakah data ini ingin dimasukan ke undangan berkala ?');"><i class="fa fa-share-square-o"></i> Undangan Khusus : ON</a>
					<?php else:?>
						<a href="<?php echo base_url(); ?>undangan/change/<?php echo $row['id_anggota']?>/1" class="btn btn-danger btn-xs" onclick="return confirm('Apakah data ini ingin dimasukan ke undangan khusus ?');"><i class="fa fa-share-square-o"></i> Undangan Khusus : OFF</a>
					<?php endif;?>
				<?php endif;?>

				<button onClick="print('<?php echo $row['nip']?>','<?php echo $row['nama_anggota']?>','<?php echo $row['jabatan']?>','<?php echo $row['bagian']?>','<?php echo $row['tgl_mcu']?>','<?php echo $row['nama_tgl']?>', '<?php echo $row['type_checkup']?>')" class="btn btn-primary btn-xs"><i class="fa fa-print"></i> Print</button>
				<?php if($row['process_status'] == NULL):?>
					<a href="<?php echo base_url(); ?>undangan/pelaksana/<?php echo $row['id_anggota']?>/<?php echo $row['tgl_mcu']?>" class="btn btn-success btn-xs" onclick="return confirm('Apakah data ini ingin dimasukan ke pelaksanaan MCU ?');"><i class="fa fa-user"></i> Pelaksanaan MCU</a>
				<?php endif;?>
			</td>
		</tr>
		<?php endforeach?>
	</tbody>
</table>
<?php $this->load->view('config/box_bottom');?>
<script>
	$(document).ready(function() {
    $('#table_id').DataTable( {
        "order": [[ 4, "desc" ]]
    } );
	} );

	function print(nip, nama, jabatan, divisi, tgl_mcu, hari, type){
		var baseUrl = "<?php echo base_url(); ?>";
		var text_checkup = "berkala";
		if(type == "1"){
			text_checkup = "khusus";
		}

		var loadFile=function(url,callback){
			JSZipUtils.getBinaryContent(url,callback);
		}
		loadFile(baseUrl+"assets/template/template_undangan_mcu.docx",function(err,content){
			if (err) { throw e};
			doc=new Docxgen(content);
			doc.setData(
				{"nip":nip,
				"nama":nama,
				"jabatan":jabatan,
				"divisi":divisi,
				"tgl_mcu":tgl_mcu,
				"nama_hari":namahari(hari),
				"tgl_sekarang":getCurrentDate(),
				"text_upper":text_checkup.toUpperCase(),
				"text_lower":text_checkup.toLowerCase(),
				"text_capitalize":text_checkup.capitalize()
				}
			) //set the templateVariables
			doc.render() //apply them (replace all occurences of {first_name} by Hipp, ...)
			out=doc.getZip().generate({type:"blob"}) //Output the document using Data-URI
			saveAs(out,"undangan_mcu_"+nip+"_"+nama+".docx")
		})
	}

	String.prototype.capitalize = function() {
		return this.charAt(0).toUpperCase() + this.slice(1);
	}

	function namahari(dayname){
		var name = "";
		if(dayname == "Monday"){
			name = "SENIN";
		}else if(dayname == "Tuesday"){
			name = "SELASA";
		}else if(dayname == "Wednesday"){
			name = "RABU";
		}else if(dayname == "Thursday"){
			name = "KAMIS";
		}else if(dayname == "Friday"){
			name = "JUM'AT";
		}else if(dayname == "Saturday"){
			name = "SABTU";
		}else if(dayname == "Sunday"){
			name = "MINGGU";
		}
		return name;
	}

	function getCurrentDate(){
		var d = new Date();
		var day = d.getDate();
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

		return day +" "+ month +" "+ year;
	}
</script>
<?php $this->load->view('config/view_bottom');?>
