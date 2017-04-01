<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {
	var $title = "Hasil MCU";

	function __construct(){
		parent::__construct();
		$this->load->model('Mmcu');
		$this->load->model('Mkamus');
		$this->load->model('Mabnormal');
		$this->load->helper('text');
	}

	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$data['menu'] = $this->title;
			$data['mode'] = "list";
			$data['list'] = $this->Mmcu->getlistHasil();
			$data['link_add'] = "";
			$this->load->view('hasil/list',$data);
		}else{
			redirect('Authuser');
		}
	}

	public function inputform($id = "")
	{
		$data['menu'] = $this->title;
		$data['mode'] = "form";
		$data['print_form'] = "print";
		$data['detail'] = $this->Mmcu->detail($id);
		$data['list_kamus'] = $this->Mkamus->getlist();
		$data['list_abnormal'] = $this->Mabnormal->getlist();

		$data['detail_kamus'] = $this->Mkamus->detail_ref($id);
		$data['detail_abnormal'] = $this->Mabnormal->detail_ref($id);
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
		$gol_darah = $this->input->post("gol_darah");
		$umur = $this->input->post("umur");
		$tinggi_badan = $this->input->post("tinggi_badan");
		$berat_badan = $this->input->post("berat_badan");
		$tekanan_darah = $this->input->post("tekanan_darah");
		$gigi = $this->input->post("gigi");
		$jantung = $this->input->post("jantung");
		$paru = $this->input->post("paru");
		$hati = $this->input->post("hati");
		$limpah = $this->input->post("limpah");
		$mata_vod = $this->input->post("mata_vod");
		$mata_vos = $this->input->post("mata_vos");
		$mata_voo = $this->input->post("mata_voo");
		$mata_keterangan = $this->input->post("mata_keterangan");
		$warna = $this->input->post("warna");
		$telinga = $this->input->post("telinga");
		$hidung = $this->input->post("hidung");
		$radiologi_thorax = $this->input->post("radiologi_thorax");
		$radiologi_ecg = $this->input->post("radiologi_ecg");
		$hb = $this->input->post("hb");
		$kimia_sgot = $this->input->post("kimia_sgot");
		$kimia_sgpt = $this->input->post("kimia_sgpt");
		$kimia_creatinin = $this->input->post("kimia_creatinin");
		$kimia_ureum = $this->input->post("kimia_ureum");
		$kimia_glukosa = $this->input->post("kimia_glukosa");
		$kimia_cholesterol_total = $this->input->post("kimia_cholesterol_total");
		$kimia_cholesterol_trigliserida = $this->input->post("kimia_cholesterol_trigliserida");
		$kimia_uric = $this->input->post("kimia_uric");
		//$submit = $this->input->post('submit');
		//if ($submit)
		//{
			if($id){
				$date = date_create($tgl_mcu);
				$data = array(
						'id_anggota'      => $id_anggota,
						'tgl_mcu'     		=> date_format($date,"Y-m-d"),
						'grade'       		=> $grade,
						'process_status'  => 1,
						'gol_darah'				=> $gol_darah,
						'umur'						=> $umur,
						'tinggi_badan'		=> $tinggi_badan,
						'berat_badan'			=> $berat_badan,
						'tekanan_darah'		=> $tekanan_darah,
						'gigi'						=> $gigi,
						'jantung'					=> $jantung,
						'paru'						=> $paru,
						'hati'						=> $hati,
						'limpah'					=> $limpah,
						'mata_vod'				=> $mata_vod,
						'mata_vos'				=> $mata_vos,
						'mata_voo'				=> $mata_voo,
						'mata_keterangan'	=> $mata_keterangan,
						'warna'						=> $warna,
						'telinga'					=> $telinga,
						'hidung'					=> $hidung,
						'radiologi_thorax'=> $radiologi_thorax,
						'radiologi_ecg'		=> $radiologi_ecg,
						'hb'							=> str_replace(',', '.',$hb),
						'kimia_sgot'			=> $kimia_sgot,
						'kimia_sgpt'			=> $kimia_sgpt,
						'kimia_creatinin'	=> str_replace(',', '.',$kimia_creatinin),
						'kimia_ureum'			=> str_replace(',', '.',$kimia_ureum),
						'kimia_glukosa'		=> $kimia_glukosa,
						'kimia_cholesterol_total'=> $kimia_cholesterol_total,
						'kimia_cholesterol_trigliserida'=> $kimia_cholesterol_trigliserida,
						'kimia_uric'			=> str_replace(',', '.',$kimia_uric)
				);

				$this->Mmcu->setData($data);
				$this->Mmcu->update($id);

				//remove abnormal & kamus
				$this->Mabnormal->remove_ref($id);
				$this->Mkamus->remove_ref($id);

				//add abnormal & kamus
				foreach($checkbox_abnormal as $cb_abnormal)
				{
					$this->Mabnormal->create_ref($id, $cb_abnormal);
				}

				foreach($checkbox_kamus as $cb_kamus)
				{
					$this->Mkamus->create_ref($id, $cb_kamus);
				}
			}
			$this->session->set_flashdata('success', true);
			redirect('Hasil');
		//}
	}
}
