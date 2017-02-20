<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesehatan extends CI_Controller {
	var $title = "Grafik Kesehatan";

	function __construct(){
		parent::__construct();
		$this->load->model('Mmcu');
		$this->load->model('Manggota');
	}

	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['data_kesehatan'] = json_encode($this->Mmcu->getlistGrafikKesehatan("", ""));
			$data['link_add'] = "";
			$data['link_search'] = base_url()."kesehatan/search";
			$this->load->view('grafik/kesehatan',$data);
		}else{
			redirect('Authuser');
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
			$data['data_kesehatan'] = json_encode($this->Mmcu->getlistGrafikKesehatan(date_format(date_create($date[0]),"Y-m-d"), date_format(date_create($date[1]),"Y-m-d")));
			$data['link_add'] = "";
			$data['link_search'] = base_url()."kesehatan/search";
			$this->load->view('grafik/kesehatan',$data);
		}else{
			redirect('Kesehatan');
		}
	}
}
