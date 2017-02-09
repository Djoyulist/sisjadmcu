<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {
	var $title = "Adminitrator";
	 
	function __construct(){
		parent::__construct();
		$this->load->model('madmin');
	}
	 
	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['list'] = $this->madmin->getlist();
			
			$data['link_add'] = base_url(). "administrator/inputform";
			$this->load->view('administrator/list',$data);
		}else{
			redirect('authuser');
		}
	}
	
	public function inputform($id = "")
	{
		$data['menu'] = $this->title;
		$data['mode'] = "form";
		
		$data['detail'] = $this->madmin->detail($id);
		$data['link_add'] = base_url(). "administrator/actionform";
		$data['link_back'] = base_url(). "administrator";
		$this->load->view('administrator/form',$data);
	}
	
	public function actionform()
	{
		$id = $this->input->post('id_admin');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$email = $this->input->post('email');
		$is_active = $this->input->post('is_active');
		$submit = $this->input->post('submit');	
		if ($submit)
		{
			if($is_active == "on"){
				$is_active = 1;
			}else{
				$is_active = 0;
			}
			if($id){
				$data = $this->madmin->detail($id);
				if($data[0]['password'] != $password){
					$password = md5($password);
				}
				$this->madmin->setData($username, $password, $email, $is_active);
				$this->madmin->update($id);
			}else{
				$this->madmin->setData($username, $password, $email, $is_active);
				$this->madmin->create();
			}
			$this->session->set_flashdata('success', true);
			redirect('administrator');
		}
	}
}
