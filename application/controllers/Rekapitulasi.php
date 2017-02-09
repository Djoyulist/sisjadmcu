<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekapitulasi extends CI_Controller {
	var $title = "Rekapitulasi MCU";
	 
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
			$data['list'] = $this->mmcu->getlistRekap();
			$data['link_add'] = "";
			$data['link_print'] = base_url(). "rekapitulasi/printdivisi";
			$this->load->view('rekapitulasi/list',$data);
		}else{
			redirect('authuser');
		}
	}
	
	public function detailrekap($divisi)
	{
		$data['menu'] = $this->title;
		$data['mode'] = "detail_print";
		$data['bagian'] = str_replace("%20"," ",$divisi);
		$data['list'] = $this->mmcu->getListDetailRekap($divisi);
		$data['link_back'] = base_url(). "rekapitulasi";
		$data['link_print'] = base_url(). "rekapitulasi/printanggota/".$divisi;
		$this->load->view('rekapitulasi/list_detail',$data);
	}
	
	public function printdivisi()
	{
		$data['list'] = $this->mmcu->getlistRekap();
		$data['month_year'] = $this->getmonthyear();
		$this->load->view('rekapitulasi/print_list',$data);
	}
	
	public function printanggota($divisi)
	{
		$data['bagian'] = str_replace("%20"," ",$divisi);
		$data['list'] = $this->mmcu->getListDetailRekap($divisi);
		$data['month_year'] = $this->getmonthyear();
		$this->load->view('rekapitulasi/print_detail',$data);
	}
	
	private function getmonthyear(){
		$month = date('F');
		$name_month = "";
		if($month == "January")
		{
			$name_month = "Januari";
		}else if($month == "February"){
			$name_month = "Febuari";
		}else if($month == "Maret"){
			$name_month = "Maret";
		}else if($month == "April"){
			$name_month = "April";
		}else if($month == "May"){
			$name_month = "Mei";
		}else if($month == "June"){
			$name_month = "Juni";
		}else if($month == "July"){
			$name_month = "Juli";
		}else if($month == "August"){
			$name_month = "Agustus";
		}else if($month == "September"){
			$name_month = "September";
		}else if($month == "October"){
			$name_month = "Oktober";
		}else if($month == "November"){
			$name_month = "November";
		}else if($month == "Desember"){
			$name_month = "Desember";
		}
		
		return $name_month ." ". date('Y');
	}
}