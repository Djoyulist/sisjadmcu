<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terlaksana extends CI_Controller {
	var $title = "Grafik MCU Terlaksana";

	function __construct(){
		parent::__construct();
		$this->load->model('Mmcu');
		$this->load->model('Manggota');
	}

	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$divisi = "DIREKTORAT DESAIN & TEKNOLOGI";

			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['list_bagian'] = $this->Manggota->getlistBagian();
			$data_terlaksana = json_encode($this->Mmcu->getlistGrafikTerlaksana($divisi, "", ""));
			if($data_terlaksana == "false"){
				$data_terlaksana = "[{bagian:'".$divisi."',blm_proses:'0',sudah_proses:'0'}]";
			}
			$data['data_terlaksana'] = $data_terlaksana;
			$data['link_add'] = "";
			$data['link_search'] = base_url()."terlaksana/search";
			$this->load->view('grafik/terlaksana',$data);
		}else{
			redirect('Authuser');
		}
	}

	public function search(){
		$divisi = $this->input->post('divisi');
		$daterange = $this->input->post('daterange');
		$submit = $this->input->post('submit');
		if ($submit)
		{
			if($divisi == ""){
				$divisi = "DIREKTORAT DESAIN & TEKNOLOGI";
			}
			$date = explode(" - ", $daterange);

			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['list_bagian'] = $this->Manggota->getlistBagian();
			$data_terlaksana = json_encode($this->Mmcu->getlistGrafikTerlaksana($divisi, date_format(date_create($date[0]),"Y-m-d"), date_format(date_create($date[1]),"Y-m-d")));
			if($data_terlaksana == "false"){
				$data_terlaksana = "[{bagian:'".$divisi."',blm_proses:'0',sudah_proses:'0'}]";
			}
			$data['data_terlaksana'] = $data_terlaksana;
			$data['link_add'] = "";
			$data['link_search'] = base_url()."terlaksana/search";
			$this->load->view('grafik/terlaksana',$data);
		}else{
			redirect('Terlaksana');
		}
	}
}
