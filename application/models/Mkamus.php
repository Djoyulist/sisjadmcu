<?php
class Mkamus extends CI_Model{
	var $kamus = "tb_kamus";
	var $ref_kamus = "rf_kamus";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_kamus,$kode_kamus,$keterangan_kamus)
	{
		$this->id_kamus= $id_kamus;
		$this->kode_kamus= $kode_kamus;
		$this->keterangan_kamus= $keterangan_kamus;
	}
	
	function getlist(){
		$this->db->select('*');
		$this->db->from($this->kamus);
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
			'id_kamus'=>$this->id_kamus,
			'kode_kamus'=>$this->kode_kamus,
			'keterangan_kamus'=>$this->keterangan_kamus
		);
		return $this->db->insert($this->kamus, $arrayData);
	}
	
	function update($id_kamus)
	{
		$arrayData = array(
			'id_kamus'=>$this->id_kamus,
			'kode_kamus'=>$this->kode_kamus,
			'keterangan_kamus'=>$this->keterangan_kamus
		);
		$this->db->where('id_kamus', $id_kamus);
		
		return $this->db->update($this->kamus, $arrayData);
	}
        
	function remove($id_kamus)
	{
		$this->db->where('id_kamus', $id_kamus);
		return $this->db->delete($this->kamus);
	}	
	
	function detail($id_kamus)
	{
		$this->db->where('id_kamus', $id_kamus);
		$query = $this->db->get($this->kamus);	
		return $query->result_array();
	}
        
	//referensi
	function create_ref($id_mcu, $id_kamus)
	{		
		$arrayData = array(
			'id_mcu'=>$id_mcu,
			'id_kamus'=>$id_kamus
		);
		return $this->db->insert($this->ref_kamus, $arrayData);
	}
	
	function detail_ref($id_mcu)
	{
		$this->db->where('id_mcu', $id_mcu);
		$query = $this->db->get($this->ref_kamus);	
		return $query->result_array();
	}
	
	function remove_ref($id_mcu)
	{
		$this->db->where('id_mcu', $id_mcu);
		return $this->db->delete($this->ref_kamus);
	}	
}
?>