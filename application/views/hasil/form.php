<?php $this->load->view('config/view_top');?>
<?php $this->load->view('config/box_top');?>
<div class="row">
	<form role="form" id="hasil-form" method="post" action="<?php echo @$link_add ?>/<?php echo @$detail[0]['id_mcu']; ?>">
		<input type="hidden" name="id_anggota" value="<?php echo @$detail[0]['id_anggota']; ?>"/>
		<div>
				<h3>DATA DIRI</h3>
        <section>
					<div class="col-md-12">
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
						  <label for="inputUmur">Umur </label>
						  <input type="number" class="form-control" id="inputUmur" name="umur" value="<?php echo @$detail[0]['umur']; ?>" maxlength="3">
						</div>
						<div class="form-group">
						  <label for="inputGolDarah">Gol. Darah </label>
						  <input type="text" class="form-control" id="inputGolDarah" name="gol_darah" value="<?php echo @$detail[0]['gol_darah']; ?>" maxlength="2">
						</div>
						<div class="form-group">
						  <label for="inputTgl">Tgl. MCU </label>
						  <input type="text" class="form-control" id="inputTgl" name="tgl_mcu" value="<?php echo date_format(date_create(@$detail[0]['tgl_mcu']),"d-m-Y"); ?>" readonly>
						</div>
					</div>
        </section>
				<h3>PEMERIKSAAN FISIK</h3>
        <section>
					<div class="col-md-12">
						<div class="form-group">
							<label for="inputTinggiBadan">Tinggi Badan </label>
							<input type="number" class="form-control" id="inputTinggiBadan" name="tinggi_badan" value="<?php echo @$detail[0]['tinggi_badan']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputBeratBadan">Berat Badan </label>
							<input type="number" class="form-control" id="inputBeratBadan" name="berat_badan" value="<?php echo @$detail[0]['berat_badan']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputTekananDarah">Tekanan Darah </label>
							<input type="text" class="form-control" id="inputTekananDarah" name="tekanan_darah" value="<?php echo @$detail[0]['tekanan_darah']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputGigi">Gigi </label>
							<input type="text" class="form-control" id="inputGigi" name="gigi" value="<?php echo @$detail[0]['gigi']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputJantung">Jantung </label>
							<input type="text" class="form-control" id="inputJantung" name="jantung" value="<?php echo @$detail[0]['jantung']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputParu">Paru </label>
							<input type="text" class="form-control" id="inputParu" name="paru" value="<?php echo @$detail[0]['paru']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputHati">Hati </label>
							<input type="text" class="form-control" id="inputHati" name="hati" value="<?php echo @$detail[0]['hati']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputLimpah">Limpah </label>
							<input type="text" class="form-control" id="inputLimpah" name="limpah" value="<?php echo @$detail[0]['limpah']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputVod"><b>MATA</b> - Vod </label>
							<input type="text" class="form-control" id="inputVod" name="mata_vod" value="<?php echo @$detail[0]['mata_vod']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputVos"><b>MATA</b> - Vos </label>
							<input type="text" class="form-control" id="inputVos" name="mata_vos" value="<?php echo @$detail[0]['mata_vos']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputVoo"><b>MATA</b> - Voo </label>
							<input type="text" class="form-control" id="inputVoo" name="mata_voo" value="<?php echo @$detail[0]['mata_voo']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputKet"><b>MATA</b> - Ket. </label>
							<input type="text" class="form-control" id="inputKet" name="mata_keterangan" value="<?php echo @$detail[0]['mata_keterangan']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputWarna">Warna </label>
							<input type="text" class="form-control" id="inputWarna" name="warna" value="<?php echo @$detail[0]['warna']; ?>" onchange="checkValue()">
						</div>
						<div class="form-group">
							<label for="inputTelinga">Telinga </label>
							<input type="text" class="form-control" id="inputTelinga" name="telinga" value="<?php echo @$detail[0]['telinga']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputHidung">Hidung </label>
							<input type="text" class="form-control" id="inputHidung" name="hidung" value="<?php echo @$detail[0]['hidung']; ?>" >
						</div>

						<div class="form-group">
							<label for="inputThorax">Radiologi - Thorax </label>
							<input type="text" class="form-control" id="inputThorax" name="radiologi_thorax" value="<?php echo @$detail[0]['radiologi_thorax']; ?>" >
						</div>
						<div class="form-group">
							<label for="inputECG">Radiologi - ECG </label>
							<input type="text" class="form-control" id="inputECG" name="radiologi_ecg" value="<?php echo @$detail[0]['radiologi_ecg']; ?>" >
						</div>
					</div>
				</section>
				<h3>PEMERIKSAAN LABORAT (MH)</h3>
        <section>
					<div class="col-md-12">
						<div class="form-group">
							<label for="inputHB">Darah Lengkap - Hb </label>
							<input type="text" class="form-control" id="inputHB" name="hb" value="<?php echo @$detail[0]['hb']; ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 44 || event.charCode == 0 ">
						</div>
						<div class="form-group">
							<label for="inputSGOT">Klinik Kimia - SGOT </label>
							<input type="number" class="form-control" id="inputSGOT" name="kimia_sgot" value="<?php echo @$detail[0]['kimia_sgot']; ?>" onchange="checkValue()">
						</div>
						<div class="form-group">
							<label for="inputSGPT">Klinik Kimia - SGPT </label>
							<input type="number" class="form-control" id="inputSGPT" name="kimia_sgpt" value="<?php echo @$detail[0]['kimia_sgpt']; ?>" onchange="checkValue()">
						</div>
						<div class="form-group">
							<label for="inputCreatinin">Klinik Kimia - Creatinin </label>
							<input type="text" class="form-control" id="inputCreatinin" name="kimia_creatinin" value="<?php echo @$detail[0]['kimia_creatinin']; ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 44 || event.charCode == 0 " onchange="checkValue()">
						</div>
						<div class="form-group">
							<label for="inputUreum">Klinik Kimia - Ureum </label>
							<input type="text" class="form-control" id="inputUreum" name="kimia_ureum" value="<?php echo @$detail[0]['kimia_ureum']; ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 44 || event.charCode == 0 ">
						</div>
						<div class="form-group">
							<label for="inputGlukosa">Klinik Kimia - Glukosa Darah - Puasa </label>
							<input type="number" class="form-control" id="inputGlukosa" name="kimia_glukosa" value="<?php echo @$detail[0]['kimia_glukosa']; ?>" onchange="checkValue()">
						</div>
						<div class="form-group">
							<label for="inputCTotal">Klinik Kimia - Cholesterol - Total </label>
							<input type="number" class="form-control" id="inputCTotal" name="kimia_cholesterol_total" value="<?php echo @$detail[0]['kimia_cholesterol_total']; ?>" onchange="checkValue()">
						</div>
						<div class="form-group">
							<label for="inputTrigliserida">Klinik Kimia - Cholesterol - Trigliserida </label>
							<input type="number" class="form-control" id="inputTrigliserida" name="kimia_cholesterol_trigliserida" value="<?php echo @$detail[0]['kimia_cholesterol_trigliserida']; ?>" onchange="checkValue()">
						</div>
						<div class="form-group">
							<label for="inputUric">Klinik Kimia - Asam Urat - Uric Acid </label>
							<input type="text" class="form-control" id="inputUric" name="kimia_uric" value="<?php echo @$detail[0]['kimia_uric']; ?>" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 44 || event.charCode == 0 " onchange="checkValue()">
						</div>
					</div>
				</section>
				<h3>HASIL MCU</h3>
        <section>
						<div class="col-md-12">
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
						            <input type="checkbox" id="abnormal_<?php echo $row_abnormal['id_abnormal']?>" name="abnormal[]" value="<?php echo $row_abnormal['id_abnormal']?>" <?php echo $checkabnormal; ?> > <?php echo "(". $row_abnormal['kode_abnormal'] .") ". $row_abnormal['keterangan_abnormal']?>
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
				</section>
		</div>
	</form>
