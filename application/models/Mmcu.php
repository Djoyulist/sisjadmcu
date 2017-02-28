<?php
class Mmcu extends CI_Model{
	var $mcu = "tr_mcu";

	function __construct()
	{
		parent::__construct();
	}

	function setData($id_anggota,$tgl_mcu,$grade,$process_status)
	{
		$this->id_anggota= $id_anggota;
		$this->tgl_mcu= $tgl_mcu;
		$this->grade= $grade;
		$this->process_status= $process_status;
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
		$sqlstr .= 'where DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m") ';
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
		$sqlstr .= 'where DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m") and agt.bagian = "'. str_replace("%20"," ",$divisi).'"';
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
		$sqlstr = 'select agt.id_anggota, nip, nama_anggota, bagian, jabatan, CONCAT(DATE_FORMAT(DATE(tgl_lahir), "%d-%m-"),YEAR(NOW())) as tgl_mcu, DAYNAME(DATE_SUB(DATE(tgl_lahir), INTERVAL 7 DAY)) as nama_tgl, mcu.process_status, agt.type_checkup ';
		$sqlstr .= 'from tb_anggota agt ';
		$sqlstr .= 'left join tr_mcu mcu on agt.id_anggota = mcu.id_anggota and CONCAT(YEAR(NOW()),DATE_FORMAT(DATE(agt.tgl_lahir), "-%m-%d")) = mcu.tgl_mcu ';
		$sqlstr .= 'where CONCAT(YEAR(NOW()), DATE_FORMAT(DATE(tgl_lahir), "-%m-%d")) BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) AND DATE(NOW()) ';
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
			'process_status'=>$this->process_status
		);
		return $this->db->insert($this->mcu, $arrayData);
	}

	function update($id_mcu)
	{
		$arrayData = array(
			'id_anggota'=>$this->id_anggota,
			'tgl_mcu'=>$this->tgl_mcu,
			'grade'=>$this->grade,
			'process_status'=>$this->process_status
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
		//$sqlstr .= 'left join tr_mcu mcu on agt.id_anggota = mcu.id_anggota and CONCAT(YEAR(NOW()),DATE_FORMAT(DATE_SUB(DATE(agt.tgl_lahir),INTERVAL 7 DAY), "-%m-%d")) = mcu.tgl_mcu ';
		$sqlstr .= 'where CONCAT(YEAR(NOW()), DATE_FORMAT(DATE_SUB(DATE(tgl_lahir), INTERVAL 7 DAY), "-%m-%d")) BETWEEN DATE_SUB(DATE(NOW()), INTERVAL 7 DAY) AND DATE(NOW()) ';
		$query = $this->db->query($sqlstr);
		$data = $query->result_array();
		return $data[0]['total_mcu'];
	}

	function sumPelaksanaMcu()
	{
		//$sqlstr = 'select COUNT(agt.id_anggota) as total_mcu ';
		//$sqlstr .= 'from tb_anggota agt ';
		//$sqlstr .= 'left join tr_mcu mcu on agt.id_anggota = mcu.id_anggota and CONCAT(YEAR(NOW()),DATE_FORMAT(DATE_SUB(DATE(agt.tgl_lahir),INTERVAL 7 DAY), "-%m-%d")) = mcu.tgl_mcu ';
		$sqlstr = 'select COUNT(*) as total_mcu ';
		$sqlstr .= 'from tr_mcu mcu ';
		$sqlstr .= 'where mcu.process_status = 0 and DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m") ';
		$query = $this->db->query($sqlstr);
		$data = $query->result_array();
		return $data[0]['total_mcu'];
	}

	function sumSelesaiMcu()
	{
		$sqlstr = 'select COUNT(agt.id_anggota) as total_mcu ';
		$sqlstr .= 'from tb_anggota agt ';
		$sqlstr .= 'left join tr_mcu mcu on agt.id_anggota = mcu.id_anggota and CONCAT(YEAR(NOW()),DATE_FORMAT(DATE_SUB(DATE(agt.tgl_lahir),INTERVAL 7 DAY), "-%m-%d")) = mcu.tgl_mcu ';
		$sqlstr .= 'where mcu.process_status = 1 and DATE_FORMAT(mcu.tgl_mcu, "%m") = DATE_FORMAT(NOW(), "%m") ';
		$query = $this->db->query($sqlstr);
		$data = $query->result_array();
		return $data[0]['total_mcu'];
	}

	function detail($id_mcu)
	{
		$sqlstr = 'select mcu.id_mcu, mcu.id_anggota, agt.nip, agt.nama_anggota, agt.bagian, mcu.tgl_mcu, mcu.grade ';
		$sqlstr .= 'from tr_mcu mcu ';
		$sqlstr .= 'left join tb_anggota agt on mcu.id_anggota = agt.id_anggota ';
		$sqlstr .= "where mcu.id_mcu = '".$id_mcu."'";
		$query = $this->db->query($sqlstr);
		return $query->result_array();
	}
}
?>
