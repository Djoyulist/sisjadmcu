<?php
class Mmcu extends CI_Model{
	var $mcu = "tr_mcu";

	function __construct()
	{
		parent::__construct();
	}

	function setData($data)
	{
		$this->id_anggota= $data['id_anggota'];
		$this->tgl_mcu= $data['tgl_mcu'];
		$this->grade= $data['grade'];
		$this->process_status= $data['process_status'];
		$this->gol_darah= $data['gol_darah'];
		$this->umur= $data['umur'];
		$this->tinggi_badan= $data['tinggi_badan'];
		$this->berat_badan= $data['berat_badan'];
		$this->tekanan_darah= $data['tekanan_darah'];
		$this->gigi= $data['gigi'];
		$this->jantung= $data['jantung'];
		$this->paru= $data['paru'];
		$this->hati= $data['hati'];
		$this->limpah= $data['limpah'];
		$this->mata_vod= $data['mata_vod'];
		$this->mata_vos= $data['mata_vos'];
		$this->mata_voo= $data['mata_voo'];
		$this->mata_keterangan= $data['mata_keterangan'];
		$this->warna= $data['warna'];
		$this->telinga= $data['telinga'];
		$this->hidung= $data['hidung'];
		$this->radiologi_thorax= $data['radiologi_thorax'];
		$this->radiologi_ecg= $data['radiologi_ecg'];
		$this->hb= $data['hb'];
		$this->kimia_sgot= $data['kimia_sgot'];
		$this->kimia_sgpt= $data['kimia_sgpt'];
		$this->kimia_creatinin= $data['kimia_creatinin'];
		$this->kimia_ureum= $data['kimia_ureum'];
		$this->kimia_glukosa= $data['kimia_glukosa'];
		$this->kimia_cholesterol_total= $data['kimia_cholesterol_total'];
		$this->kimia_cholesterol_trigliserida= $data['kimia_cholesterol_trigliserida'];
		$this->kimia_uric= $data['kimia_uric'];
	}

