<?php
class Manggota extends CI_Model{
	var $anggota = "tb_anggota";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($nip, $nama_anggota, $jabatan, $alamat, $tgl_lahir, $jenis_kelamin, $bagian, $no_hp, $no_telp, $tgl_masuk, $status, $type_checkup)
	{
		$this->nip= $nip;
		$this->nama_anggota= $nama_anggota;
		$this->jabatan= $jabatan;
		$this->alamat= $alamat;
		$this->tgl_lahir= $tgl_lahir;
		$this->jenis_kelamin= $jenis_kelamin;
		$this->bagian= $bagian;
		$this->no_hp= $no_hp;
		$this->no_telp= $no_telp;
		$this->tgl_masuk= $tgl_masuk;
		$this->status= $status;
		$this->type_checkup= $type_checkup;
	}
	
	function getlist(){
		$this->db->select('*');
		$this->db->from($this->anggota);
		$query = $this->db->get();
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
			'nip'=>$this->nip,
			'nama_anggota'=>$this->nama_anggota,
			'jabatan'=>$this->jabatan,
			'alamat'=>$this->alamat,
			'tgl_lahir'=>$this->tgl_lahir,
			'jenis_kelamin'=>$this->jenis_kelamin,
			'bagian'=>$this->bagian,
			'no_hp'=>$this->no_hp,
			'no_telp'=>$this->no_telp,
			'tgl_masuk'=>$this->tgl_masuk,
			'status_pegawai'=>$this->status,
			'type_checkup'=>$this->type_checkup
		);
		return $this->db->insert($this->anggota, $arrayData);
	}
	
	function update($nip)
	{
		$arrayData = array(
			'nama_anggota'=>$this->nama_anggota,
			'jabatan'=>$this->jabatan,
			'alamat'=>$this->alamat,
			'tgl_lahir'=>$this->tgl_lahir,
			'jenis_kelamin'=>$this->jenis_kelamin,
			'bagian'=>$this->bagian,
			'no_hp'=>$this->no_hp,
			'no_telp'=>$this->no_telp,
			'tgl_masuk'=>$this->tgl_masuk,
			'status_pegawai'=>$this->status,
			'type_checkup'=>$this->type_checkup
		);
		$this->db->where('nip', $nip);
		
		return $this->db->update($this->anggota, $arrayData);
	}
	
	function update_type($id, $type)
	{
		$arrayData = array(
			'type_checkup'=>$type
		);
		$this->db->where('id_anggota', $id);
		
		return $this->db->update($this->anggota, $arrayData);
	}
	
	function getlistBagian(){
		$sqlstr = 'select bagian from tb_anggota GROUP BY bagian ORDER BY bagian asc';
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
	
	function sumPegawai(){
		$this->db->select('*');
		$this->db->from($this->anggota);
		$query = $this->db->get();
		return $query->num_rows();	
	}
        
	/* 
	function remove($id_anggota)
	{
		$this->db->where('id_anggota', $id_anggota);
		return $this->db->delete($this->anggota);
	}	
	
	function detail($id_anggota)
	{
		$this->db->where('id_anggota', $id_anggota);
		$query = $this->db->get($this->anggota);	
		return $query->result_array();
	} 
	*/
	
	function check_nip($nip)
	{
		$is_check = false; 
		$this->db->where('nip', $nip);
		$num_row = $this->db->count_all_results($this->anggota);
		if($num_row > 0){
			$is_check = true;
		}
		return $is_check;
	}
}
?>