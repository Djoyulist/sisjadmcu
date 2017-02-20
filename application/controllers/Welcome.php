<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Mmcu');
		$this->load->model('Manggota');
	}

	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$data['mode'] = "";
			$data['sumCalon'] = $this->Mmcu->sumCalonMcu();
			$data['sumPelaksana'] = $this->Mmcu->sumPelaksanaMcu();
			$data['sumSelesai'] = $this->Mmcu->sumSelesaiMcu();
			$data['sumPelaksana'] = $this->Mmcu->sumPelaksanaMcu();
			$data['sumPegawai'] = $this->Manggota->sumPegawai();
			$this->load->view('welcome', $data);
		}else{
			redirect('Authuser');
		}
	}
}
?>