	function getlistPelaksana(){
		$sqlstr = 'select mcu.id_mcu, mcu.id_anggota, agt.nip, agt.nama_anggota, agt.bagian, agt.jabatan, mcu.tgl_mcu, DAYNAME(mcu.tgl_mcu) as nama_tgl, agt.type_checkup ';
		$sqlstr .= 'from tr_mcu mcu ';
		$sqlstr .= 'left join tb_anggota agt on mcu.id_anggota = agt.id_anggota ';
		$sqlstr .= 'where mcu.process_status = 0 and DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m") ';
		$query = $this->db->query($sqlstr);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}
	}

	function getlistHasil(){
		$sqlstr = 'select mcu.id_mcu, mcu.id_anggota, agt.nip, agt.nama_anggota, agt.bagian, agt.jabatan, mcu.tgl_mcu, DAYNAME(mcu.tgl_mcu) as nama_tgl, mcu.process_status ';
		$sqlstr .= 'from tr_mcu mcu ';
		$sqlstr .= 'left join tb_anggota agt on mcu.id_anggota = agt.id_anggota ';
		$sqlstr .= 'where DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m") ';
		$query = $this->db->query($sqlstr);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}
	}

	function getlistRekap(){
		$sqlstr = 'select agt.bagian, CASE WHEN b.blm_proses != "" THEN b.blm_proses ELSE 0 END as blm_proses, CASE WHEN s.sudah_proses != "" THEN s.sudah_proses ELSE 0 END as sudah_proses ';
		$sqlstr .= 'from tr_mcu mcu ';
		$sqlstr .= 'left join tb_anggota agt on mcu.id_anggota = agt.id_anggota ';
		$sqlstr .= 'left join ( ';
		$sqlstr .= '	select agt.bagian, COUNT(mcu_b.process_status) as blm_proses ';
		$sqlstr .= '	from tr_mcu mcu_b ';
		$sqlstr .= '	left join tb_anggota agt on mcu_b.id_anggota = agt.id_anggota ';
		$sqlstr .= '	where mcu_b.process_status = 0 and DATE_FORMAT(mcu_b.tgl_mcu, "%y") = DATE_FORMAT(NOW(), "%y")';
		$sqlstr .= '	group by agt.bagian ';
		$sqlstr .= ') b on agt.bagian = b.bagian ';
		$sqlstr .= 'left join ( ';
		$sqlstr .= '	select agt.bagian, COUNT(mcu_s.process_status) as sudah_proses ';
		$sqlstr .= '	from tr_mcu mcu_s ';
		$sqlstr .= '	left join tb_anggota agt on mcu_s.id_anggota = agt.id_anggota ';
		$sqlstr .= '	where mcu_s.process_status = 1 and DATE_FORMAT(mcu_s.tgl_mcu, "%y") = DATE_FORMAT(NOW(), "%y")';
		$sqlstr .= '	group by agt.bagian ';
		$sqlstr .= ') s on agt.bagian = s.bagian ';
		$sqlstr .= 'where DATE_FORMAT(mcu.tgl_mcu, "%y") = DATE_FORMAT(NOW(), "%y") ';
		$sqlstr .= 'Group by agt.bagian, b.blm_proses, s.sudah_proses ';
		$query = $this->db->query($sqlstr);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}
	}

	function getListDetailRekap($divisi){
		$sqlstr = 'select mcu.id_mcu, mcu.id_anggota, agt.nip, agt.nama_anggota, agt.bagian, agt.jabatan, mcu.tgl_mcu, DAYNAME(mcu.tgl_mcu) as nama_tgl, mcu.process_status ';
		$sqlstr .= 'from tr_mcu mcu ';
		$sqlstr .= 'left join tb_anggota agt on mcu.id_anggota = agt.id_anggota ';
		$sqlstr .= 'where DATE_FORMAT(mcu.tgl_mcu, "%y") = DATE_FORMAT(NOW(), "%y") and agt.bagian = "'. str_replace("%20"," ",$divisi).'"';
		$query = $this->db->query($sqlstr);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}
	}

	function getlistGrafikTerlaksana($divisi, $startDate, $endDate){
		$strCriteria = '';
		if($startDate){
			$strCriteria = "mcu.tgl_mcu BETWEEN '".$startDate."' AND '". $endDate . "'";
		}else{
			$strCriteria = 'DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m")';
		}

		$sqlstr = 'select agt.bagian, CASE WHEN b.blm_proses != "" THEN b.blm_proses ELSE 0 END as blm_proses, CASE WHEN s.sudah_proses != "" THEN s.sudah_proses ELSE 0 END as sudah_proses ';
		$sqlstr .= 'from tr_mcu mcu ';
		$sqlstr .= 'left join tb_anggota agt on mcu.id_anggota = agt.id_anggota ';
		$sqlstr .= 'left join ( ';
		$sqlstr .= '	select agt.bagian, COUNT(mcu_b.process_status) as blm_proses ';
		$sqlstr .= '	from tr_mcu mcu_b ';
		$sqlstr .= '	left join tb_anggota agt on mcu_b.id_anggota = agt.id_anggota ';
		$sqlstr .= '	where mcu_b.process_status = 0 ';
		$sqlstr .= '	group by agt.bagian ';
		$sqlstr .= ') b on agt.bagian = b.bagian ';
		$sqlstr .= 'left join ( ';
		$sqlstr .= '	select agt.bagian, COUNT(mcu_s.process_status) as sudah_proses ';
		$sqlstr .= '	from tr_mcu mcu_s ';
		$sqlstr .= '	left join tb_anggota agt on mcu_s.id_anggota = agt.id_anggota ';
		$sqlstr .= '	where mcu_s.process_status = 1 ';
		$sqlstr .= '	group by agt.bagian ';
		$sqlstr .= ') s on agt.bagian = s.bagian ';
		$sqlstr .= 'where '.$strCriteria.' and agt.bagian = "'. $divisi.'" ';
		$sqlstr .= 'GROUP BY agt.bagian, b.blm_proses, s.sudah_proses';
		$query = $this->db->query($sqlstr);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}
	}

	function getlistGrafikKesehatan($startDate, $endDate){
		$strCriteria = '';
		if($startDate){
			$strCriteria = "mcu.tgl_mcu BETWEEN '".$startDate."' AND '". $endDate . "'";
		}else{
			$strCriteria = 'DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m")';
		}

		$sqlstr = 'select CONCAT(ab.kode_abnormal, " ",ab.keterangan_abnormal) as abnormal, COUNT(rf.id_abnormal) as jumlah_abnormal ';
		$sqlstr .= 'from rf_abnormal rf ';
		$sqlstr .= 'LEFT JOIN tb_abnormal ab on rf.id_abnormal = ab.id_abnormal ';
		$sqlstr .= 'LEFT JOIN tr_mcu mcu on rf.id_mcu = mcu.id_mcu ';
		$sqlstr .= 'where '.$strCriteria.' ';
		$sqlstr .= 'GROUP BY ab.kode_abnormal, ab.keterangan_abnormal ';
		$query = $this->db->query($sqlstr);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}
	}

	function getListUndangan(){
		$sqlstr = 'select agt.id_anggota, nip, nama_anggota, bagian, jabatan, CONCAT(DATE_FORMAT(DATE(tgl_lahir), "%d-%m-"),YEAR(NOW())) as tgl_mcu, DAYNAME(DATE_ADD(DATE(tgl_lahir), INTERVAL 7 DAY)) as nama_tgl, mcu.process_status, agt.type_checkup ';
		$sqlstr .= 'from tb_anggota agt ';
		$sqlstr .= 'left join tr_mcu mcu on agt.id_anggota = mcu.id_anggota and CONCAT(YEAR(NOW()),DATE_FORMAT(DATE(agt.tgl_lahir), "-%m-%d")) = mcu.tgl_mcu ';
		$sqlstr .= 'where CONCAT(YEAR(NOW()), DATE_FORMAT(DATE(tgl_lahir), "-%m-%d")) BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 7 DAY) ';
		$sqlstr .= 'AND agt.id_anggota not in (Select id_anggota from tr_mcu where process_status IN (0,1) and DATE_FORMAT(tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m") ) ';
		$query = $this->db->query($sqlstr);
		if($query->num_rows() > 0){
			foreach($query->result_array() as $row){
				$result[] = $row;
			}
			return $result;
		} else {
			return false;
		}
	}

	function create()
	{
		$arrayData = array(
			'id_anggota'=>$this->id_anggota,
			'tgl_mcu'=>$this->tgl_mcu,
			'grade'=>$this->grade,
			'process_status'=>$this->process_status,
			'gol_darah'=>$this->gol_darah,
			'umur'=>$this->umur,
			'tinggi_badan'=>$this->tinggi_badan,
			'berat_badan'=>$this->berat_badan,
			'tekanan_darah'=>$this->tekanan_darah,
			'gigi'=>$this->gigi,
			'jantung'=>$this->jantung,
			'paru'=>$this->paru,
			'hati'=>$this->hati,
			'limpah'=>$this->limpah,
			'mata_vod'=>$this->mata_vod,
			'mata_vos'=>$this->mata_vos,
			'mata_voo'=>$this->mata_voo,
			'mata_keterangan'=>$this->mata_keterangan,
			'warna'=>$this->warna,
			'telinga'=>$this->telinga,
			'hidung'=>$this->hidung,
			'radiologi_thorax'=>$this->radiologi_thorax,
			'radiologi_ecg'=>$this->radiologi_ecg,
			'hb'=>$this->hb,
			'kimia_sgot'=>$this->kimia_sgot,
			'kimia_sgpt'=>$this->kimia_sgpt,
			'kimia_creatinin'=>$this->kimia_creatinin,
			'kimia_ureum'=>$this->kimia_ureum,
			'kimia_glukosa'=>$this->kimia_glukosa,
			'kimia_cholesterol_total'=>$this->kimia_cholesterol_total,
			'kimia_cholesterol_trigliserida'=>$this->kimia_cholesterol_trigliserida,
			'kimia_uric'=>$this->kimia_uric
		);
		return $this->db->insert($this->mcu, $arrayData);
	}

	function update($id_mcu)
	{
		$arrayData = array(
			'id_anggota'=>$this->id_anggota,
			'tgl_mcu'=>$this->tgl_mcu,
			'grade'=>$this->grade,
			'process_status'=>$this->process_status,
			'gol_darah'=>$this->gol_darah,
			'umur'=>$this->umur,
			'tinggi_badan'=>$this->tinggi_badan,
			'berat_badan'=>$this->berat_badan,
			'tekanan_darah'=>$this->tekanan_darah,
			'gigi'=>$this->gigi,
			'jantung'=>$this->jantung,
			'paru'=>$this->paru,
			'hati'=>$this->hati,
			'limpah'=>$this->limpah,
			'mata_vod'=>$this->mata_vod,
			'mata_vos'=>$this->mata_vos,
			'mata_voo'=>$this->mata_voo,
			'mata_keterangan'=>$this->mata_keterangan,
			'warna'=>$this->warna,
			'telinga'=>$this->telinga,
			'hidung'=>$this->hidung,
			'radiologi_thorax'=>$this->radiologi_thorax,
			'radiologi_ecg'=>$this->radiologi_ecg,
			'hb'=>$this->hb,
			'kimia_sgot'=>$this->kimia_sgot,
			'kimia_sgpt'=>$this->kimia_sgpt,
			'kimia_creatinin'=>$this->kimia_creatinin,
			'kimia_ureum'=>$this->kimia_ureum,
			'kimia_glukosa'=>$this->kimia_glukosa,
			'kimia_cholesterol_total'=>$this->kimia_cholesterol_total,
			'kimia_cholesterol_trigliserida'=>$this->kimia_cholesterol_trigliserida,
			'kimia_uric'=>$this->kimia_uric
		);
		$this->db->where('id_mcu', $id_mcu);

		return $this->db->update($this->mcu, $arrayData);
	}

	function remove($id_mcu)
	{
		$this->db->where('id_mcu', $id_mcu);
		return $this->db->delete($this->mcu);
	}


	function sumCalonMcu()
	{
		$sqlstr = 'select COUNT(agt.id_anggota) as total_mcu ';
		$sqlstr .= 'from tb_anggota agt ';
		//$sqlstr .= 'left join tr_mcu mcu on agt.id_anggota = mcu.id_anggota and CONCAT(YEAR(NOW()),DATE_FORMAT(DATE_ADD(DATE(agt.tgl_lahir),INTERVAL 7 DAY), "-%m-%d")) = mcu.tgl_mcu ';
		$sqlstr .= 'where CONCAT(YEAR(NOW()), DATE_FORMAT(DATE(tgl_lahir), "-%m-%d")) BETWEEN DATE(NOW()) AND DATE_ADD(DATE(NOW()), INTERVAL 7 DAY) ';
		$query = $this->db->query($sqlstr);
		$data = $query->result_array();
		return $data[0]['total_mcu'];
	}

	function sumPelaksanaMcu()
	{
		//$sqlstr = 'select COUNT(agt.id_anggota) as total_mcu ';
		//$sqlstr .= 'from tb_anggota agt ';
		//$sqlstr .= 'left join tr_mcu mcu on agt.id_anggota = mcu.id_anggota and CONCAT(YEAR(NOW()),DATE_FORMAT(DATE_ADD(DATE(agt.tgl_lahir),INTERVAL 7 DAY), "-%m-%d")) = mcu.tgl_mcu ';
		$sqlstr = 'select COUNT(*) as total_mcu ';
		$sqlstr .= 'from tr_mcu mcu ';
		$sqlstr .= 'where mcu.process_status = 0 and DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m") ';
		$query = $this->db->query($sqlstr);
		$data = $query->result_array();
		return $data[0]['total_mcu'];
	}

	/* function sumSelesaiMcu()
	{
		$sqlstr = 'select COUNT(agt.id_anggota) as total_mcu ';
		$sqlstr .= 'from tb_anggota agt ';
		$sqlstr .= 'left join tr_mcu mcu on agt.id_anggota = mcu.id_anggota and CONCAT(YEAR(NOW()),DATE_FORMAT(DATE_ADD(DATE(agt.tgl_lahir),INTERVAL 7 DAY), "-%m-%d")) = mcu.tgl_mcu ';
		$sqlstr .= 'where mcu.process_status = 1 and DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m") ';
		$query = $this->db->query($sqlstr);
		$data = $query->result_array();
		return $data[0]['total_mcu'];
	} */

	function sumSelesaiMcu()
	{
		$sqlstr = 'select COUNT(mcu.id_anggota) as total_mcu ';
		$sqlstr .= 'from tr_mcu mcu ';
		/*$sqlstr .= 'left join tr_mcu mcu on agt.id_anggota = mcu.id_anggota and CONCAT(YEAR(NOW()),DATE_FORMAT(DATE_ADD(DATE(agt.tgl_lahir),INTERVAL 7 DAY), "-%m-%d")) = mcu.tgl_mcu '; */
		$sqlstr .= 'where mcu.process_status = 1 and DATE_FORMAT(mcu.tgl_mcu, "%y") = DATE_FORMAT(NOW(), "%y") ';
		$query = $this->db->query($sqlstr);
		$data = $query->result_array();
		return $data[0]['total_mcu'];
	}

	function detail($id_mcu)
	{
		$sqlstr = 'select mcu.id_mcu, mcu.id_anggota, agt.nip, agt.nama_anggota, agt.bagian, agt.jenis_kelamin, mcu.tgl_mcu, mcu.grade, ';
		$sqlstr .= 'mcu.gol_darah, mcu.umur, mcu.tinggi_badan, mcu.berat_badan, mcu.tekanan_darah, mcu.gigi, mcu.jantung, mcu.paru, mcu.hati, mcu.limpah, mcu.mata_vod, mcu.mata_vos, mcu.mata_voo, mcu.mata_keterangan, mcu.warna, mcu.telinga, mcu.hidung, mcu.radiologi_thorax, mcu.radiologi_ecg, ';
		$sqlstr .= 'mcu.hb, mcu.kimia_sgot, mcu.kimia_sgpt, mcu.kimia_creatinin, mcu.kimia_ureum, mcu.kimia_glukosa, mcu.kimia_cholesterol_total, mcu.kimia_cholesterol_trigliserida, mcu.kimia_uric ';
		$sqlstr .= 'from tr_mcu mcu ';
		$sqlstr .= 'left join tb_anggota agt on mcu.id_anggota = agt.id_anggota ';
		$sqlstr .= "where mcu.id_mcu = '".$id_mcu."'";
		$query = $this->db->query($sqlstr);
		return $query->result_array();
	}
}
?>
