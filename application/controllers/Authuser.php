<?php
class Authuser extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('madmin');
	}
	
	function index()
	{
		$this->load->view('login');
	}
	
	function validate()
	{ 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$query = $this->madmin->check_username($username,$password);
		if($query){
			$data = array(
				'username' => $username,
				'token' => md5($password)
			);
			$this->session->set_userdata($data);
			redirect('Welcome');
		}else{
			$this->session->set_flashdata('error', true);
			$this->index();
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		$this->index();
	}
}
?>