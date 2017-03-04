<?php
class Madmin extends CI_Model{
	var $admin = "tb_admin";

	function __construct()
	{
		parent::__construct();
	}
	
	function setData($username, $password, $email, $is_active)
	{
		$this->username= $username;
		$this->password= $password;
		$this->email= $email;
		$this->is_active= $is_active;
	}
	
	function getlist(){
		$this->db->select('*');
		$this->db->from($this->admin);
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
			'username'=>$this->username,
			'password'=>$this->password,
			'email'=>$this->email,
			'is_active'=>$this->is_active
		);
		return $this->db->insert($this->admin, $arrayData);
	}
	
	function update($id_admin)
	{
		$arrayData = array(
			'username'=>$this->username,
			'password'=>$this->password,
			'email'=>$this->email,
			'is_active'=>$this->is_active
		);
		$this->db->where('id_admin', $id_admin);
		
		return $this->db->update($this->admin, $arrayData);
	}
      
	function remove($id_admin)
	{
		$this->db->where('id_admin', $id_admin);
		return $this->db->delete($this->admin);
	}	
	
	function detail($id_admin)
	{
		$this->db->where('id_admin', $id_admin);
		$query = $this->db->get($this->admin);	
		return $query->result_array();
	}
	
	function check_username($username, $password)
	{
		$is_check = false;
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$this->db->where('is_active', "1");
		$num_row = $this->db->count_all_results($this->admin);
		if($num_row > 0){
			$is_check = true;
		}
		return $is_check;
	}
}
?>