<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelaksanaan extends CI_Controller {
	var $title = "Pelaksanaan MCU";
	 
	function __construct(){
		parent::__construct();
		$this->load->model('mmcu');
	}
	 
	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['list'] = $this->mmcu->getlistPelaksana();
			$data['link_add'] = "";
			$this->load->view('pelaksanaan/list',$data);
		}else{
			redirect('authuser');
		}
	}
}