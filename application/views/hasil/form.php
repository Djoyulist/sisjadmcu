<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
<div class="row">
	<form role="form" method="post" action="<?php echo @$link_add ?>/<?php echo @$detail[0]['id_mcu']; ?>">
		<input type="hidden" name="id_anggota" value="<?php echo @$detail[0]['id_anggota']; ?>"/>
		<div class="col-md-6">
			<div class="form-group">
			  <label for="inputNama">Nama </label>
			  <input type="text" class="form-control" id="inputNama" name="" value="<?php echo @$detail[0]['nama_anggota']; ?>" readonly>
			</div>
			<div class="form-group">
			  <label for="inputNip">NIP </label>
			  <input type="text" class="form-control" id="inputNip" name=""  value="<?php echo @$detail[0]['nip']; ?>" readonly>
			</div>
			<div class="form-group">
			  <label for="inputDivisi">Divisi </label>
			  <input type="text" class="form-control" id="inputDivisi" name=""  value="<?php echo @$detail[0]['bagian']; ?>" readonly>
			</div>
			<div class="form-group">
			  <label for="inputTgl">Tgl. MCU </label>
			  <input type="text" class="form-control" id="inputTgl" name="tgl_mcu" value="<?php echo date_format(date_create(@$detail[0]['tgl_mcu']),"d-m-Y"); ?>" readonly>
			</div>
			<div class="control-group">
				<label class="control-label" for="button">&nbsp;</label>
				<div class="controls">
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary btn-sm" />
					<a href="<?php echo @$link_back ?>" class="btn btn-default btn-sm" >Batal </a>
				</div>
			</div>				
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
					  <label for="inputGrade">Grade</label>
					  <input type="text" class="form-control" id="inputGrade" name="grade" value="<?php echo @$detail[0]['grade']; ?>">
					</div>
				</div>
				<div class="col-md-4">
					<h4>Abnormal</h4>
					<?php if(@$list_abnormal):?>
					<?php foreach ($list_abnormal as $row_abnormal):?>
						<?php 
							$checkabnormal = "";
							foreach ($detail_abnormal as $row_detabnormal)
							{
								if($row_detabnormal['id_abnormal'] == $row_abnormal['id_abnormal'])
								{
									$checkabnormal = "checked";
								}
							}
						?>
						<div class="checkbox">
						  <label style="font-size:10pt">
								<input type="checkbox" name="abnormal[]" value="<?php echo $row_abnormal['id_abnormal']?>" <?php echo $checkabnormal; ?> > <?php echo "(". $row_abnormal['kode_abnormal'] .") ". $row_abnormal['keterangan_abnormal']?>
						  </label>
						</div>
					<?php endforeach?>
					<?php else:?>
					Tidak ada data
					<?php endif;?>
				</div>
				<div class="col-md-8">
					<h4>Diet</h4>
					<?php if(@$list_kamus):?>
					<?php foreach ($list_kamus as $row_kamus):?>
					<?php 
						$checkabnormal = "";
						foreach ($detail_kamus as $row_detkamus)
						{
							if($row_detkamus['id_kamus'] == $row_kamus['id_kamus'])
							{
								$checkabnormal = "checked";
							}
						}
					?>
					<div class="checkbox">
					  <label style="font-size:9pt">
						<input type="checkbox" name="kamus[]" value="<?php echo $row_kamus['id_kamus']?>" <?php echo $checkabnormal; ?>> <?php echo $row_kamus['kode_kamus'] ." - ". word_limiter($row_kamus['keterangan_kamus'], 20);?>
					  </label>
					</div>
					<?php endforeach?>
					<?php else:?>
					Tidak ada data
					<?php endif;?>
				</div>
			</div>	
		</div>
	</form> 
</div>
<?php $this->load->view('config/box_bottom');?>
<?php $this->load->view('config/view_bottom');?>