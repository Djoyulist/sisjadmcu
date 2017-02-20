<?php
class Mexample extends CI_Model{
	var $mgt_menu = "mgt_menu";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($id_menu,$title_menu,$content_menu)
	{
		$this->id_menu= $id_menu;
		$this->title_menu= $title_menu;
		$this->content_menu= $content_menu;
	}
	
	function getlist(){
		$this->db->select('*');
		$this->db->from($this->mgt_menu);
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
			'id_menu'=>$this->id_menu,
			'title_menu'=>$this->title_menu,
			'content_menu'=>$this->content_menu
		);
		return $this->db->insert($this->mgt_menu, $arrayData);
	}
	
	function update($id_menu)
	{
		$arrayData = array(
			'id_menu'=>$this->id_menu,
			'title_menu'=>$this->title_menu,
			'content_menu'=>$this->content_menu
		);
		$this->db->where('id_menu', $id_menu);
		
		return $this->db->update($this->mgt_menu, $arrayData);
	}
        
	function remove($id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		return $this->db->delete($this->mgt_menu);
	}	
	
	function detail($id_menu)
	{
		$this->db->where('id_menu', $id_menu);
		$query = $this->db->get($this->mgt_menu);	
		return $query->result_array();
	}
}
?>