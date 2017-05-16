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

	public function Ready(){
		$data['title'] = 'Daftar pemesanan Ready Stock';
		$detil = array(
			'order' => $this->Product_model->getOrder()
			);
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/tabelPemesananReady',$detil);
    	$this->load->view('admin/layout/slider');
	}

	function edit(){
		$data['title'] = 'Edit Status';
		$this->load->view('admin/layout/header',$data);
    	$this->load->view('admin/editPemesanan');
    	$this->load->view('admin/layout/slider');
	}
}