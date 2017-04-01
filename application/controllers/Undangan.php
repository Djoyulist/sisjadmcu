<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Undangan extends CI_Controller {
	var $title = "Undangan";

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
			$data['list'] = $this->Mmcu->getListUndangan();
			$data['link_add'] = "";
			$this->load->view('undangan/list',$data);
		}else{
			redirect('Authuser');
		}
	}

	public function pelaksana($id, $tgl_mcu){
		$date = date_create($tgl_mcu);
		$data = array(
				'id_anggota'      => $id,
				'tgl_mcu'     		=> date_format($date,"Y-m-d"),
				'grade'       		=> "",
				'process_status'  => 0,
				'gol_darah'				=> "",
				'umur'						=> "",
				'tinggi_badan'		=> "",
				'berat_badan'			=> "",
				'tekanan_darah'		=> "",
				'gigi'						=> "",
				'jantung'					=> "",
				'paru'						=> "",
				'hati'						=> "",
				'limpah'					=> "",
				'mata_vod'				=> "",
				'mata_vos'				=> "",
				'mata_voo'				=> "",
				'mata_keterangan'	=> "",
				'warna'						=> "",
				'telinga'					=> "",
				'hidung'					=> "",
				'radiologi_thorax'=> "",
				'radiologi_ecg'		=> "",
				'hb'							=> "",
				'kimia_sgot'			=> "",
				'kimia_sgpt'			=> "",
				'kimia_creatinin'	=> "",
				'kimia_ureum'			=> "",
				'kimia_glukosa'		=> "",
				'kimia_cholesterol_total'=> "",
				'kimia_cholesterol_trigliserida'=> "",
				'kimia_uric'			=> ""
		);
		$this->Mmcu->setData($data);
		$this->Mmcu->create();

		$this->session->set_flashdata('success', true);
		redirect('Undangan');
	}

	public function change($id, $type){
		$this->Manggota->update_type($id, $type);
		$this->session->set_flashdata('success', true);
		redirect('Undangan');
	}
}
