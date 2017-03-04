<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
	var $title = "Pegawai";

	function __construct(){
		parent::__construct();
		$this->load->model('Manggota');
		$this->load->library('Excel');
	}

	public function index()
	{
		$token = $this->session->userdata('token');
		if($token){
			$data['menu'] = $this->title;
			$data['mode'] = "export";
			$data['list'] = $this->Manggota->getlist();
			$data['link_add'] = base_url(). "pegawai/inputform";
			$this->load->view('pegawai/list',$data);
		}else{
			redirect('authuser');
		}
	}

	public function inputform()
	{
		$data['menu'] = $this->title;
		$data['mode'] = "form";
		$data['link_add'] = base_url(). "pegawai/actionform";
		$data['link_back'] = base_url(). "pegawai";
		$this->load->view('pegawai/form',$data);
	}

	public function actionform(){
		$config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'xls|xlsx';
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('fileexcel')) {
			echo $this->upload->display_errors();
			exit;
        }else {
			$file = $this->upload->data();

			//read file from path
			$objPHPExcel = PHPExcel_IOFactory::load($file['full_path']);
			//get only the Cell Collection
			$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
			//extract to a PHP readable array format
			foreach ($cell_collection as $cell) {
				$column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				$row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				if($column == "F" || $column == "K"){
					$data_format = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
					$phpDateTimeObject = PHPExcel_Shared_Date::ExcelToPHPObject($data_format);
					$data_value = $phpDateTimeObject->format('Y-m-d');
				}else{
					$data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				}
				//header will/should be in row 1 only. of course this can be modified to suit your need.
				if ($row == 1) {
					$header[$row][$column] = $data_value;
				} else {
					$arr_data[$row][$column] = $data_value;
				}
			}

			//send the data in an array format
			$dataPegawai = $arr_data;
			foreach ($dataPegawai as $cellPegawai) {
				$nip = $cellPegawai['B'];
				$nama_anggota = $cellPegawai['C'];
				$jabatan = $cellPegawai['D'];
				$alamat = $cellPegawai['E'];

				$date_lahir = date_create($cellPegawai['F']);
				$tgl_lahir = date_format($date_lahir,"Y-m-d");

				$jenis_kelamin = $cellPegawai['G'];
				$bagian = $cellPegawai['H'];
				$no_hp = $cellPegawai['I'];
				$no_telp = $cellPegawai['J'];

				$date_masuk = date_create($cellPegawai['K']);
				$tgl_masuk = date_format($date_masuk,"Y-m-d");
				$status = $cellPegawai['L'];
				$type_checkup = "0";

				$this->Manggota->setData($nip, $nama_anggota, $jabatan, $alamat, $tgl_lahir, $jenis_kelamin, $bagian, $no_hp, $no_telp, $tgl_masuk, $status, $type_checkup);
				if($this->Manggota->check_nip($nip))
				{
					$this->Manggota->update($nip);
				}else{
					$this->Manggota->create();
				}
			}
			$this->session->set_flashdata('success', true);
			redirect('Pegawai');
        }
	}
}
