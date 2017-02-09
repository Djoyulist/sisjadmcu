<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('mmcu');
		$this->load->model('manggota');
	}
	
	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$data['mode'] = "";
			$data['sumCalon'] = $this->mmcu->sumCalonMcu();
			$data['sumPelaksana'] = $this->mmcu->sumPelaksanaMcu();
			$data['sumSelesai'] = $this->mmcu->sumSelesaiMcu();
			$data['sumPelaksana'] = $this->mmcu->sumPelaksanaMcu();
			$data['sumPegawai'] = $this->manggota->sumPegawai();
			$this->load->view('welcome', $data);
		}else{
			redirect('authuser');
		}
	}
}
?>
