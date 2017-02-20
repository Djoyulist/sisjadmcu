<?php
class Mabnormal extends CI_Model{
	var $abnormal = "tb_abnormal";
	var $ref_abnormal = "rf_abnormal";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_abnormal,$kode_abnormal,$keterangan_abnormal)
	{
		$this->id_abnormal= $id_abnormal;
		$this->kode_abnormal= $kode_abnormal;
		$this->keterangan_abnormal= $keterangan_abnormal;
	}
	
	function getlist(){
		$this->db->select('*');
		$this->db->from($this->abnormal);
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
			'id_abnormal'=>$this->id_abnormal,
			'kode_abnormal'=>$this->kode_abnormal,
			'keterangan_abnormal'=>$this->keterangan_abnormal
		);
		return $this->db->insert($this->abnormal, $arrayData);
	}
	
	function update($id_abnormal)
	{
		$arrayData = array(
			'id_abnormal'=>$this->id_abnormal,
			'kode_abnormal'=>$this->kode_abnormal,
			'keterangan_abnormal'=>$this->keterangan_abnormal
		);
		$this->db->where('id_abnormal', $id_abnormal);
		
		return $this->db->update($this->abnormal, $arrayData);
	}
        
	function remove($id_abnormal)
	{
		$this->db->where('id_abnormal', $id_abnormal);
		return $this->db->delete($this->abnormal);
	}
	
	function detail($id_abnormal)
	{
		$this->db->where('id_abnormal', $id_abnormal);
		$query = $this->db->get($this->abnormal);	
		return $query->result_array();
	}
	
	//referensi
	function create_ref($id_mcu, $id_abnormal)
	{		
		$arrayData = array(
			'id_mcu'=>$id_mcu,
			'id_abnormal'=>$id_abnormal
		);
		return $this->db->insert($this->ref_abnormal, $arrayData);
	}
	
	function detail_ref($id_mcu)
	{
		$this->db->where('id_mcu', $id_mcu);
		$query = $this->db->get($this->ref_abnormal);	
		return $query->result_array();
	}
	
	function remove_ref($id_mcu)
	{
		$this->db->where('id_mcu', $id_mcu);
		return $this->db->delete($this->ref_abnormal);
	}
	
}
?>