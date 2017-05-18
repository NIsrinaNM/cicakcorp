<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model('Product_model');
            if (!$this->session->userdata('loggedin')) {
            	redirect('admin/Auth/login');
            }
		}

	public function Jasa(){
		$data['title'] = 'Daftar Pemesanan Custom Order';
		$detil = array(
			'orderjasa' => $this->Product_model->getOrderJasa()
			);
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/tabelPemesanan',$detil);
    	$this->load->view('admin/layout/slider');
	}

	public function orderjasainfo($kode) {
		$output = $this->Product_model->getIdOrder($kode);
		echo json_encode($output);
	}

	public function Ready(){
		$data['title'] = 'Daftar pemesanan Ready Stock';
		$detil = array(
			'order' => $this->Product_model->getOrder()
			);
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/tabelPemesananReady',$detil);
    	$this->load->view('admin/layout/slider');
	}

	public function orderbaranginfo($id) {
		$output = $this->Product_model->getIdBuy($id);
		$output1 = $this->Product_model->getIdOrderR($id);
		echo json_encode(array(
			'$output' => $output, 
			'kode'=>$output1[0]->kode_order);
	}

	function edit(){
		$data['title'] = 'Edit Status';
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/editPemesanan');
    	$this->load->view('admin/layout/slider');
	}

	public function updateHarga($kode) {
		$data = array(
			'total' => $this->input->post('ubahharga')
			);
		$this->Product_model->updateHarga($kode,$data);
		redirect('admin/Pemesanan/Jasa');
	}

	public function updatestatus($kode) {
		$data = array(
			'statusorder' => $this->input->post('status')
			);
		$this->Product_model->updateHarga($kode,$data);
		redirect('admin/Pemesanan/Jasa');
	}
}