<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terlaksana extends CI_Controller {
	var $title = "Grafik MCU Terlaksana";
	 
	function __construct(){
		parent::__construct();
		$this->load->model('mmcu');
		$this->load->model('manggota');
	}
	 
	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$divisi = "DIREKTORAT DESAIN & TEKNOLOGI";
			
			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['list_bagian'] = $this->manggota->getlistBagian();
			$data_terlaksana = json_encode($this->mmcu->getlistGrafikTerlaksana($divisi, "", ""));
			if($data_terlaksana == "false"){
				$data_terlaksana = "[{bagian:'".$divisi."',blm_proses:'0',sudah_proses:'0'}]";
			}
			$data['data_terlaksana'] = $data_terlaksana;
			$data['link_add'] = "";
			$data['link_search'] = base_url()."terlaksana/search";
			$this->load->view('grafik/terlaksana',$data);
		}else{
			redirect('authuser');
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
			$data['list_bagian'] = $this->manggota->getlistBagian();
			$data_terlaksana = json_encode($this->mmcu->getlistGrafikTerlaksana($divisi, date_format(date_create($date[0]),"Y-m-d"), date_format(date_create($date[1]),"Y-m-d")));
			if($data_terlaksana == "false"){
				$data_terlaksana = "[{bagian:'".$divisi."',blm_proses:'0',sudah_proses:'0'}]";
			}
			$data['data_terlaksana'] = $data_terlaksana;
			$data['link_add'] = "";
			$data['link_search'] = base_url()."terlaksana/search";
			$this->load->view('grafik/terlaksana',$data);
		}else{
			redirect('terlaksana');
		}
	}
}