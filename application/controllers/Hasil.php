<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {
	var $title = "Hasil MCU";
	 
	function __construct(){
		parent::__construct();
		$this->load->model('mmcu');
		$this->load->model('mkamus');
		$this->load->model('mabnormal');
		$this->load->helper('text');
	}
	 
	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['list'] = $this->mmcu->getlistHasil();
			$data['link_add'] = "";
			$this->load->view('hasil/list',$data);
		}else{
			redirect('authuser');
		}
	}
	
	public function inputform($id = "")
	{
		$data['menu'] = $this->title;
		$data['mode'] = "form";
		$data['detail'] = $this->mmcu->detail($id);
		$data['list_kamus'] = $this->mkamus->getlist();
		$data['list_abnormal'] = $this->mabnormal->getlist();
		
		$data['detail_kamus'] = $this->mkamus->detail_ref($id);
		$data['detail_abnormal'] = $this->mabnormal->detail_ref($id);
		$data['link_add'] = base_url(). "hasil/actionform";
		$data['link_back'] = base_url(). "hasil";
		$this->load->view('hasil/form',$data);
	}
	
	public function actionform($id = "")
	{
		$id_anggota = $this->input->post('id_anggota');
		$tgl_mcu = $this->input->post('tgl_mcu');
		$grade = $this->input->post('grade');
		$checkbox_abnormal = $this->input->post("abnormal");
		$checkbox_kamus = $this->input->post("kamus");
		$submit = $this->input->post('submit');	
		if ($submit)
		{
			if($id){
				$date = date_create($tgl_mcu);
				$this->mmcu->setData($id_anggota, date_format($date,"Y-m-d"), $grade, 1);
				$this->mmcu->update($id);
				
				//remove abnormal & kamus
				$this->mabnormal->remove_ref($id);
				$this->mkamus->remove_ref($id);
				
				//add abnormal & kamus
				foreach($checkbox_abnormal as $cb_abnormal)
				{
					$this->mabnormal->create_ref($id, $cb_abnormal);
				}
				
				foreach($checkbox_kamus as $cb_kamus)
				{
					$this->mkamus->create_ref($id, $cb_kamus);
				}
			}
			$this->session->set_flashdata('success', true);
			redirect('hasil');
		}
	}
}