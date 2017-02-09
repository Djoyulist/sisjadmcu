<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undangan extends CI_Controller {
	var $title = "Undangan";
	 
	function __construct(){
		parent::__construct();
		$this->load->model('mmcu');
		$this->load->model('manggota');
	}
	 
	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['list'] = $this->mmcu->getListUndangan();
			$data['link_add'] = "";
			$this->load->view('undangan/list',$data);
		}else{
			redirect('authuser');
		}
	}
	
	public function pelaksana($id, $tgl_mcu){
		$date = date_create($tgl_mcu);
		$this->mmcu->setData($id, date_format($date,"Y-m-d"), "", 0);
		$this->mmcu->create();
		
		$this->session->set_flashdata('success', true);
		redirect('undangan');
	}
	
	public function change($id, $type){
		$this->manggota->update_type($id, $type);
		$this->session->set_flashdata('success', true);
		redirect('undangan');
	}
}