</div>
<script>
	var form = $("#hasil-form");

	form.children("div").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
		stepsOrientation: "vertical",
		onFinishing: function (event, currentIndex){
        return form.submit();
    }
	});

	function checkValue(){
		var jenisKelamin = '<?php echo @$detail[0]['jenis_kelamin']; ?>';

		var inputWarna = document.getElementById('inputWarna').value;
		var inputSGOT = document.getElementById('inputSGOT').value;
		var inputSGPT = document.getElementById('inputSGPT').value;
		var inputCreatinin = document.getElementById('inputCreatinin').value;
		var inputGlukosa = document.getElementById('inputGlukosa').value;
		var inputCTotal = document.getElementById('inputCTotal').value;
		var inputTrigliserida = document.getElementById('inputTrigliserida').value;
		var inputUric = document.getElementById('inputUric').value;

		if(inputWarna !== "") {
			if(inputWarna.toLowerCase() == 'normal'){
				document.getElementById("abnormal_2").checked = false;
			}else{
				document.getElementById("abnormal_2").checked = true;
			}
		}

		if(jenisKelamin === 'L'){
			if(inputSGOT !== "") {
				if(inputSGOT >= 10 && inputSGOT <= 35){
					document.getElementById("abnormal_4").checked = false;
				}else{
					document.getElementById("abnormal_4").checked = true;
				}
			}

			if(inputSGPT !== "") {
				if(inputSGPT >= 9 && inputSGPT <= 43){
					document.getElementById("abnormal_5").checked = false;
				}else{
					document.getElementById("abnormal_5").checked = true;
				}
			}

			if(inputCreatinin !== "") {
				if(inputCreatinin >= "0,9" && inputCreatinin <= "1,5"){
					document.getElementById("abnormal_6").checked = false;
				}else{
					document.getElementById("abnormal_6").checked = true;
				}
			}

			if(inputUric !== "") {
				if(inputUric >= "3,4" && inputUric <= "7,0"){
					document.getElementById("abnormal_10").checked = false;
				}else{
					document.getElementById("abnormal_10").checked = true;
				}
			}
		}else if(jenisKelamin == 'P'){
			if(inputSGOT !== "") {
				if(inputSGOT >= 10 && inputSGOT <= 31){
					document.getElementById("abnormal_4").checked = false;
				}else{
					document.getElementById("abnormal_4").checked = true;
				}
			}

			if(inputSGPT !== "") {
				if(inputSGPT >= 9 && inputSGPT <= 36){
					document.getElementById("abnormal_5").checked = false;
				}else{
					document.getElementById("abnormal_5").checked = true;
				}
			}

			if(inputCreatinin !== "") {
				if(inputCreatinin >= "0,7" && inputCreatinin <= "1,3"){
					document.getElementById("abnormal_6").checked = false;
				}else{
					document.getElementById("abnormal_6").checked = true;
				}
			}

			if(inputUric !== "") {
				if(inputUric >= "2,4" && inputUric <= "5,7"){
					document.getElementById("abnormal_10").checked = false;
				}else{
					document.getElementById("abnormal_10").checked = true;
				}
			}
		}

		if(inputGlukosa !== "") {
			if(inputGlukosa >= 70 && inputGlukosa <= 120){
				document.getElementById("abnormal_7").checked = false;
			}else{
				document.getElementById("abnormal_7").checked = true;
			}
		}

		if(inputCTotal !== "") {
			if(inputCTotal <= 200){
				document.getElementById("abnormal_8").checked = false;
			}else{
				document.getElementById("abnormal_8").checked = true;
			}
		}

		if(inputTrigliserida !== "") {
			if(inputTrigliserida <= 150){
				document.getElementById("abnormal_9").checked = false;
			}else{
				document.getElementById("abnormal_9").checked = true;
			}
		}
	}

	function print(){
		var baseUrl = "<?php echo base_url(); ?>";
		var nama = '<?php echo @$detail[0]['nama_anggota']; ?>';
		var nip = '<?php echo @$detail[0]['nip']; ?>';
		var divisi = '<?php echo @$detail[0]['bagian']; ?>';
		var tgl_mcu = '<?php echo date_format(date_create(@$detail[0]['tgl_mcu']),"d-m-Y"); ?>';
		var gol_darah = '<?php echo @$detail[0]['gol_darah']; ?>';
		var umur = '<?php echo @$detail[0]['umur']; ?>';
		var tinggi_badan = '<?php echo @$detail[0]['tinggi_badan']; ?>';
		var berat_badan = '<?php echo @$detail[0]['berat_badan']; ?>';
		var tekanan_darah = '<?php echo @$detail[0]['tekanan_darah']; ?>';
		var gigi = '<?php echo @$detail[0]['gigi']; ?>';
		var jantung = '<?php echo @$detail[0]['jantung']; ?>';
		var paru = '<?php echo @$detail[0]['paru']; ?>';
		var hati = '<?php echo @$detail[0]['hati']; ?>';
		var limpah = '<?php echo @$detail[0]['limpah']; ?>';
		var mata_vod = '<?php echo @$detail[0]['mata_vod']; ?>';
		var mata_vos = '<?php echo @$detail[0]['mata_vos']; ?>';
		var mata_voo = '<?php echo @$detail[0]['mata_voo']; ?>';
		var mata_keterangan = '<?php echo @$detail[0]['mata_keterangan']; ?>';
		var warna = '<?php echo @$detail[0]['warna']; ?>';
		var telinga = '<?php echo @$detail[0]['telinga']; ?>';
		var hidung = '<?php echo @$detail[0]['hidung']; ?>';
		var radiologi_thorax = '<?php echo @$detail[0]['radiologi_thorax'] != "" ? @$detail[0]['radiologi_thorax'] : "-"; ?>';
		var radiologi_ecg = '<?php echo @$detail[0]['radiologi_ecg'] != "" ? @$detail[0]['radiologi_ecg'] : "-"; ?>';
		var hb = '<?php echo str_replace('.', ',',@$detail[0]['hb']); ?>';
		var kimia_sgot = '<?php echo @$detail[0]['kimia_sgot']; ?>';
		var kimia_sgpt = '<?php echo @$detail[0]['kimia_sgpt']; ?>';
		var kimia_creatinin = '<?php echo str_replace('.', ',',@$detail[0]['kimia_creatinin']); ?>';
		var kimia_ureum = '<?php echo @$detail[0]['kimia_ureum'] != "0" ? str_replace('.', ',',@$detail[0]['kimia_ureum']) : "-"; ?>';
		var kimia_glukosa = '<?php echo @$detail[0]['kimia_glukosa']; ?>';
		var kimia_cholesterol_total = '<?php echo @$detail[0]['kimia_cholesterol_total']; ?>';
		var kimia_cholesterol_trigliserida = '<?php echo @$detail[0]['kimia_cholesterol_trigliserida']; ?>';
		var kimia_uric = '<?php echo str_replace('.', ',',@$detail[0]['kimia_uric']); ?>';
		var grade = '<?php echo @$detail[0]['grade']; ?>';

		var loadFile=function(url,callback){
			JSZipUtils.getBinaryContent(url,callback);
		}
		loadFile(baseUrl+"assets/template/HASIL_CHECK_UP_KARYAWAN.docx",function(err,content){
			if (err) { throw e};
			doc=new Docxgen(content);
			doc.setData({
				"nip":nip,
				"nama":nama,
				"divisi":divisi,
				"tgl_mcu":tgl_mcu,
				"gol_darah":gol_darah,
				"umur":umur,
				"tinggi":tinggi_badan,
				"berat":berat_badan,
				"tekanan":tekanan_darah,
				"gigi":gigi,
				"jantung":jantung,
				"paru":paru,
				"hati":hati,
				"limpah":limpah,
				"vod":mata_vod,
				"vos":mata_vos,
				"voo":mata_voo,
				"ket":mata_keterangan,
				"warna":warna,
				"telinga":telinga,
				"hidung":hidung,
				"thorax":radiologi_thorax,
				"ecg":radiologi_ecg,
				"hb":hb,
				"sgot":kimia_sgot,
				"sgpt":kimia_sgpt,
				"creatin":kimia_creatinin,
				"ureum":kimia_ureum,
				"glukosa":kimia_glukosa,
				"c_total":kimia_cholesterol_total,
				"trigliserida":kimia_cholesterol_trigliserida,
				"uric":kimia_uric,
				"grade":grade,
				"tgl_sekarang":getCurrentDate()
			}) //set the templateVariables
			doc.render() //apply them (replace all occurences of {first_name} by Hipp, ...)
			out=doc.getZip().generate({type:"blob"}) //Output the document using Data-URI
			saveAs(out,"hasil_mcu_"+nip+"_"+nama+".docx")
		})
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
<?php $this->load->view('config/box_bottom');?>
<?php $this->load->view('config/view_bottom');?>
