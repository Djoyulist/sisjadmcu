<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan extends CI_Controller {
	var $title = "Grafik Kesehatan";
	 
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
			$data['data_kesehatan'] = json_encode($this->mmcu->getlistGrafikKesehatan("", ""));
			$data['link_add'] = "";
			$data['link_search'] = base_url()."kesehatan/search";
			$this->load->view('grafik/kesehatan',$data);
		}else{
			redirect('authuser');
		}
	}
	
	public function search(){
		$daterange = $this->input->post('daterange');
		$submit = $this->input->post('submit');	
		if ($submit)
		{
			$date = explode(" - ", $daterange);
			
			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['data_kesehatan'] = json_encode($this->mmcu->getlistGrafikKesehatan(date_format(date_create($date[0]),"Y-m-d"), date_format(date_create($date[1]),"Y-m-d")));
			$data['link_add'] = "";
			$data['link_search'] = base_url()."kesehatan/search";
			$this->load->view('grafik/kesehatan',$data);
		}else{
			redirect('kesehatan');
		}
	}
}